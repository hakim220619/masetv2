<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\GeneralModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GeneralController extends Controller
{
    function roleStructureView()
    {
        return view('content.general.role-Structure-View');
    }


    function roleStructureList()
    {
        $data = GeneralModel::GetListRoleStructure();
        return response()->json([
            'success' => true,
            'message' => 'Data',
            'data' => $data,
        ]);
    }
    function checkEmail(Request $request)
    {
        // dd($request->email);
        $data = GeneralModel::checkEmail($request);
        if (isset($data)) {
            return response()->json([
                'success' => true,
                'message' => 'Data',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Kosong',
            ]);
        }
    }
    function checkNik(Request $request)
    {
        // dd($request->email);
        $data = GeneralModel::checkNik($request);
        if (isset($data)) {
            return response()->json([
                'success' => true,
                'message' => 'Data',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Kosong',
            ]);
        }
    }
    function checkKontak(Request $request)
    {
        // dd($request->email);
        $data = GeneralModel::checkKontak($request);
        if (isset($data)) {
            return response()->json([
                'success' => true,
                'message' => 'Data',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Kosong',
            ]);
        }
    }

    function addRoleStructureProses(Request $request)
    {
        // dd($request->all());
        GeneralModel::ProsesAddRoleStructure($request);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Add Role Structure Successs',
        ]);
    }


    function updateRoleStructureProses(Request $request)
    {
        // dd($request->all());
        GeneralModel::ProsesUpdateRoleStructure($request);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Update Role Structure Successs',
        ]);
    }


    function deleteRoleStructureProses($id)
    {
        // dd($id);
        GeneralModel::ProsesDeletRoleStructure($id);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Delete Role Structure Successs',
        ]);
    }


    function roleAccessView()
    {
        return view('content.general.role-Access-View');
    }
    function roleAccessList()
    {
        $data = GeneralModel::GetListRoleAccess();
        return response()->json([
            'success' => true,
            'message' => 'Data',
            'data' => $data,
        ]);
    }
    function addRoleAccessProses(Request $request)
    {
        GeneralModel::ProsesAddRoleAccess($request);
        return response()->json([
            'success' => true,
            'message' => 'Add Role Access Successs',
        ]);
    }
    function updateRoleAceessProses(Request $request)
    {
        // dd($request->all());
        GeneralModel::ProsesUpdateRoleAccess($request);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Update Role Access Successs',
        ]);
    }

    function deleteRoleAccessProses($id)
    {
        // dd($id);
        GeneralModel::ProsesDeletRoleAccess($id);
        return response()->json([
            'success' => true,
            'message' => 'Delete Role Access Successs',
        ]);
    }


    function roleView()
    {
        return view('content.general.role-View');
    }
    function roleList()
    {
        $data = GeneralModel::GetListRole();
        return response()->json([
            'success' => true,
            'message' => 'Data',
            'data' => $data,
        ]);
    }
    function getUserByRoleAccess(Request $request)
    {
        // dd($request->all());
        $data = GeneralModel::getUserByRoleAccess($request);
        return response()->json([
            'success' => true,
            'message' => 'Data',
            'data' => $data,
        ]);
    }
    function addRoleProses(Request $request)
    {
        // dd($request->all());
        GeneralModel::ProsesAddRole($request);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Add Role Successs',
        ]);
    }
    function updateRoleProses(Request $request)
    {
        // dd($request->all());
        GeneralModel::ProsesUpdateRole($request);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Update Role Successs',
        ]);
    }
    function deleteRoleProses($id)
    {
        // dd($id);
        GeneralModel::ProsesDeletRole($id);
        return response()->json([
            'success' => true,
            'message' => 'Delete Role Successs',
        ]);
    }

    function mmlogs()
    {
        $data['total_mmlogs'] = DB::select("select count(ml.id) as total from mm_logs ml")[0];
        $data['total_raAdmin'] = DB::select("select count(ml.id) as total from mm_logs ml WHERE role_access = 2 ")[0];
        $data['total_rausers'] = DB::select("select count(ml.id) as total from mm_logs ml WHERE role_access = 1")[0];
        $data['total_raSuperAdmin'] = DB::select("select count(ml.id) as total from mm_logs ml WHERE role_access = 3")[0];

        return view('content.general.mmlogs', $data);
    }
    function options()
    {
        $data['dataOptions'] = GeneralModel::listDataOptions();
        return view('content.general.options', $data);
    }
    function listDataOptions()
    {
        $data = GeneralModel::listDataOptions();
        return response()->json([
            'success' => true,
            'message' => 'Data',
            'data' => $data,
        ]);
    }
    function saveHeaderOptions(Request $request)
    {
        $data = GeneralModel::saveHeaderOptions($request);
        return response()->json([
            'success' => true,
            'message' => 'Data',
            'data' => $data,
        ]);
    }
    function saveOptions(Request $request)
    {
        GeneralModel::saveOptions($request);
        return redirect()->back();
    }
    function editHeader(Request $request, $labelHeader)
    {
        GeneralModel::editHeader($request, $labelHeader);
        return response()->json([
            'success' => true,
            'message' => 'Data'
        ]);
    }
    function updateOption(Request $request, $id)
    {
        GeneralModel::updateOption($request, $id);
        return response()->json([
            'success' => true,
            'message' => 'Data'
        ]);
    }
    function destroyOptionHeader($label)
    {
        GeneralModel::destroyOptionHeader($label);
        return response()->json([
            'success' => true,
            'message' => 'Data'
        ]);
    }
    function destroyOption(Request $request)
    {
        GeneralModel::destroyOption($request);
        return response()->json([
            'success' => true,
            'message' => 'Data'
        ]);
    }
    function listUsersLogs()
    {
        $data = GeneralModel::listUsersLogs();
        return response()->json([
            'success' => true,
            'message' => 'Data',
            'data' => $data,
        ]);
    }
}
