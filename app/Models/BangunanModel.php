<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class BangunanModel extends Model
{
    use HasFactory;
    public static function bangunanLoadData()
    {
        $data = DB::select('SELECT ROW_NUMBER() OVER () AS no, (SELECT a.last_update FROM approval a WHERE a.id_object=b.id AND a.id_role = "1" AND a.id_category_object = "1") as last_update, b.*
            FROM bangunan b, object_category oc 
            WHERE b.id_category=oc.id 
            AND b.id_category = 1
            ORDER BY no ASC');
        return $data;
    }
    public static function tanahKosongLoadData()
    {
        $data = DB::select('SELECT ROW_NUMBER() OVER () AS no, (SELECT a.last_update FROM approval a WHERE a.id_object=t.id AND a.id_role = "1" AND a.id_category_object = "2") as last_update, t.* 
        FROM tanah_kosong t, object_category oc 
        WHERE t.id_category=oc.id 
        AND t.id_category = 2
        ORDER BY no ASC');
        return $data;
    }
    public static function retailLoadData()
    {
        $data = DB::select('SELECT ROW_NUMBER() OVER () AS no, (SELECT a.last_update FROM approval a WHERE a.id_object=r.id AND a.id_role = "1" AND a.id_category_object = "3") as last_update, r.* 
        FROM retail r, object_category oc 
        WHERE r.id_category=oc.id 
        AND r.id_category = 3
        ORDER BY no ASC');
        return $data;
    }

    public static function listObject($search = null, $type = null, $page = 1, $perPage = 6)
    {
        try {
            $query = DB::table('bangunan')->orderBy('created_at', 'desc');

            // Pilih kolom yang pasti ada di tabel
            $query->select('id', 'nama_bangunan', 'alamat', 'created_at');

            // Tambahkan kolom opsional dengan pengecekan
            $columns = Schema::getColumnListing('bangunan');

            if (in_array('jenis_bangunan', $columns)) {
                $query->addSelect('jenis_bangunan');
            }

            if (in_array('foto_depan', $columns)) {
                $query->addSelect('foto_depan');
            } else if (in_array('foto_tampak_depan', $columns)) {
                $query->addSelect('foto_tampak_depan as foto_depan');
            }

            if (in_array('status_data', $columns)) {
                $query->addSelect('status_data');
            }

            // Filter berdasarkan pencarian jika ada
            if (!empty($search)) {
                $query->where(function ($q) use ($search, $columns) {
                    $q->where('nama_bangunan', 'like', "%{$search}%");

                    if (in_array('alamat', $columns)) {
                        $q->orWhere('alamat', 'like', "%{$search}%");
                    }

                    if (in_array('jenis_bangunan', $columns)) {
                        $q->orWhere('jenis_bangunan', 'like', "%{$search}%");
                    }
                });
            }

            // Filter berdasarkan tipe objek jika ada
            if (!empty($type) && in_array('jenis_bangunan', $columns)) {
                $query->where('jenis_bangunan', $type);
            }

            // Hitung total data untuk pagination
            $total = $query->count();

            // Hitung offset dengan benar
            $offset = ($page - 1) * $perPage;

            // Ambil data dengan pagination
            $data = $query->orderBy('created_at', 'desc')
                ->offset($offset)
                ->limit($perPage)
                ->get();

            // Format data untuk response
            $formattedData = [];
            foreach ($data as $item) {
                $formattedItem = [
                    'id' => $item->id,
                    'nama_bangunan' => $item->nama_bangunan,
                    'alamat' => $item->alamat ?? 'Tidak ada alamat',
                    'created_at' => date('d-m-Y', strtotime($item->created_at)),
                ];

                // Tambahkan kolom opsional jika ada
                if (isset($item->jenis_bangunan)) {
                    $formattedItem['jenis_bangunan'] = $item->jenis_bangunan;
                } else {
                    $formattedItem['jenis_bangunan'] = 'Tidak ada jenis';
                }

                if (isset($item->foto_depan)) {
                    $formattedItem['foto_depan'] = $item->foto_depan;
                } else {
                    $formattedItem['foto_depan'] = 'default.jpg';
                }

                if (isset($item->status_data)) {
                    $formattedItem['status_data'] = $item->status_data;
                } else {
                    $formattedItem['status_data'] = 'Aktif';
                }

                $formattedData[] = $formattedItem;
            }

            return [
                'data' => $formattedData,
                'current_page' => (int)$page,
                'last_page' => ceil($total / $perPage),
                'total' => $total,
                'per_page' => $perPage
            ];
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('ListObject Error: ' . $e->getMessage());

            // Coba query paling sederhana sebagai fallback
            try {
                $simpleData = DB::table('bangunan')
                    ->select('id', 'nama_bangunan', 'created_at')
                    ->orderBy('created_at', 'desc')
                    ->limit($perPage)
                    ->get()
                    ->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'nama_bangunan' => $item->nama_bangunan,
                            'alamat' => 'Tidak tersedia',
                            'jenis_bangunan' => 'Tidak tersedia',
                            'created_at' => date('d-m-Y', strtotime($item->created_at)),
                            'foto_depan' => 'default.jpg',
                            'status_data' => 'Aktif'
                        ];
                    });

                $total = DB::table('bangunan')->count();

                return [
                    'data' => $simpleData,
                    'total' => $total,
                    'current_page' => (int)$page,
                    'per_page' => $perPage,
                    'last_page' => ceil($total / $perPage),
                    'note' => 'Data ditampilkan dalam mode sederhana karena terjadi error'
                ];
            } catch (\Exception $fallbackError) {
                Log::error('Fallback query error: ' . $fallbackError->getMessage());

                // Return empty data dengan format yang sama
                return [
                    'data' => [],
                    'total' => 0,
                    'current_page' => (int)$page,
                    'per_page' => $perPage,
                    'last_page' => 1,
                    'error' => 'Terjadi kesalahan saat memuat data'
                ];
            }
        }
    }
}
