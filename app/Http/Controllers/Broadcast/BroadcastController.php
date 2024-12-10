<?php

namespace App\Http\Controllers\Broadcast;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\GeneralModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BroadcastController extends Controller
{
    function broadcast()
    {
        $data['users'] = User::GetListuser();
        $data['title'] = "Broadcast";
        return view('content.broadcast.broadcast', $data);
    }
    function broadcastByAplikasiView()
    {
        $data['title'] = "Broadcast";
        return view('content.broadcast.aplikasi-view', $data);
    }
    function broadcastByAplikasiRead($uid)
    {
        $data['title'] = "Broadcast By Aplikasi Read";
        $data['data'] = GeneralModel::broadcastByAplikasiRead($uid);
        return view('content.broadcast.aplikasi-read', $data);
    }
    function broadcastByAplikasiAdd()
    {
        $data['title'] = "Broadcast By Aplikasi Add";
        return view('content.broadcast.aplikasi-add', $data);
    }
    function broadcastByAplikasiUpdate($uid)
    {
        $data['data'] = GeneralModel::getBroadcastByAplikasi($uid);
        $data['status'] = ['ON', 'OFF'];
        $data['title'] = "Broadcast By Aplikasi Update";
        return view('content.broadcast.aplikasi-update', $data);
    }
    function broadcastByAplikasiDelete($uid)
    {
        GeneralModel::broadcastByAplikasiDelete($uid);
        return response()->json([
            'success' => true,
            'message' => 'Delete Success'
        ]);
    }
    function sendMessage(Request $request)
    {
        $data = Helpers::sendMessage($request);
        return response()->json([
            'success' => true,
            'message' => 'Send Whatsapp Success',
            'data' => json_decode($data),
        ]);
    }
    public function uploadFile(Request $request)
    {
        $data = array();
        $validator = Validator::make($request->all(), [
            'upload' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        if ($validator->fails()) {
            $data['uploaded'] = 0;
            $data['error']['message'] = $validator->errors()->first('upload'); // Error response
        } else {
            if ($request->file('upload')) {
                $file = $request->file('upload');
                $filename = time() . '_' . $file->getClientOriginalName();
                // File upload location
                // $location = 'uploads';
                // Upload file
                // $file->move($location, $filename);
                $file->move(public_path('storage/images/uploads/'), $filename);
                // File path
                $filepath = url('storage/images/uploads/' . $filename);
                // Response
                $data['fileName'] = $filename;
                $data['uploaded'] = 1;
                $data['url'] = $filepath;
            } else {
                // Response
                $data['uploaded'] = 0;
                $data['error']['message'] = 'File not uploaded.';
            }
        }
        return response()->json($data);
    }
    function broadcastByListaplikasi(Request $request)
    {
        // dd($request->all());
        $data = GeneralModel::broadcastByListaplikasi($request);
        return response()->json([
            'success' => true,
            'message' => 'List Broadcast By Aplikasi Success',
            'data' => $data,
        ]);
    }
    function aplikasiProsess(Request $request)
    {
        GeneralModel::aplikasiProsess($request);
        toast('', 'success');
        return redirect('/broadcast/aplikasiView')->with('success', 'Broadcast By Aplikasi Successs Addedd!');
    }
    function aplikasiProsessUpdate(Request $request)
    {
        GeneralModel::aplikasiProsessUpdate($request);
        toast('', 'success');
        return redirect('/broadcast/aplikasiView')->with('success', 'Broadcast By Aplikasi Successs Updated!');
    }
}
