<?php

namespace App\Http\Controllers\Lihat_pembanding;

use App\Http\Controllers\Controller;
use App\Models\PembandingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Union semua query
        $data = $tanah_kosong->unionAll($retail)->unionAll($bangunan);

        // Server-side search
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $data = $data->where(function ($query) use ($search) {
                $query->where('jenis_aset', 'like', "%$search%")
                    ->orWhere('alamat', 'like', "%$search%")
                    ->orWhere('nama_narsum', 'like', "%$search%")
                    ->orWhere('telepon', 'like', "%$search%");
            });
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
                    <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-success btn-sm"><i class="bi bi-download"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
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
}
