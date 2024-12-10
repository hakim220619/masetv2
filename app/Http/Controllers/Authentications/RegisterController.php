<?php

namespace App\Http\Controllers\authentications;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  public function index()
  {
    $data['pageConfigs'] = ['myLayout' => 'blank'];
    $data['role_structure'] = DB::table('role_structure')->whereNot('rs_id', 4)->where('rs_status', 'ACTIVE')->get();
    return view('content.authentications.auth-register', $data);
  }
  function updateUserBeforeLogin(Request $request)
  {
    $input = $request->all();
    // dd($input);
    User::ProsesUpdateUsersBeforeLogin($request);
    $request['message'] = "*Aktivasi Akun Pengguna*
Halo " . $request->name . ",

Kami senang memberitahu Anda bahwa akun Anda telah berhasil dibuat di platform kami. Untuk melanjutkan, Anda perlu mengaktifkan akun Anda dengan langkah-langkah berikut:

1. Klik Tautan Aktivasi: [Tambahkan tautan aktivasi di sini]

2. Verifikasi Informasi Anda: Setelah mengklik tautan di atas, Anda akan diarahkan untuk memverifikasi informasi pribadi Anda.

3. Mulai Menggunakan Akun Anda: Setelah verifikasi selesai, Anda dapat masuk dan mulai menikmati layanan kami.

Jika Anda mengalami kesulitan atau memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi tim dukungan kami melalui email di [alamat email dukungan] atau melalui [nomor telepon dukungan].

Terima kasih telah bergabung dengan kami!

Salam,
[Tim Dukungan]";
    Helpers::sendMessageAll($request);
    return redirect('/')->with('success', 'Users Successs Updated!');
  }
  function addRegister(Request $request)
  {

    $input = $request->all();
    $rules = [
      'name' => 'required|max:64',
      'email' => 'required|email|max:255|unique:users,email, ' . $request->email,
      'nik' => 'required|unique:users,nik,' . $request->nik
    ];

    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      return redirect('/auth/register-view')->withErrors($validator)->withInput();
    } else {
      // $getKontakAdmin = DB::table()
      // dd($request->all());
      User::ProsesAddUsersRegister($request);
      $getAdmin = DB::select('SELECT u.kontak, rs.rs_id, rs.rs_name, ra.ra_id, ra.ra_name FROM users u, role_structure rs, role_access ra
WHERE u.role_structure=rs.rs_id
AND u.role_access=ra.ra_id
AND rs.rs_id = "' . $request->role_structure . '"
AND ra.ra_id = "2"');
      foreach ($getAdmin as $key => $value) {
        $dataSend['message'] = "*Aktivasi Akun Pengguna*
Halo " . $request->name . ",

Kami senang memberitahu Anda bahwa akun Anda telah berhasil dibuat di platform kami. Untuk melanjutkan, Anda perlu mengaktifkan akun Anda dengan langkah-langkah berikut:

1. Klik Tautan Aktivasi: [Tambahkan tautan aktivasi di sini]

2. Verifikasi Informasi Anda: Setelah mengklik tautan di atas, Anda akan diarahkan untuk memverifikasi informasi pribadi Anda.

3. Mulai Menggunakan Akun Anda: Setelah verifikasi selesai, Anda dapat masuk dan mulai menikmati layanan kami.

Jika Anda mengalami kesulitan atau memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi tim dukungan kami melalui email di [alamat email dukungan] atau melalui [nomor telepon dukungan].

Terima kasih telah bergabung dengan kami!

Salam,
[Tim Dukungan]";
        $dataSend['kontak'] = $value->kontak;
        Helpers::sendMessageAll($dataSend);
      }
      $request['message'] = "*Aktivasi Akun Pengguna*
Halo " . $request->name . ",

Kami senang memberitahu Anda bahwa akun Anda telah berhasil dibuat di platform kami. Untuk melanjutkan, Anda perlu mengaktifkan akun Anda dengan langkah-langkah berikut:

1. Klik Tautan Aktivasi: [Tambahkan tautan aktivasi di sini]

2. Verifikasi Informasi Anda: Setelah mengklik tautan di atas, Anda akan diarahkan untuk memverifikasi informasi pribadi Anda.

3. Mulai Menggunakan Akun Anda: Setelah verifikasi selesai, Anda dapat masuk dan mulai menikmati layanan kami.

Jika Anda mengalami kesulitan atau memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi tim dukungan kami melalui email di [alamat email dukungan] atau melalui [nomor telepon dukungan].

Terima kasih telah bergabung dengan kami!

Salam,
[Tim Dukungan]";
      Helpers::sendMessageAll($request);
      return redirect('/')->with('success', 'Users Successs Added!');
    }
  }
}
