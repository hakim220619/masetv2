<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReviewersModel extends Model
{
    use HasFactory;
    public static function bangunanLoadData()
    {
        $data = DB::select('SELECT ROW_NUMBER() OVER () AS no, (SELECT a.last_update FROM approval a WHERE a.id_object=b.id AND a.id_role = "3" AND a.id_category_object = "1") as last_update, b.*
            FROM bangunan b, object_category oc 
            WHERE b.id_category=oc.id 
            AND b.id_category = 1
            ORDER BY no ASC');
        return $data;
    }
    public static function tanahKosongLoadData()
    {
        $data = DB::select('SELECT ROW_NUMBER() OVER () AS no, (SELECT a.last_update FROM approval a WHERE a.id_object=t.id AND a.id_role = "3" AND a.id_category_object = "2") as last_update, t.* 
        FROM tanah_kosong t, object_category oc 
        WHERE t.id_category=oc.id 
        AND t.id_category = 2
        ORDER BY no ASC');
        return $data;
    }
    public static function retailLoadData()
    {
        $data = DB::select('SELECT ROW_NUMBER() OVER () AS no, (SELECT a.last_update FROM approval a WHERE a.id_object=r.id AND a.id_role = "3" AND a.id_category_object = "3") as last_update, r.* 
        FROM retail r, object_category oc 
        WHERE r.id_category=oc.id 
        AND r.id_category = 3
        ORDER BY no ASC');
        return $data;
    }
}
