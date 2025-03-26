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
            // Pastikan page adalah integer dan minimal 1
            $page = max(1, intval($page));
            $perPage = intval($perPage);

            $query = DB::table('bangunan')->orderBy('created_at', 'desc');

            // Pilih kolom yang dibutuhkan
            $query->select('id', 'nama_bangunan', 'created_at');

            // Tambahkan kolom opsional jika ada
            $columns = Schema::getColumnListing('bangunan');

            if (in_array('jenis_bangunan', $columns)) {
                $query->addSelect('jenis_bangunan');
            }

            if (in_array('alamat', $columns)) {
                $query->addSelect('alamat');
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

            // Clone query untuk mendapatkan total sebelum pagination
            $countQuery = clone $query;
            $total = $countQuery->count();

            // Hitung offset dengan benar untuk pagination
            $offset = ($page - 1) * $perPage;

            // Tambahkan debug log
            Log::info("Pagination untuk halaman {$page}, offset {$offset}, limit {$perPage}");

            // Ambil data dengan pagination
            $data = $query->offset($offset)
                ->limit($perPage)
                ->get();

            Log::info("Data yang diambil: " . count($data));

            // Format data untuk response
            $formattedData = [];
            foreach ($data as $item) {
                $formattedItem = [
                    'id' => $item->id,
                    'nama_bangunan' => $item->nama_bangunan,
                    'created_at' => date('d-m-Y', strtotime($item->created_at)),
                ];

                // Tambahkan kolom opsional jika ada
                $formattedItem['alamat'] = isset($item->alamat) ? $item->alamat : 'Tidak ada alamat';
                $formattedItem['jenis_bangunan'] = isset($item->jenis_bangunan) ? $item->jenis_bangunan : 'Tidak ada jenis';
                $formattedItem['foto_depan'] = isset($item->foto_depan) ? $item->foto_depan : 'default.jpg';
                $formattedItem['status_data'] = isset($item->status_data) ? $item->status_data : 'Aktif';

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
            Log::error('ListObject Error: ' . $e->getMessage() . ' | ' . $e->getTraceAsString());

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
