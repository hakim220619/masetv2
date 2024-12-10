<?php

namespace App\Http\Controllers\Users;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function users()
    {

        if (Auth::user()->role_structure != Helpers::getRoleStructureJson()[3]) {
            if (Auth::user()->role_structure == 32 || Auth::user()->role_structure == 33 || Auth::user()->role_structure == 34) {
                $data['total_users'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and rs.rs_name like  '%" . User::getProfileById()->rs_name . "%' ")[0];
                $data['status_active'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.status = 'ACTIVE' and rs.rs_name like  '%" . User::getProfileById()->rs_name . "%' ")[0];
                $data['status_inactive'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.status = 'INACTIVE' and rs.rs_name like  '%" . User::getProfileById()->rs_name . "%' ")[0];
                $data['status_suspended'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.status = 'SUSPENDED' and rs.rs_name like  '%" . User::getProfileById()->rs_name . "%' ")[0];
                $data['active'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.active = 'ON' and rs.rs_name like  '%" . User::getProfileById()->rs_name . "%' ")[0];
            } else {
                $data['total_users'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and rs.rs_name = '" . User::getProfileById()->rs_name . "' ")[0];
                $data['status_active'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.status = 'ACTIVE' and rs.rs_name = '" . User::getProfileById()->rs_name . "' ")[0];
                $data['status_inactive'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.status = 'INACTIVE' and rs.rs_name = '" . User::getProfileById()->rs_name . "' ")[0];
                $data['status_suspended'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.status = 'SUSPENDED' and rs.rs_name = '" . User::getProfileById()->rs_name . "' ")[0];
                $data['active'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.active = 'ON' and rs.rs_name = '" . User::getProfileById()->rs_name . "' ")[0];
            }
        } else {
            $data['total_users'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and rs.rs_name != '" . User::getProfileById()->rs_name . "' ")[0];
            $data['status_active'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.status = 'ACTIVE' and rs.rs_name != '" . User::getProfileById()->rs_name . "' ")[0];
            $data['status_inactive'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.status = 'INACTIVE' and rs.rs_name != '" . User::getProfileById()->rs_name . "' ")[0];
            $data['status_suspended'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.status = 'SUSPENDED' and rs.rs_name != '" . User::getProfileById()->rs_name . "' ")[0];
            $data['active'] = DB::select("select count(u.id) as total from users u, role_structure rs where u.role_structure=rs.rs_id and u.active = 'ON' and rs.rs_name != '" . User::getProfileById()->rs_name . "' ")[0];
        }
        $data['role_structure'] = Auth::user()->role_structure;
        return view('content.users.user-list', $data);
    }
    function userList()
    {
        $data = User::GetListuser();
        // dd($data);
        return response()->json([
            'success' => true,
            'message' => 'Data',
            'data' => $data,
        ]);
    }

    function addProses(Request $request)
    {
        // dd($request->all());
        User::ProsesAddUsers($request);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Add Userss Successs',
        ]);
    }
    function editProses(Request $request)
    {
        User::ProsesEditUsers($request);
        toast('', 'success');
        return redirect()->route('profile')->with('success', 'Users Successs Updateed!');
    }
    function updateProses(Request $request)
    {
        User::ProsesUpdateUsers($request);
        return response()->json([
            'success' => true,
            'message' => 'Update Users Successs',
        ]);
    }
    function uploadsUsers(Request $request)
    {
        // dd($request->all());
        User::uploadsUsers($request);
        return response()->json([
            'success' => true,
            'message' => 'Uploads Users Successs',
        ]);
    }
    function deleteProses($id)
    {
        // dd($id);
        User::ProsesDeletusers($id);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Delete Userss Successs',
        ]);
    }
    function resetPassword($id)
    {
        // dd($id);
        User::prosesResetPassword($id);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Reset Password Successs',
        ]);
    }
    function verificationProses($id)
    {
        // dd($id);
        User::verificationProses($id);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Reset Password Successs',
        ]);
    }
}
