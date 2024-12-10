<?php

namespace App\Models;

use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GeneralModel extends Model
{
    use HasFactory;

    public static function GetListRoleStructure()
    {
        if (Auth::user()->role_structure == Helpers::getRoleStructureJson()[3]) {
            $data = DB::select('select ROW_NUMBER() OVER () AS no, rs.* from role_structure rs where 1=1
            ORDER BY ROW_NUMBER() OVER () asc');
        } else {
            $data = DB::select('select ROW_NUMBER() OVER () AS no, rs.* from role_structure rs where rs.rs_id != ' . Helpers::getRoleStructureJson()[3] . '
        ORDER BY ROW_NUMBER() OVER () asc');
        }
        return $data;
    }
    public static function listUsersLogs()
    {
        if (Auth::user()->role_structure != Helpers::getRoleStructureJson()[3]) {
            if (Auth::user()->role_structure == 33 || Auth::user()->role_structure == 34 || Auth::user()->role_structure == 35) {
                $data = DB::select('select ROW_NUMBER() OVER () AS no,  ml.id as logs_id, ml.activity, ml.detail, ml.action, ml.ip, ml.created_at, rs.rs_name,
                    IF(ml.user_id = null, "", (SELECT u.name FROM users u WHERE u.id=ml.user_id) ) as name, 
            IF(ml.role_access = null, "", (SELECT ra.ra_name FROM role_access ra WHERE ra.ra_id=ml.role_access) ) as ra_name, 
            IF(ml.role = null, "", (SELECT r.role_name FROM role r WHERE r.role_id=ml.role) ) as role_name,
            u.*
            from mm_logs ml, role_structure rs, users u
            where ml.role_structure=rs.rs_id 
            AND ml.user_id=u.id 
           and rs.rs_name like  "%' . User::getProfileById()->rs_name . '%"
            ORDER BY ROW_NUMBER() OVER () asc');
            } elseif (Auth::user()->role_access == 2) {
                $data = DB::select('select ROW_NUMBER() OVER () AS no,  ml.id as logs_id, ml.activity, ml.detail, ml.action, ml.ip, ml.created_at, rs.rs_name,
                    IF(ml.user_id = null, "", (SELECT u.name FROM users u WHERE u.id=ml.user_id) ) as name, 
            IF(ml.role_access = null, "", (SELECT ra.ra_name FROM role_access ra WHERE ra.ra_id=ml.role_access) ) as ra_name, 
            IF(ml.role = null, "", (SELECT r.role_name FROM role r WHERE r.role_id=ml.role) ) as role_name,
            u.*
            from mm_logs ml, role_structure rs, users u
            where ml.role_structure=rs.rs_id 
            AND ml.user_id=u.id 
           and rs.rs_name like  "%' . User::getProfileById()->rs_name . '%"
            ORDER BY ROW_NUMBER() OVER () asc');
            } elseif (Auth::user()->role_access == 1) {
                $data = DB::select('select ROW_NUMBER() OVER () AS no,  ml.id as logs_id, ml.activity, ml.detail, ml.action, ml.ip, ml.created_at, rs.rs_name,
                    IF(ml.user_id = null, "", (SELECT u.name FROM users u WHERE u.id=ml.user_id) ) as name, 
            IF(ml.role_access = null, "", (SELECT ra.ra_name FROM role_access ra WHERE ra.ra_id=ml.role_access) ) as ra_name, 
            IF(ml.role = null, "", (SELECT r.role_name FROM role r WHERE r.role_id=ml.role) ) as role_name,
            u.*
            from mm_logs ml, role_structure rs, users u
            where ml.role_structure=rs.rs_id 
            AND ml.user_id=u.id 
            and ml.user_id =  ' . User::getProfileById()->id . '
            ORDER BY ROW_NUMBER() OVER () asc');
            }
        } else {
            $data = DB::select('select ROW_NUMBER() OVER () AS no,  ml.id as logs_id, ml.activity, ml.detail, ml.action, ml.ip, ml.created_at, rs.rs_name,
                    IF(ml.user_id = null, "", (SELECT u.name FROM users u WHERE u.id=ml.user_id) ) as name, 
            IF(ml.role_access = null, "", (SELECT ra.ra_name FROM role_access ra WHERE ra.ra_id=ml.role_access) ) as ra_name, 
            IF(ml.role = null, "", (SELECT r.role_name FROM role r WHERE r.role_id=ml.role) ) as role_name,
            u.*
            from mm_logs ml, role_structure rs, users u
            where ml.role_structure=rs.rs_id 
            AND ml.user_id=u.id
            ORDER BY ROW_NUMBER() OVER () asc');
        }
        return $data;
    }
    public static function listDataOptions()
    {
        $data = DB::select("SELECT * FROM master_data WHERE 1=1 ORDER BY label_header, label_option ASC");
        return $data;
    }
    public static function saveHeaderOptions($request)
    {
        DB::table('master_data')->insert([
            'uid' => 'Hdr' . date('Ymdhms'),
            'label_header' => $request['header'],
            'type' => 'Header',
            'state' => $request['state'],
            'created_at' => now(),
        ]);
    }
    public static function saveOptions($request)
    {
        $getUid = DB::table('master_data')->where('label_header', $request['id'])->first();
        if ($getUid) {
            DB::table('master_data')->insert([
                'uid' => $getUid->uid,
                'label_header' => $getUid->label_header,
                'label_option' => $request['option'],
                'type' => 'Options',
                'state' => $request['state'],
                'created_at' => now(),
            ]);
        }
    }
    public static function editHeader($request, $label)
    {
        DB::table('master_data')->where('label_header', $label)->update([
            'label_header' => $request['header'],
            'state' => $request['state']
        ]);
    }
    public static function updateOption($request, $id)
    {
        DB::table('master_data')->where('id', $id)->update([
            'label_option' => $request['option'],
            'state' => $request['state']
        ]);
    }
    public static function destroyOptionHeader($label)
    {
        DB::table('master_data')->where('label_header', $label)->delete();
    }
    public static function destroyOption($request)
    {
        DB::table('master_data')->where('id', $request['id'])->delete();
    }
    public static function getBroadcastByAplikasi($uid)
    {
        $data = DB::table('broadcast_aplikasi')->where('uid', $uid)->first();
        return $data;
    }
    public static function broadcastByAplikasiDelete($uid)
    {
        $data = DB::table('broadcast_aplikasi')->where('uid', $uid)->delete();
        $data = DB::table('broadcast_aplikasi_access')->where('ba_id', $uid)->delete();
        return $data;
    }
    public static function checkEmail($request)
    {

        $data = DB::table('users')->where('email', $request->email)->first();
        if (isset($data->email)) {
            return $data->email;
        }
    }
    public static function checkNik($request)
    {

        $data = DB::table('users')->where('nik', $request->nik)->first();
        if (isset($data->nik)) {
            return $data->nik;
        }
    }
    public static function checkKontak($request)
    {

        $data = DB::table('users')->where('kontak', $request->kontak)->first();
        if (isset($data->kontak)) {
            return $data->kontak;
        }
    }

    public static function ProsesAddRoleStructure($request)
    {

        $data = [
            'rs_name' => $request->rs_name,
            'rs_status' => 'ACTIVE',
            'rs_created_at' => now()
        ];
        DB::table('role_structure')->insert($data);
        $mmLogsData['activity'] = 'ProsesAddRoleStructure berhasil';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Insert';
        Helpers::mmLogs($mmLogsData);
    }


    public static function ProsesUpdateRoleStructure($request)
    {

        $data = [
            'rs_name' => $request->rs_name,
            'rs_status' => $request->rs_status,
            'rs_created_at' => now()
        ];
        DB::table('role_structure')->where('rs_id', $request->rs_id)->update($data);
        $mmLogsData['activity'] = 'ProsesUpdateRoleStructure berhasil dengan id ' . $request->rs_id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        Helpers::mmLogs($mmLogsData);
    }


    public static function ProsesDeletRoleStructure($id)
    {
        $data = DB::table('role_structure')->where('rs_id', $id)->delete();
        $mmLogsData['activity'] = 'ProsesDeletRoleStructure berhasil dengan id ' . $id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Delete';
        Helpers::mmLogs($mmLogsData);
    }

    public static function GetListRoleAccess()
    {
        if (Auth::user()->role_access == Helpers::getRoleStructureJson()[2]) {
            $data = DB::select('select ROW_NUMBER() OVER () AS no, ra.* from role_access ra where 1=1
        ORDER BY ROW_NUMBER() OVER () asc');
        } else {
            $data = DB::select('select ROW_NUMBER() OVER () AS no, ra.* from role_access ra where ra.ra_id != ' . Helpers::getRoleStructureJson()[2] . '
            ORDER BY ROW_NUMBER() OVER () asc');
        }
        return $data;
    }
    public static function ProsesAddRoleAccess($request)
    {

        $data = [
            'ra_name' => $request->ra_name,
            'ra_status' => 'ACTIVE',
            'ra_created_at' => now()
        ];
        DB::table('role_access')->insert($data);
        $mmLogsData['activity'] = 'ProsesAddRoleAccess berhasil';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Insert';
        Helpers::mmLogs($mmLogsData);
    }

    public static function ProsesUpdateRoleAccess($request)
    {

        $data = [
            'ra_name' => $request->ra_name,
            'ra_status' => $request->ra_status,
            'ra_created_at' => now()
        ];
        DB::table('role_access')->where('ra_id', $request->ra_id)->update($data);
        $mmLogsData['activity'] = 'ProsesUpdateRoleAccess berhasil dengan id ' . $request->ra_id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        Helpers::mmLogs($mmLogsData);
    }
    public static function ProsesDeletRoleAccess($id)
    {
        $data = DB::table('role_access')->where('ra_id', $id)->delete();
        $mmLogsData['activity'] = 'ProsesDeletRoleAccess berhasil dengan id ' . $id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Delete';
        Helpers::mmLogs($mmLogsData);
    }
    public static function GetListRole()
    {
        if (Auth::user()->role == Helpers::getRoleStructureJson()[3]) {
            $data = DB::select('select ROW_NUMBER() OVER () AS no, r.* from role r where 1=1
        ORDER BY ROW_NUMBER() OVER () asc');
        } else {
            $data = DB::select('select ROW_NUMBER() OVER () AS no, r.* from role r where role_id != ' . Helpers::getRoleStructureJson()[3] . '
        ORDER BY ROW_NUMBER() OVER () asc');
        }
        return $data;
    }
    public static function broadcastByListaplikasi()
    {

        $data = DB::select('select ROW_NUMBER() OVER () AS no, ba.* from broadcast_aplikasi ba ORDER BY ROW_NUMBER() OVER () asc');

        return $data;
    }
    public static function broadcastByAplikasiRead($uid)
    {
        $data = ['status' => 'Read'];
        DB::table('broadcast_aplikasi_access')->where('ba_id', $uid)->where('user_id', Auth::user()->id)->update($data);
        $mmLogsData['activity'] = 'Read Broadcast By Aplikasi';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        Helpers::mmLogs($mmLogsData);
        $data = DB::select('select ROW_NUMBER() OVER () AS no, ba.* from broadcast_aplikasi ba where ba.uid = "' . $uid . '" ORDER BY ROW_NUMBER() OVER () asc');
        return $data[0];
    }
    public static function getUserByRoleAccess($request)
    {
        $roleAccess = '';
        if ($request->role_access != 'all') {
            $roleAccess .= ' and u.role_access = ' . $request->role_access . '';
        }
        if (Auth::user()->role_structure != Helpers::getRoleStructureJson()[3]) {
            if (Auth::user()->role_structure == 33 || Auth::user()->role_structure == 34 || Auth::user()->role_structure == 35) {
                $data = DB::select('select ROW_NUMBER() OVER () AS no,  u.*, rs.rs_name,
                IF(u.role_access = null, "", (SELECT ra.ra_name FROM role_access ra WHERE ra.ra_id=u.role_access) ) as ra_name, 
                IF(u.role = null, "", (SELECT r.role_name FROM role r WHERE r.role_id=u.role) ) as role_name 
                from users u, role_structure rs
                where u.role_structure=rs.rs_id 
                and rs.rs_name like  "%' . Helpers::getProfileById()->rs_name . '%"
                ' .  $roleAccess . '
                ORDER BY ROW_NUMBER() OVER () asc');
            } else {
                $data = DB::select('select ROW_NUMBER() OVER () AS no,  u.*, rs.rs_name,
                IF(u.role_access = null, "", (SELECT ra.ra_name FROM role_access ra WHERE ra.ra_id=u.role_access) ) as ra_name, 
                IF(u.role = null, "", (SELECT r.role_name FROM role r WHERE r.role_id=u.role) ) as role_name 
                from users u, role_structure rs
                where u.role_structure=rs.rs_id 
                and rs.rs_id =  "' . Helpers::getProfileById()->role_structure . '"
               ' . $roleAccess . '
                ORDER BY ROW_NUMBER() OVER () asc');
            }
        } else {

            $data = DB::select('select ROW_NUMBER() OVER () AS no,  u.*, rs.rs_name , ra.ra_name ,r.role_name  from users u, role_structure rs, role_access ra, role r 
                where u.role_structure=rs.rs_id 
                and u.role_access=ra.ra_id 
                and u.role=r.role_id 
                ' . $roleAccess . '
                ORDER BY ROW_NUMBER() OVER () asc');
        }
        return $data;
    }
    public static function ProsesAddRole($request)
    {

        $data = [
            'role_name' => $request->role_name,
            'role_status' => 'ACTIVE',
            'role_created_at' => now()
        ];
        DB::table('role')->insert($data);
        $mmLogsData['activity'] = 'ProsesAddRole berhasil';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Insert';
        Helpers::mmLogs($mmLogsData);
    }

    public static function ProsesUpdateRole($request)
    {

        $data = [
            'role_name' => $request->role_name,
            'role_status' => $request->role_status,
            'role_created_at' => now()
        ];
        DB::table('role')->where('role_id', $request->role_id)->update($data);
        $mmLogsData['activity'] = 'ProsesUpdateRole berhasil dengan id ' . $request->role_id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        Helpers::mmLogs($mmLogsData);
    }
    public static function ProsesDeletRole($id)
    {
        $data = DB::table('role')->where('role_id', $id)->delete();
        $mmLogsData['activity'] = 'ProsesDeletRole berhasil dengan id ' . $id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Delete';
        Helpers::mmLogs($mmLogsData);
    }
    public static function aplikasiProsess($request)
    {
        $uid = Str::random(40);
        $uidData = '';
        $dataUid = DB::table('broadcast_aplikasi')->where('uid', $uid)->first();
        if ($dataUid == null) {
            $uidData = $uid;
        } else {
            $uidData = $uid . strtotime(now());
        }
        $data = [
            'uid' => $uidData,
            'title' => $request->title,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::user()->id,
            'body' => $request->body,
            'status' => 'ON',
            'created_at' => now()
        ];
        DB::table('broadcast_aplikasi')->insert($data);
        foreach ($request->users as $key => $user_id) {
            $getDataUsers = User::where('id', $user_id)->first();
            $data = [
                'ba_id' => $uidData,
                'user_id' => $user_id,
                'role_structure' => $getDataUsers->role_structure,
                'role_access' => $getDataUsers->role_access,
                'role' => $getDataUsers->role,
                'status' => 'Delivered',
                'created_at' => now()
            ];
            DB::table('broadcast_aplikasi_access')->insert($data);
            $mmLogsData['activity'] = 'Broadcast AplikasiProsess By Id berhasil';
            $mmLogsData['detail'] = $data;
            $mmLogsData['action'] = 'Insert';
            Helpers::mmLogs($mmLogsData);
        }
        $mmLogsData['activity'] = 'Broadcast aplikasiProsess berhasil';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Insert';
        Helpers::mmLogs($mmLogsData);
    }
    public static function aplikasiProsessUpdate($request)
    {
        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'updated_at' => now()
        ];
        DB::table('broadcast_aplikasi')->where('id', $request->id)->update($data);
        $mmLogsData['activity'] = 'aplikasiProsessUpdate berhasil';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        Helpers::mmLogs($mmLogsData);
    }
}
