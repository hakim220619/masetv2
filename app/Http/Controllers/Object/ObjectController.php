<?php

namespace App\Http\Controllers\Object;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ObjectController extends Controller
{
    public function lihat_object()
    {


        $objects = [
            (object) [
                'name' => 'Gudang Bu Fenny',
                'type' => 'Bangunan',
                'building_type' => 'Bangunan Gudang 1 Lantai',
                'date' => '18 Dec 2024',
                'status' => 'Published',
                'image' => 'https://via.placeholder.com/300', // Gambar dummy
            ],
            (object) [
                'name' => 'Pos Jaga Belakang (Jesicca)',
                'type' => 'Bangunan',
                'building_type' => 'Rumah Tinggal Sederhana 1 Lantai',
                'date' => '17 Dec 2024',
                'status' => 'Draft',
                'image' => 'https://via.placeholder.com/300', // Gambar dummy
            ],
            (object) [
                'name' => 'Mess 6 (Jesicca)',
                'type' => 'Bangunan',
                'building_type' => 'Rumah Tinggal Sederhana 1 Lantai',
                'date' => '17 Dec 2024',
                'status' => 'Draft',
                'image' => 'https://via.placeholder.com/300', // Gambar dummy
            ],
            (object) [
                'name' => 'Mess 5 (Jesicca)',
                'type' => 'Bangunan',
                'building_type' => 'Bangunan Perkebunan (Semi Permanen) 1 Lantai',
                'date' => '17 Dec 2024',
                'status' => 'Draft',
                'image' => 'https://via.placeholder.com/300', // Gambar dummy
            ],
            (object) [
                'name' => 'Mess 3 dan Mess 4 (Jesicca)',
                'type' => 'Bangunan',
                'building_type' => 'Rumah Tinggal Sederhana 1 Lantai',
                'date' => '17 Dec 2024',
                'status' => 'Draft',
                'image' => 'https://via.placeholder.com/300', // Gambar dummy
            ],
        ];
        //query tabel object

        return view('content.object.lihat_object', compact('objects'));
    }
}
