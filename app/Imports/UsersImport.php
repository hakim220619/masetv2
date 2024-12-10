<?php

namespace App\Imports;

use Illuminate\Support\Str;
use App\Models\StudentModel;
use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        try {
            // header('Access-Control-Allow-Origin: *');

            ini_set('max_execution_time', 0);
            // dd($row);
            $getIdRoleStructure = DB::table('role_structure')->select('rs_id')->where('rs_name', $row['role_structure'])->first();
            $getIdRoleAccess = DB::table('role_access')->where('ra_name', $row['role_access'])->first();
            $getIdRoleRole = DB::table('role')->where('role_name', $row['role'])->first();
            // dd(strval($getIdClass->id));
            return new User([
                'uid' => Str::random(40) . date('Hms'),
                'nik' => $row['nik'],
                'name' => $row['name'],
                'email' => $row['email'],
                'kontak' => $row['kontak'],
                'status' => 'INACTIVE',
                'role_access' => intval($getIdRoleAccess->ra_id),
                'role_structure' => intval($getIdRoleStructure->rs_id),
                'role' => intval($getIdRoleRole->role_id),
                'alamat' => $row['alamat'],
                'password' => Hash::make(12345678),
                'created_at' => now()

            ]);
        } catch (Exception $e) {
            //throw $th;
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
}
