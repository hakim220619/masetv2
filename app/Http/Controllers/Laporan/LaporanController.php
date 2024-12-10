<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
        public function laporan()
        {
                $object = DB::select("SELECT bangunan.id, bangunan.nama_bangunan,bangunan.nia, bangunan.lat, bangunan.long,bangunan.alamat, bangunan.id_category, 
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '3') as report
                FROM bangunan
                UNION 
                SELECT tanah_kosong.id, tanah_kosong.nama_bangunan,tanah_kosong.nia, tanah_kosong.lat, tanah_kosong.long,tanah_kosong.alamat, tanah_kosong.id_category ,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '3') as report
                FROM tanah_kosong 
                UNION 
                SELECT retail.id, retail.nama_bangunan,retail.nia, retail.lat, retail.long, retail.alamat, retail.id_category,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '3') as report 
                FROM retail");
                                $coordinates = DB::select("SELECT bangunan.id, bangunan.nama_bangunan,bangunan.nia, bangunan.lat, bangunan.long,bangunan.alamat, bangunan.id_category, 
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '3') as report
                FROM bangunan
                UNION 
                SELECT tanah_kosong.id, tanah_kosong.nama_bangunan,tanah_kosong.nia, tanah_kosong.lat, tanah_kosong.long,tanah_kosong.alamat, tanah_kosong.id_category ,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '3') as report
                FROM tanah_kosong 
                UNION 
                SELECT retail.id, retail.nama_bangunan,retail.nia, retail.lat, retail.long, retail.alamat, retail.id_category,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '3') as report 
                FROM retail ");
                $pembanding_bangunan = DB::select("SELECT pembanding_bangunan.nama_tanah_n_bangunan, pembanding_bangunan.alamat, pembanding_bangunan.harga_penawaran, pembanding_bangunan.luas_tanah, pembanding_bangunan.lat, pembanding_bangunan.long FROM `pembanding_bangunan`");
                $pembanding_tanah_kosong = DB::select("SELECT pembanding_tanah_kosong.nama_tanah_kosong, pembanding_tanah_kosong.alamat, pembanding_tanah_kosong.harga_penawaran, pembanding_tanah_kosong.luas_tanah, pembanding_tanah_kosong.lat, pembanding_tanah_kosong.long FROM `pembanding_tanah_kosong`");
                $pembanding_retail = DB::select("SELECT pembanding_retail.nama_retail, pembanding_retail.alamat, pembanding_retail.harga_penawaran, pembanding_retail.luas_net, pembanding_retail.lat, pembanding_retail.long FROM `pembanding_retail`");
                
                return view('content.laporan.laporan', compact('object', 'coordinates','pembanding_bangunan','pembanding_tanah_kosong','pembanding_retail'));
        }
        public function getCoordinates(Request $request)
        {
                $object = DB::select("SELECT bangunan.id, bangunan.nama_bangunan,bangunan.nia, bangunan.lat, bangunan.long,bangunan.alamat, bangunan.id_category, 
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '3') as report
                FROM bangunan
                UNION 
                SELECT tanah_kosong.id, tanah_kosong.nama_bangunan,tanah_kosong.nia, tanah_kosong.lat, tanah_kosong.long,tanah_kosong.alamat, tanah_kosong.id_category ,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '3') as report
                FROM tanah_kosong 
                UNION 
                SELECT retail.id, retail.nama_bangunan,retail.nia, retail.lat, retail.long, retail.alamat, retail.id_category,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '3') as report 
                FROM retail ");
                                $coordinates = DB::select("SELECT bangunan.id, bangunan.nama_bangunan,bangunan.nia, bangunan.lat, bangunan.long,bangunan.alamat, bangunan.id_category, 
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=bangunan.id AND a.id_category_object=bangunan.id_category AND a.id_role = '3') as report
                FROM bangunan
                UNION 
                SELECT tanah_kosong.id, tanah_kosong.nama_bangunan,tanah_kosong.nia, tanah_kosong.lat, tanah_kosong.long,tanah_kosong.alamat, tanah_kosong.id_category ,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=tanah_kosong.id AND a.id_category_object=tanah_kosong.id_category AND a.id_role = '3') as report
                FROM tanah_kosong 
                UNION 
                SELECT retail.id, retail.nama_bangunan,retail.nia, retail.lat, retail.long, retail.alamat, retail.id_category,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '1') as surveyor,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '2') as penilai,  
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '3') as reviewer,
                (SELECT IF(a.status = 'true', 'ACCEPT', 'OFF') from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '5') as Penilai_public,
                (SELECT a.last_update from approval a where a.id_object=retail.id AND a.id_category_object=retail.id_category AND a.id_role = '3') as report 
                FROM retail ");
                $pembanding_bangunan = DB::select("SELECT pembanding_bangunan.nama_tanah_n_bangunan, pembanding_bangunan.alamat, pembanding_bangunan.harga_penawaran, pembanding_bangunan.luas_tanah, pembanding_bangunan.lat, pembanding_bangunan.long FROM `pembanding_bangunan`");
                $pembanding_tanah_kosong = DB::select("SELECT pembanding_tanah_kosong.nama_tanah_kosong, pembanding_tanah_kosong.alamat, pembanding_tanah_kosong.harga_penawaran, pembanding_tanah_kosong.luas_tanah, pembanding_tanah_kosong.lat, pembanding_tanah_kosong.long FROM `pembanding_tanah_kosong`");
                $pembanding_retail = DB::select("SELECT pembanding_retail.nama_retail, pembanding_retail.alamat, pembanding_retail.harga_penawaran, pembanding_retail.luas_net, pembanding_retail.lat, pembanding_retail.long FROM `pembanding_retail`");

                return response()->json(['object' => $object, 'coordinates' => $coordinates, 'pembanding_bangunan'=>$pembanding_bangunan,'pembanding_tanah_kosong'=>$pembanding_tanah_kosong,'pembanding_retail' => $pembanding_retail]);
        }
}
