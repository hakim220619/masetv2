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
        $unionQuery = $tanah_kosong->unionAll($bangunan);

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
            $data = $tanah_kosong->merge($bangunan);

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
                        'provinsi',
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
                        'foto_tampak_depan',
                        'jenis_data',
                        'tgl_penawaran',
                        'letak_posisi_obyek',
                        'maintenance',
                        'kemunduran_fungsi',
                        'penjelasan_kemunduran_fungsi',
                        'kemunduran_ekonomis',
                        'penjelasan_kemunduran_ekonomis'
                    )
                    ->where('id', $id)
                    ->first();

                // Menghitung estimasi transaksi
                if ($data) {
                    $data->estimasi_transaksi = $data->harga_penawaran * (1 - ($data->diskon / 100));

                    // Menghitung indikasi nilai pasar tanah
                    // Asumsi nilai untuk demonstrasi (sesuaikan dengan logika bisnis yang sebenarnya)
                    $data->indikasi_biaya_pengganti_baru_m2 = 5691000; // Contoh nilai
                    $data->indikasi_biaya_pengganti_baru = $data->indikasi_biaya_pengganti_baru_m2 * $data->luas_tanah;

                    // Menghitung depresiasi fisik (untuk demonstrasi)
                    $tahun_sekarang = date('Y');
                    $tahun_bangunan = 2009; // Default jika tidak ada di database
                    $umur_ekonomis = 30; // Default jika tidak ada di database

                    $umur_aktual = $tahun_sekarang - $tahun_bangunan;
                    $data->depresiasi_fisik = min(100, round(($umur_aktual / $umur_ekonomis) * 100, 2));
                    $data->tahun_bangunan = $tahun_bangunan;
                    $data->umur_ekonomis = $umur_ekonomis;

                    // Menyiapkan nilai depresiasi lainnya
                    $data->depresiasi_maintenance = $data->maintenance ?? 0;
                    $data->depresiasi_kemunduran_fungsi = $data->kemunduran_fungsi ?? 0;
                    $data->depresiasi_kemunduran_ekonomis = $data->kemunduran_ekonomis ?? 0;

                    // Total depresiasi
                    $data->total_depresiasi = $data->depresiasi_fisik;

                    // Menghitung nilai pasar bangunan
                    $data->indikasi_nilai_pasar_bangunan_m2 = $data->indikasi_biaya_pengganti_baru_m2 * (1 - ($data->total_depresiasi / 100));
                    $data->indikasi_nilai_pasar_bangunan = $data->indikasi_nilai_pasar_bangunan_m2 * $data->luas_tanah;

                    // Indikasi nilai pasar tanah
                    $data->indikasi_nilai_pasar_tanah = $data->estimasi_transaksi - $data->indikasi_nilai_pasar_bangunan;
                    $data->indikasi_nilai_pasar_tanah_m2 = $data->luas_tanah > 0 ? $data->indikasi_nilai_pasar_tanah / $data->luas_tanah : 0;

                    // Mendapatkan IKK dari database
                    $provinsi_data = $data->provinsi; // Format: '1900_0.877'
                    if (!empty($provinsi_data)) {
                        // Ekstrak kode provinsi (angka sebelum underscore)
                        $kode_provinsi = explode('_', $provinsi_data)[0];

                        // Ambil data IKK dari database
                        $ikk_data = DB::table('ikk')
                            ->where('kode', $kode_provinsi)
                            ->first();

                        if ($ikk_data) {
                            $data->ikk_mappi = $ikk_data->ikk_mappi;
                        }
                    }
                }
            } else if ($sumber == 'Pembanding Retail') {
                $data = DB::table('pembanding_retail')
                    ->select(
                        'id',
                        'nama_retail as nama_pembanding',
                        'alamat',
                        'lat',
                        'long',
                        'jenis_aset',
                        'peruntukan',
                        'narasumber',
                        'harga_penawaran',
                        'diskon',
                        'luas_bangunan_total',
                        'luas_net',
                        'jenis_data',
                        'tgl_penawaran',
                        'letak_posisi_obyek',
                        'row_jalan',
                        'bentuk_tanah',
                        'foto_tampak_depan',
                        'foto_tampak_sisi_kiri',
                        'foto_tampak_sisi_kanan',
                        'foto_lainnya',
                        'penyusutan',
                        'kondisi_properti',
                        'estimasi_properti',
                        'spesifikasi_properti',
                        'jumlah_lantai',
                        'posisi_lantai',
                        'tingkat_hunian',
                        'tipe_jalan',
                        'kapasitas_jalan',
                        'kondisi_lingkungan_khusus',
                        'kondisi_lingkungan_lainnya',
                        'keterangan_tambahan_lainnya'
                    )
                    ->where('id', $id)
                    ->first();

                if ($data) {
                    // Decode narasumber JSON
                    if (!empty($data->narasumber)) {
                        $narsum = json_decode($data->narasumber, true);
                        $data->nama_narsum = $narsum[0] ?? '-';
                        $data->telepon = $narsum[1] ?? '-';
                        $data->jabatan = $narsum[2] ?? '-';
                    } else {
                        $data->nama_narsum = '-';
                        $data->telepon = '-';
                        $data->jabatan = '-';
                    }

                    // Decode penyusutan JSON
                    if (!empty($data->penyusutan)) {
                        $penyusutan = json_decode($data->penyusutan, true);
                        $data->penyusutan_fisik = $penyusutan['fisik'] ?? 0;
                        $data->penyusutan_fungsi = $penyusutan['fungsi'] ?? 0;
                        $data->penyusutan_ekonomis = $penyusutan['ekonomis'] ?? 0;
                        $data->penjelasan_fisik = $penyusutan['penjelasan_fisik'] ?? '-';
                        $data->penjelasan_fungsi = $penyusutan['penjelasan_fungsi'] ?? '-';
                        $data->penjelasan_ekonomis = $penyusutan['penjelasan_ekonomis'] ?? '-';
                    } else {
                        $data->penyusutan_fisik = 0;
                        $data->penyusutan_fungsi = 0;
                        $data->penyusutan_ekonomis = 0;
                        $data->penjelasan_fisik = '-';
                        $data->penjelasan_fungsi = '-';
                        $data->penjelasan_ekonomis = '-';
                    }

                    // Menghitung estimasi transaksi
                    $data->estimasi_transaksi = $data->harga_penawaran * (1 - ($data->diskon / 100));

                    // Menghitung indikasi nilai per m²
                    $luas = $data->luas_bangunan_total > 0 ? $data->luas_bangunan_total : 1;
                    $data->nilai_per_m2 = $data->estimasi_transaksi / $luas;

                    // Total penyusutan
                    $data->total_penyusutan = $data->penyusutan_fisik + $data->penyusutan_fungsi + $data->penyusutan_ekonomis;

                    // Indikasi biaya pengganti baru
                    $data->indikasi_biaya_pengganti_baru_m2 = 5500000; // Nilai contoh untuk retail
                    $data->indikasi_biaya_pengganti_baru = $data->indikasi_biaya_pengganti_baru_m2 * $luas;

                    // Indikasi nilai pasar bangunan
                    $faktor_penyusutan = (100 - $data->total_penyusutan) / 100;
                    $data->indikasi_nilai_pasar_bangunan_m2 = $data->indikasi_biaya_pengganti_baru_m2 * $faktor_penyusutan;
                    $data->indikasi_nilai_pasar_bangunan = $data->indikasi_nilai_pasar_bangunan_m2 * $luas;

                    // Indikasi nilai pasar tanah
                    $data->indikasi_nilai_pasar_tanah = $data->estimasi_transaksi - $data->indikasi_nilai_pasar_bangunan;
                    $luas_tanah = $data->luas_net > 0 ? $data->luas_net : 1;
                    $data->indikasi_nilai_pasar_tanah_m2 = $data->indikasi_nilai_pasar_tanah / $luas_tanah;
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
                        'foto_tampak_depan',
                        'tipe_spek',
                        'jenis_data',
                        'tgl_penawaran',
                        'provinsi',
                        'kode_pos',
                        'jumlah_lantai',
                        'tahun_dibangun',
                        'tahun_renovasi',
                        'bobot_renovasi',
                        'kondisi_visual',
                        'kondisi_bangunan',
                        'catatan_khusus',
                        'letak_posisi_obyek',
                        'tipe_jalan',
                        'kapasitas_jalan',
                        'kondisi_lingkungan',
                        'kondisi_lingkungan_lainnya',
                        'harga_sewa_per_tahun',
                        'maintenance',
                        'kemunduran_fungsi',
                        'kemunduran_ekonomis',
                        'penjelasan_kemunduran_fungsi',
                        'penjelasan_kemunduran_ekonomis'
                    )
                    ->where('id', $id)
                    ->first();

                // Perhitungan untuk pembanding bangunan
                if ($data) {
                    // Konversi ke nilai numerik yang benar
                    $data->harga_penawaran = floatval($data->harga_penawaran);
                    $data->diskon = floatval($data->diskon);
                    $data->luas_tanah = intval($data->luas_tanah);
                    $data->luas_bangunan_total = intval($data->luas_bangunan_total);
                    $data->bobot_renovasi = $data->bobot_renovasi ? floatval($data->bobot_renovasi) : 0;
                    $data->kemunduran_fungsi = $data->kemunduran_fungsi ? floatval($data->kemunduran_fungsi) : 0;
                    $data->kemunduran_ekonomis = $data->kemunduran_ekonomis ? floatval($data->kemunduran_ekonomis) : 0;

                    // Hitung estimasi transaksi
                    $data->estimasi_transaksi = $data->harga_penawaran * (1 - ($data->diskon / 100));

                    // Indikasi biaya pengganti baru (BRB)
                    $data->indikasi_biaya_pengganti_baru_m2 = 5691000; // Nilai default dari template
                    $data->indikasi_biaya_pengganti_baru = $data->indikasi_biaya_pengganti_baru_m2 * $data->luas_bangunan_total;

                    // Perhitungan depresiasi
                    $tahun_sekarang = date('Y');
                    $umur_bangunan = $tahun_sekarang - $data->tahun_dibangun;
                    $umur_ekonomis = 30; // Standar umur ekonomis bangunan

                    // Depresiasi fisik
                    $data->depresiasi_fisik = min(($umur_bangunan / $umur_ekonomis) * 100, 100);
                    if ($data->tahun_renovasi && $data->bobot_renovasi > 0) {
                        $umur_efektif = $tahun_sekarang - $data->tahun_renovasi;
                        $data->depresiasi_fisik = min(($umur_efektif / $umur_ekonomis) * 100 * (1 - $data->bobot_renovasi / 100) +
                            ($umur_bangunan / $umur_ekonomis) * 100 * ($data->bobot_renovasi / 100), 100);
                    }

                    // Maintenance depresiasi
                    $data->depresiasi_maintenance = $data->maintenance == 'Kurang Baik' ? 10 : 0;

                    // Total depresiasi
                    $data->total_depresiasi = min(
                        $data->depresiasi_fisik +
                            $data->depresiasi_maintenance +
                            floatval($data->kemunduran_fungsi) +
                            floatval($data->kemunduran_ekonomis),
                        100
                    );

                    // Kondisi fisik bangunan dalam persentase
                    $data->kondisi_fisik_persen = 100 - $data->total_depresiasi;

                    // Nilai pasar bangunan
                    $data->indikasi_nilai_pasar_bangunan_m2 = $data->indikasi_biaya_pengganti_baru_m2 *
                        (1 - ($data->total_depresiasi / 100));
                    $data->indikasi_nilai_pasar_bangunan = $data->indikasi_nilai_pasar_bangunan_m2 *
                        $data->luas_bangunan_total;

                    // Indikasi nilai pasar tanah
                    $data->indikasi_nilai_pasar_tanah = $data->estimasi_transaksi - $data->indikasi_nilai_pasar_bangunan;
                    $data->indikasi_nilai_pasar_tanah_m2 = $data->luas_tanah > 0 ?
                        $data->indikasi_nilai_pasar_tanah / $data->luas_tanah : 0;

                    // Mendapatkan IKK dari database
                    $provinsi_data = $data->provinsi; // Format: '1900_0.877'
                    if (!empty($provinsi_data)) {
                        // Ekstrak kode provinsi (angka sebelum underscore)
                        $kode_provinsi = explode('_', $provinsi_data)[0];

                        // Ambil data IKK dari database
                        $ikk_data = DB::table('ikk')
                            ->where('kode', $kode_provinsi)
                            ->first();

                        if ($ikk_data) {
                            $data->ikk_mappi = $ikk_data->ikk_mappi;
                        }
                    }

                    // Mendapatkan ILM (Indeks Lantai) dari database
                    if (!empty($data->jumlah_lantai) && !empty($data->tipe_spek)) {
                        // Ambil data indeks lantai dari database
                        $ilm_data = DB::table('indeks_lantai')
                            ->where('jumlah_lantai', $data->jumlah_lantai)
                            ->where('tipe_bangunan', $data->tipe_spek)
                            ->first();

                        if ($ilm_data) {
                            $data->ilm = $ilm_data->indeks;
                        }
                    } else {
                        $data->ilm = 0; // Nilai default
                    }
                }
            }

            if (!$data) {
                return redirect()->back()->with('error', 'Data tidak ditemukan');
            }

            // Tambahkan data tambahan yang diperlukan
            $data = (array)$data;
            $data['sumber'] = $sumber;

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
