<?php

namespace App\Http\Controllers\Lihat_pembanding;

use App\Http\Controllers\Controller;
use App\Models\PembandingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exports\PembandingExport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class Lihat_pembandingController extends Controller
{
    public function lihat_pembanding()
    {

        // $tanah_kosong = DB::table('tanah_kosong')
        //                 ->select('id','nama_tanah_kosong as nama_pembanding', 'alamat', 'jenis_aset','nama_narsum','telepon',
        //                 'nama_entitas','created_at','foto_tampak_depan', DB::raw("'tanah_kosong' as sumber"),'status_data_pembanding'
        //                 )->get();

        // // Query untuk pembanding_retail
        // $retail = DB::table('pembanding_retail')
        //     ->select('id','nama_retail as nama_pembanding', 'alamat','jenis_aset', 'foto_tampak_depan','nama_entitas',
        //     'narasumber','created_at', DB::raw("'pembanding_retail' as sumber"),'status_data_pembanding'
        //     )->get();

        // foreach ($retail as $item) {
        //     $narsum = json_decode($item->narasumber, true);
        //     $item->nama_narsum = isset($narsum[0]) ? $narsum[0] : null;
        //     $item->telepon = isset($narsum[1]) ? $narsum[1] : null;
        // }

        // // Gabungkan hasil dari kedua tabel
        // $data = $tanah_kosong->merge($retail);

        return view('content.lihat_pembanding.lihat_pembanding');
    }
    public function getData(Request $request)
    {
        // Query tanah_kosong
        $tanah_kosong = DB::table('tanah_kosong')
            ->select(
                'id',
                'nama_tanah_kosong as nama_pembanding',
                'alamat',
                'jenis_aset',
                'nama_narsum',
                'telepon',
                'nama_entitas',
                'created_at',
                'foto_tampak_depan',
                DB::raw("'Tanah Kosong' as sumber"),
                'status_data_pembanding',
                DB::raw('NULL as narasumber') // Placeholder supaya jumlah kolom sama
            );

        // Query pembanding_retail
        $retail = DB::table('pembanding_retail')
            ->select(
                'id',
                'nama_retail as nama_pembanding',
                'alamat',
                'jenis_aset',
                DB::raw('NULL as nama_narsum'), // Placeholder
                DB::raw('NULL as telepon'),     // Placeholder
                'nama_entitas',
                'created_at',
                'foto_tampak_depan',
                DB::raw("'Pembanding Retail' as sumber"),
                'status_data_pembanding',
                'narasumber' // Ditambahkan untuk json_decode nanti
            );

        // Query pembanding_bangunan
        $bangunan = DB::table('pembanding_bangunan')
            ->select(
                'id',
                'nama_bangunan as nama_pembanding',
                'alamat',
                'jenis_properti as jenis_aset',
                'nama_narsum',
                'telepon',
                'id_jenis_bangunan as nama_entitas',
                'created_at',
                'foto_tampak_depan',
                DB::raw("'Pembanding Bangunan' as sumber"),
                'status_data_pembanding',
                DB::raw('NULL as narasumber')
            );

        // Filter berdasarkan tahun jika parameter tahun ada
        if ($request->has('tahun') && !empty($request->tahun)) {
            $tahun = $request->tahun;
            $tanah_kosong->whereYear('created_at', $tahun);
            $retail->whereYear('created_at', $tahun);
            $bangunan->whereYear('created_at', $tahun);
        }

        // Union semua query
        $unionQuery = $tanah_kosong->unionAll($retail)->unionAll($bangunan);

        // Server-side search
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];

            // Gunakan subquery untuk menerapkan pencarian pada hasil union
            $data = DB::table(DB::raw("({$unionQuery->toSql()}) as combined_data"))
                ->mergeBindings($unionQuery)
                ->where(function ($query) use ($search) {
                    $query->where('nama_pembanding', 'like', "%$search%")
                        ->orWhere('jenis_aset', 'like', "%$search%")
                        ->orWhere('alamat', 'like', "%$search%")
                        ->orWhere('nama_narsum', 'like', "%$search%")
                        ->orWhere('telepon', 'like', "%$search%")
                        ->orWhere('nama_entitas', 'like', "%$search%")
                        ->orWhere('sumber', 'like', "%$search%")
                        ->orWhere('id', 'like', "%$search%");
                });
        } else {
            $data = DB::table(DB::raw("({$unionQuery->toSql()}) as combined_data"))
                ->mergeBindings($unionQuery);
        }

        // Server-side ordering
        $orderColumn = 'created_at';
        $orderDirection = 'desc';
        if ($request->has('order')) {
            $columns = [
                'id',
                'nama_pembanding',
                'alamat',
                'jenis_aset',
                'nama_narsum',
                'telepon',
                'nama_entitas',
                'created_at',
                'status_data_pembanding'
            ];
            $orderColumn = $columns[$request->order[0]['column']];
            $orderDirection = $request->order[0]['dir'];
        }
        $data = $data->orderBy($orderColumn, $orderDirection);

        // Server-side pagination
        $totalData = $data->count();
        $data = $data->skip($request->start)->take($request->length)->get();

        // Decode JSON untuk narasumber di tabel pembanding_retail
        $data = $data->map(function ($item) {
            if ($item->sumber == 'pembanding_retail') {
                $narsum = json_decode($item->narasumber, true);
                $item->nama_narsum = isset($narsum[0]) ? $narsum[0] : null;
                $item->telepon = isset($narsum[1]) ? $narsum[1] : null;
            }
            return $item;
        });

        // Format data untuk DataTables
        $formattedData = [];
        foreach ($data as $item) {
            // Tentukan route edit berdasarkan sumber data
            $editRoute = match ($item->sumber) {
                'Tanah Kosong' => route('pembanding.tanah-kosong.edit', $item->id),
                'Pembanding Retail' => route('pembanding.retail.edit', $item->id),
                'Pembanding Bangunan' => route('pembanding.bangunan.edit', $item->id),
                default => '#'
            };

            $formattedData[] = [
                'foto' => '<img src="' . asset('storage/' . $item->foto_tampak_depan) . '" alt="Foto" class="img-thumbnail" style="width:100px;">',
                'id' => $item->id,
                'jenis_aset' => $item->jenis_aset,
                'created_at' => $item->created_at,
                'nama_narsum' => $item->nama_narsum,
                'telepon' => $item->telepon,
                'alamat' => $item->alamat,
                'nama_entitas' => $item->nama_entitas,
                'sumber_data' => $item->sumber,
                'status_data_pembanding' => $item->status_data_pembanding,
                'aksi' => '
                    <a href="' . route("pembanding.laporan_pembanding", ["id" => $item->id, "sumber" => $item->sumber]) . '" class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-spreadsheet"></i></a>
                    <a href="' . $editRoute . '" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <a href="' . route("pembanding.download-item", ["id" => $item->id, "sumber" => $item->sumber]) . '" class="btn btn-success btn-sm"><i class="bi bi-download"></i></a>
                    <form action="' . route('pembanding.delete') . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        <input type="hidden" name="id" value="' . $item->id . '">
                        <input type="hidden" name="sumber" value="' . $item->sumber . '">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin?\')"><i class="bi bi-trash3"></i></button>
                    </form>
                ',
            ];
        }

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalData,
            'data' => $formattedData,
        ]);
    }

    public function getCoordinates(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        $radius = $request->radius;

        try {
            // Query untuk tanah_kosong
            $tanah_kosong = DB::table('tanah_kosong')
                ->select(
                    'id',
                    'nama_tanah_kosong as nama_pembanding',
                    'alamat',
                    'lat',
                    'long',
                    'jenis_aset',
                    'nama_narsum',
                    'telepon',
                    'created_at',
                    'peruntukan',
                    'row_jalan',
                    'bentuk_tanah',
                    'letak_posisi_obyek',
                    'luas_tanah',
                    DB::raw("'0' as luas_bangunan_total"),
                    'harga_penawaran',
                    'diskon',
                    DB::raw("'estimasi_transaksi' as estimasi_transaksi"),
                    DB::raw("'nilai_pasar_bangunan' as nilai_pasar_bangunan"),
                    DB::raw("'indikasi_nilai_tanah' as indikasi_nilai_tanah"),
                    DB::raw("'foto' as foto"),
                    DB::raw("'link' as link"),
                    DB::raw("'tanah_kosong' as sumber"),
                    DB::raw("6371 * acos(cos(radians(?)) 
                    * cos(radians(lat)) 
                    * cos(radians(`long`) - radians(?)) 
                    + sin(radians(?)) 
                    * sin(radians(lat))) AS distance")
                )
                ->addBinding([$lat, $lng, $lat]) // Binding untuk keamanan
                ->having('distance', '<=', $radius)
                ->get();

            // Query untuk pembanding_retail
            $retail = DB::table('pembanding_retail')
                ->select(
                    'id',
                    'nama_retail as nama_pembanding',
                    'alamat',
                    'lat',
                    'long',
                    'jenis_aset',
                    'narasumber',
                    'created_at',
                    'peruntukan',
                    'row_jalan',
                    'bentuk_tanah',
                    'letak_posisi_obyek',
                    'luas_net as luas_tanah',
                    'luas_bangunan_total',
                    'harga_penawaran',
                    'diskon',
                    DB::raw("'estimasi_transaksi' as estimasi_transaksi"),
                    DB::raw("'nilai_pasar_bangunan' as nilai_pasar_bangunan"),
                    DB::raw("'indikasi_nilai_tanah' as indikasi_nilai_tanah"),
                    DB::raw("'foto' as foto"),
                    DB::raw("'link' as link"),
                    DB::raw("'pembanding_retail' as sumber"),
                    DB::raw("6371 * acos(cos(radians(?)) 
                    * cos(radians(lat)) 
                    * cos(radians(`long`) - radians(?)) 
                    + sin(radians(?)) 
                    * sin(radians(lat))) AS distance")
                )
                ->addBinding([$lat, $lng, $lat]) // Binding untuk keamanan
                ->having('distance', '<=', $radius)
                ->get();

            foreach ($retail as $item) {
                $narsum = json_decode($item->narasumber, true);
                $item->nama_narsum = isset($narsum[0]) ? $narsum[0] : null;
                $item->telepon = isset($narsum[1]) ? $narsum[1] : null;
            }

            // Query untuk pembanding_bangunan
            $bangunan = DB::table('pembanding_bangunan')
                ->select(
                    'id',
                    'nama_bangunan as nama_pembanding',
                    'alamat',
                    'lat',
                    'long',
                    'jenis_properti as jenis_aset',
                    'nama_narsum',
                    'telepon',
                    'created_at',
                    'peruntukan',
                    'row_jalan',
                    'bentuk_tanah',
                    'letak_posisi_obyek',
                    'luas_tanah',
                    'luas_bangunan as luas_bangunan_total',
                    'harga_penawaran',
                    'diskon',
                    DB::raw("'estimasi_transaksi' as estimasi_transaksi"),
                    DB::raw("'nilai_pasar_bangunan' as nilai_pasar_bangunan"),
                    DB::raw("'indikasi_nilai_tanah' as indikasi_nilai_tanah"),
                    DB::raw("'foto' as foto"),
                    DB::raw("'link' as link"),
                    DB::raw("'pembanding_bangunan' as sumber"),
                    DB::raw("6371 * acos(cos(radians(?)) 
                    * cos(radians(lat)) 
                    * cos(radians(`long`) - radians(?)) 
                    + sin(radians(?)) 
                    * sin(radians(lat))) AS distance")
                )
                ->addBinding([$lat, $lng, $lat]) // Binding untuk keamanan
                ->having('distance', '<=', $radius)
                ->get();

            // Gabungkan hasil dari kedua tabel
            $data = $tanah_kosong->merge($retail)->merge($bangunan);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function laporan_pembanding(Request $request)
    {
        try {
            $id = $request->id;
            $sumber = $request->sumber;

            if (!$id || !$sumber) {
                return redirect()->back()->with('error', 'Parameter tidak lengkap');
            }

            if ($sumber == 'Tanah Kosong') {
                $data = DB::table('tanah_kosong')
                    ->select(
                        'id',
                        'nama_tanah_kosong as nama_pembanding',
                        'alamat',
                        'lat',
                        'long',
                        'jenis_aset',
                        'nama_narsum',
                        'telepon',
                        'harga_penawaran',
                        'diskon',
                        'luas_tanah',
                        'peruntukan',
                        'row_jalan',
                        'bentuk_tanah',
                        'foto_tampak_depan'
                    )
                    ->where('id', $id)
                    ->first();
            } else if ($sumber == 'Pembanding Retail') {
                $data = DB::table('pembanding_retail')
                    ->select(
                        'id',
                        'nama_retail as nama_pembanding',
                        'alamat',
                        'lat',
                        'long',
                        'jenis_aset',
                        'narasumber',
                        'harga_penawaran',
                        'diskon',
                        'luas_net as luas_tanah',
                        'luas_bangunan_total',
                        'peruntukan',
                        'row_jalan',
                        'bentuk_tanah',
                        'foto_tampak_depan'
                    )
                    ->where('id', $id)
                    ->first();

                if ($data) {
                    $narsum = json_decode($data->narasumber, true);
                    $data->nama_narsum = isset($narsum[0]) ? $narsum[0] : null;
                    $data->telepon = isset($narsum[1]) ? $narsum[1] : null;
                }
            } else if ($sumber == 'Pembanding Bangunan') {
                $data = DB::table('pembanding_bangunan')
                    ->select(
                        'id',
                        'nama_bangunan as nama_pembanding',
                        'alamat',
                        'lat',
                        'long',
                        'jenis_properti as jenis_aset',
                        'nama_narsum',
                        'telepon',
                        'harga_penawaran',
                        'diskon',
                        'luas_tanah',
                        'luas_bangunan as luas_bangunan_total',
                        'peruntukan',
                        'row_jalan',
                        'bentuk_tanah',
                        'foto_tampak_depan'
                    )
                    ->where('id', $id)
                    ->first();
            }

            if (!$data) {
                return redirect()->back()->with('error', 'Data tidak ditemukan');
            }

            // Tambahkan data tambahan yang diperlukan
            $data = (array)$data;
            $data['sumber'] = $sumber;

            // Hitung estimasi transaksi jika belum ada
            if (!isset($data['estimasi_transaksi'])) {
                $data['estimasi_transaksi'] = $data['harga_penawaran'] * (1 - ($data['diskon'] / 100));
            }

            // // Hitung indikasi nilai tanah jika belum ada
            // if (!isset($data['indikasi_nilai_tanah']) && isset($data['luas_tanah']) && $data['luas_tanah'] > 0) {
            //     $data['indikasi_nilai_tanah'] = $data['estimasi_transaksi'] / $data['luas_tanah'];
            // }

            // Hitung indikasi nilai tanah
            $data['indikasi_nilai_tanah'] = $data['luas_tanah'] > 0
                ? $data['estimasi_transaksi'] / $data['luas_tanah']
                : 0;

            return view('content.lihat_pembanding.laporan_pembanding', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function deleteData(Request $request)
    {
        try {
            $id = $request->id;
            $sumber = $request->sumber;

            // Tentukan tabel berdasarkan sumber data
            $table = match ($sumber) {
                'Tanah Kosong' => 'tanah_kosong',
                'Pembanding Retail' => 'pembanding_retail',
                'Pembanding Bangunan' => 'pembanding_bangunan',
                default => throw new \Exception('Sumber data tidak valid')
            };

            $deleted = DB::table($table)->where('id', $id)->delete();

            if ($deleted) {
                return redirect()->back()->with('success', 'Data berhasil dihapus');
            }
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function exportExcel()
    {
        try {
            Log::info('Memulai proses export excel');

            $tanah_kosong = DB::table('tanah_kosong')
                ->select(
                    'id',
                    'nama_tanah_kosong as nama_pembanding',
                    'alamat',
                    'jenis_aset',
                    'nama_narsum',
                    'telepon',
                    'created_at',
                    DB::raw("'Tanah Kosong' as sumber"),
                    'status_data_pembanding',
                    DB::raw("NULL as narasumber") // Tambah kolom dummy untuk menyamakan jumlah kolom
                );

            $retail = DB::table('pembanding_retail')
                ->select(
                    'id',
                    'nama_retail as nama_pembanding',
                    'alamat',
                    'jenis_aset',
                    DB::raw("NULL as nama_narsum"), // Kolom ke-5
                    DB::raw("NULL as telepon"),      // Kolom ke-6
                    'created_at',
                    DB::raw("'Pembanding Retail' as sumber"),
                    'status_data_pembanding',
                    'narasumber' // Kolom ke-10 (harus sama dengan jumlah kolom tanah_kosong)
                );

            $bangunan = DB::table('pembanding_bangunan')
                ->select(
                    'id',
                    'nama_bangunan as nama_pembanding',
                    'alamat',
                    'jenis_properti as jenis_aset',
                    'nama_narsum',
                    'telepon',
                    'created_at',
                    DB::raw("'Pembanding Bangunan' as sumber"),
                    'status_data_pembanding',
                    DB::raw("NULL as narasumber") // Tambah kolom dummy
                );

            $data = $tanah_kosong->unionAll($retail)->unionAll($bangunan)->get();
            Log::info('Jumlah data untuk export: ' . $data->count());

            // Process data untuk Excel
            $data = $data->map(function ($item) {
                if ($item->sumber == 'Pembanding Retail' && !empty($item->narasumber)) {
                    $narsum = json_decode($item->narasumber, true);
                    $item->nama_narsum = $narsum[0] ?? null;
                    $item->telepon = $narsum[1] ?? null;
                }
                return $item;
            });

            Log::info('Mulai download excel');
            return Excel::download(
                new UsersExport($data),
                'data-pembanding-' . date('Y-m-d') . '.xlsx'
            );
        } catch (\Exception $e) {
            Log::error('Error pada export excel: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Gagal mengekspor data: ' . $e->getMessage());
        }
    }

    public function exportItem($id, $sumber)
    {
        try {
            // Decode URL parameter
            $decodedSumber = urldecode($sumber);

            // Mapping sumber ke tabel dengan case sensitive
            $table = match ($decodedSumber) {
                'Tanah Kosong' => 'tanah_kosong',
                'Pembanding Retail' => 'pembanding_retail',
                'Pembanding Bangunan' => 'pembanding_bangunan',
                default => throw new \Exception('Sumber data tidak valid: ' . $decodedSumber)
            };

            // Validasi tabel exists
            if (!Schema::hasTable($table)) {
                throw new \Exception('Tabel ' . $table . ' tidak ditemukan');
            }

            // Query data
            $data = DB::table($table)
                ->when($table === 'pembanding_retail', function ($query) {
                    return $query->select('*', DB::raw("NULL as nama_narsum"), DB::raw("NULL as telepon"));
                })
                ->when($table !== 'pembanding_retail', function ($query) {
                    return $query->select('*', DB::raw("NULL as narasumber"));
                })
                ->where('id', $id)
                ->first();

            if (!$data) {
                return redirect()->back()->with('error', 'Data tidak ditemukan');
            }

            // Process data khusus untuk retail
            if ($table === 'pembanding_retail' && !empty($data->narasumber)) {
                $narsum = json_decode($data->narasumber, true);
                $data->nama_narsum = $narsum[0] ?? null;
                $data->telepon = $narsum[1] ?? null;
            }

            // Mapping ke format Excel
            $mappedData = [
                'ID' => $data->id,
                'Nama Pembanding' => $data->nama_pembanding ?? $data->nama_tanah_kosong ?? $data->nama_bangunan,
                'Alamat' => $data->alamat,
                'Jenis Aset' => $data->jenis_aset ?? $data->jenis_properti,
                'Narasumber' => $data->nama_narsum,
                'Telepon' => $data->telepon,
                'Tanggal Input' => $data->created_at,
                'Sumber Data' => $decodedSumber,
                'Status Data' => $data->status_data_pembanding ? 'Aktif' : 'Non-Aktif'
            ];

            return Excel::download(
                new PembandingExport(collect([$mappedData])),
                'detail-pembanding-' . $id . '-' . Str::slug($decodedSumber) . '.xlsx'
            );
        } catch (\Exception $e) {
            Log::error('Export Item Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengunduh data: ' . $e->getMessage());
        }
    }
    public function testExport()
    {
        $data = collect([
            ['nama' => 'Test 1', 'alamat' => 'Alamat 1'],
            ['nama' => 'Test 2', 'alamat' => 'Alamat 2']
        ]);

        return Excel::download(new PembandingExport($data), 'test.xlsx');
    }
}
