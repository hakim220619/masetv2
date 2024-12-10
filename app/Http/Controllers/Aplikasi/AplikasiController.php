<?php

namespace App\Http\Controllers\Aplikasi;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AplikasiController extends Controller
{
    function aplikasi()
    {
        $data['title'] = "Aplikasi";
        $data['aplikasi'] = DB::table('aplikasi')->first();
        return view('content.general.aplikasi', $data);
    }
    function updateAplikasi(Request $request)
    {
        try {
            if ($request->has('logo') != null) {
                $file_path = public_path() . '/storage/images/logo/' . $request->image;
                File::delete($file_path);
                $image = $request->file('logo');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('storage/images/logo'), $filename);
                $data = [
                    'pemilik' => $request->pemilik,
                    'kontak' => $request->kontak,
                    'title' => $request->title,
                    'name' => $request->name,
                    'copy_right' => $request->copy_right,
                    'versi' => $request->versi,
                    'token_whatsapp' => $request->token_whatsapp,
                    'alamat' => $request->alamat,
                    'logo' => $request->file('logo')->getClientOriginalName(),
                ];
            } else {
                $data = [
                    'pemilik' => $request->pemilik,
                    'kontak' => $request->kontak,
                    'title' => $request->title,
                    'name' => $request->name,
                    'copy_right' => $request->copy_right,
                    'versi' => $request->versi,
                    'token_whatsapp' => $request->token_whatsapp,
                    'alamat' => $request->alamat,

                ];
            }
            $mmLogsData['activity'] = 'Update Aplikasi berhasil oleh  ' . request()->user()->name . '';
            $mmLogsData['detail'] = now();
            $mmLogsData['action'] = 'Update';
            Helpers::mmLogs($mmLogsData);
            DB::table('aplikasi')->where('id', $request->id)->update($data);
            toast('', 'success');
            return redirect()->route('setting-aplikasi')->with('success', 'Aplikasi Successs Updateed!');
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
}
