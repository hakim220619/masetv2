<?php

namespace App\Helpers;

use App\Models\User;
use Config;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Helpers
{
  public static function appClasses()
  {

    $data = config('custom.custom');


    // default data array
    $DefaultData = [
      'myLayout' => 'vertical',
      'myTheme' => 'theme-default',
      'myStyle' => 'light',
      'myRTLSupport' => true,
      'myRTLMode' => true,
      'hasCustomizer' => true,
      'showDropdownOnHover' => true,
      'displayCustomizer' => true,
      'contentLayout' => 'compact',
      'headerType' => 'fixed',
      'navbarType' => 'fixed',
      'menuFixed' => true,
      'menuCollapsed' => false,
      'footerFixed' => false,
      'customizerControls' => [
        'rtl',
        'style',
        'headerType',
        'contentLayout',
        'layoutCollapsed',
        'showDropdownOnHover',
        'layoutNavbarOptions',
        'themes',
      ],
      //   'defaultLanguage'=>'en',
    ];

    // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
    $data = array_merge($DefaultData, $data);

    // All options available in the template
    $allOptions = [
      'myLayout' => ['vertical', 'horizontal', 'blank', 'front'],
      'menuCollapsed' => [true, false],
      'hasCustomizer' => [true, false],
      'showDropdownOnHover' => [true, false],
      'displayCustomizer' => [true, false],
      'contentLayout' => ['compact', 'wide'],
      'headerType' => ['fixed', 'static'],
      'navbarType' => ['fixed', 'static', 'hidden'],
      'myStyle' => ['light', 'dark', 'system'],
      'myTheme' => ['theme-default', 'theme-bordered', 'theme-semi-dark'],
      'myRTLSupport' => [true, false],
      'myRTLMode' => [true, false],
      'menuFixed' => [true, false],
      'footerFixed' => [true, false],
      'customizerControls' => [],
      // 'defaultLanguage'=>array('en'=>'en','fr'=>'fr','de'=>'de','ar'=>'ar'),
    ];

    //if myLayout value empty or not match with default options in custom.php config file then set a default value
    foreach ($allOptions as $key => $value) {
      if (array_key_exists($key, $DefaultData)) {
        if (gettype($DefaultData[$key]) === gettype($data[$key])) {
          // data key should be string
          if (is_string($data[$key])) {
            // data key should not be empty
            if (isset($data[$key]) && $data[$key] !== null) {
              // data key should not be exist inside allOptions array's sub array
              if (!array_key_exists($data[$key], $value)) {
                // ensure that passed value should be match with any of allOptions array value
                $result = array_search($data[$key], $value, 'strict');
                if (empty($result) && $result !== 0) {
                  $data[$key] = $DefaultData[$key];
                }
              }
            } else {
              // if data key not set or
              $data[$key] = $DefaultData[$key];
            }
          }
        } else {
          $data[$key] = $DefaultData[$key];
        }
      }
    }
    $styleVal = $data['myStyle'] == "dark" ? "dark" : "light";
    if (isset($_COOKIE['mode'])) {
      if ($_COOKIE['mode'] === "system") {
        if (isset($_COOKIE['colorPref'])) {
          $styleVal = Str::lower($_COOKIE['colorPref']);
        }
      } else {
        $styleVal = $_COOKIE['mode'];
      }
    }
    //layout classes
    $layoutClasses = [
      'layout' => $data['myLayout'],
      'theme' => $data['myTheme'],
      'style' => $styleVal,
      'styleOpt' => $data['myStyle'],
      'rtlSupport' => $data['myRTLSupport'],
      'rtlMode' => $data['myRTLMode'],
      'textDirection' => $data['myRTLMode'],
      'menuCollapsed' => $data['menuCollapsed'],
      'hasCustomizer' => $data['hasCustomizer'],
      'showDropdownOnHover' => $data['showDropdownOnHover'],
      'displayCustomizer' => $data['displayCustomizer'],
      'contentLayout' => $data['contentLayout'],
      'headerType' => $data['headerType'],
      'navbarType' => $data['navbarType'],
      'menuFixed' => $data['menuFixed'],
      'footerFixed' => $data['footerFixed'],
      'customizerControls' => $data['customizerControls'],
    ];

    // sidebar Collapsed
    if ($layoutClasses['menuCollapsed'] == true) {
      $layoutClasses['menuCollapsed'] = 'layout-menu-collapsed';
    }

    // Header Type
    if ($layoutClasses['headerType'] == 'fixed') {
      $layoutClasses['headerType'] = 'layout-menu-fixed';
    }
    // Navbar Type
    if ($layoutClasses['navbarType'] == 'fixed') {
      $layoutClasses['navbarType'] = 'layout-navbar-fixed';
    } elseif ($layoutClasses['navbarType'] == 'static') {
      $layoutClasses['navbarType'] = '';
    } else {
      $layoutClasses['navbarType'] = 'layout-navbar-hidden';
    }

    // Menu Fixed
    if ($layoutClasses['menuFixed'] == true) {
      $layoutClasses['menuFixed'] = 'layout-menu-fixed';
    }


    // Footer Fixed
    if ($layoutClasses['footerFixed'] == true) {
      $layoutClasses['footerFixed'] = 'layout-footer-fixed';
    }

    // RTL Supported template
    if ($layoutClasses['rtlSupport'] == true) {
      $layoutClasses['rtlSupport'] = '/rtl';
    }

    // RTL Layout/Mode
    if ($layoutClasses['rtlMode'] == true) {
      $layoutClasses['rtlMode'] = 'rtl';
      $layoutClasses['textDirection'] = 'rtl';
    } else {
      $layoutClasses['rtlMode'] = 'ltr';
      $layoutClasses['textDirection'] = 'ltr';
    }

    // Show DropdownOnHover for Horizontal Menu
    if ($layoutClasses['showDropdownOnHover'] == true) {
      $layoutClasses['showDropdownOnHover'] = true;
    } else {
      $layoutClasses['showDropdownOnHover'] = false;
    }

    // To hide/show display customizer UI, not js
    if ($layoutClasses['displayCustomizer'] == true) {
      $layoutClasses['displayCustomizer'] = true;
    } else {
      $layoutClasses['displayCustomizer'] = false;
    }

    return $layoutClasses;
  }

  public static function updatePageConfig($pageConfigs)
  {
    $demo = 'custom';
    if (isset($pageConfigs)) {
      if (count($pageConfigs) > 0) {
        foreach ($pageConfigs as $config => $val) {
          Config::set('custom.' . $demo . '.' . $config, $val);
        }
      }
    }
  }
  public static function getProfileById()
  {
    $data = DB::select('select u.*, rs.rs_name , ra.ra_name , r.role_name  from users u, role_structure rs, role_access ra, role r 
        where u.role_structure=rs.rs_id 
        and u.role_access=ra.ra_id 
        and u.role=r.role_id 
        and id = ' . Auth::user()->id . '');
    return $data[0];
  }
  public static function aplikasi()
  {
    $aplikasi = DB::table('aplikasi')->first();
    return $aplikasi;
  }
  public static function getStatus()
  {
    $data = DB::table('status')->get();
    return $data;
  }
  public static function getRoleStructure()
  {
    if (Auth::user()->role_structure == Helpers::getRoleStructureJson()[3]) {
      $data = DB::table('role_structure')->where('rs_status', 'ACTIVE')->get();
    } else {
      if (Auth::user()->role_structure == 32 || Auth::user()->role_structure == 33 || Auth::user()->role_structure == 34) {
        $data = DB::select("select * from role_structure where rs_name like '%" . User::getProfileById()->rs_name . "%'");
      } else {
        $data = DB::table('role_structure')->where('rs_id', Auth::user()->role_structure)->where('rs_status', 'ACTIVE')->get();
      }
    }
    // dd($data);
    return $data;
  }
  public static function getRoleStructureJson()
  {
    $data = ['1', '2', '3', '4'];
    return $data;
  }
  public static function getRoleAccessJson()
  {
    $data = ['1', '2', '3', '4'];
    return $data;
  }

  public static function getRoleaccess()
  {
    if (Auth::user()->role_access == Helpers::getRoleStructureJson()[2]) {
      $data = DB::table('role_access')->where('ra_status', 'ACTIVE')->get();
    } else {
      $data = DB::table('role_access')->whereNot('ra_id', Helpers::getRoleStructureJson()[2])->where('ra_status', 'ACTIVE')->get();
    }
    return $data;
  }
  public static function getRole()
  {
    if (Auth::user()->role == Helpers::getRoleStructureJson()[3]) {
      $data = DB::table('role')->where('role_status', 'ACTIVE')->get();
    } else {
      $data = DB::table('role')->whereNot('role_id', Helpers::getRoleStructureJson()[3])->where('role_status', 'ACTIVE')->get();
    }
    return $data;
  }
  public static function sendMessage($request)
  {

    foreach ($request->kontak as $key => $kontak) {
      $body = array(
        "api_key" => self::aplikasi()->token_whatsapp,
        "receiver" => $kontak,
        "data" => array("message" => $request->message)
      );

      $curl = curl_init();
      curl_setopt_array($curl, [
        CURLOPT_URL => "https://wa.sppapp.com/api/send-message",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($body),
        CURLOPT_HTTPHEADER => [
          "Accept: */*",
          "Content-Type: application/json",
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);
      $mmLogsData['activity'] = '' . $response . ' ' . $kontak . '';
      $mmLogsData['detail'] = $response;
      $mmLogsData['action'] = 'Send Whatsapp';
      Helpers::mmLogs($mmLogsData);
      return $response;
    }
  }
  public static function sendMessageAll($request)
  {
    $body = array(
      "api_key" => self::aplikasi()->token_whatsapp,
      "receiver" => !empty($request['kontak']) == true ? $request['kontak'] : $request->kontak,
      "data" => array("message" => !empty($request['message']) == true ? $request['message'] : $request->message)
    );

    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => "https://wa.sppapp.com/api/send-message",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($body),
      CURLOPT_HTTPHEADER => [
        "Accept: */*",
        "Content-Type: application/json",
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    // dd($response);
    $mmLogsData['activity'] = 'Send Whatsapp berhasil terkirim ke kontak  ' . !empty($request['kontak']) == true ? $request['kontak'] : $request->kontak . '';
    $mmLogsData['detail'] = $response;
    $mmLogsData['action'] = 'Send Whatsapp';
    Helpers::mmLogs($mmLogsData);
    return $response;
  }
  public static function mmLogs($request)
  {
    $data = [
      'user_id' => isset(request()->user()->id) == null ? 0 : request()->user()->id,
      'role_structure' => isset(request()->user()->role_structure) == null ? 0 : request()->user()->role_structure,
      'role_access' => isset(request()->user()->role_access) == null ? 0 : request()->user()->role_access,
      'role' => isset(request()->user()->role) == null ? 0 : request()->user()->role,
      'activity' => $request['activity'],
      'detail' => base64_encode(serialize($request['detail'])),
      'action' => $request['action'],
      'ip' => $_SERVER['REMOTE_ADDR'],
      'created_at' => now()
    ];
    DB::table('mm_logs')->insert($data);
  }
  public static function notifications()
  {
    $data = DB::select('SELECT bac.*, ba.uid, ba.title, ba.keterangan, ba.created_at as created_at_ba, u.image FROM broadcast_aplikasi_access bac, broadcast_aplikasi ba, users u WHERE bac.ba_id=ba.uid AND ba.user_id=u.id AND ba.status = "ON" AND bac.user_id = ' . Auth::user()->id . ' order by ba.created_at desc');
    return $data;
  }
  public static function getCountNotifi()
  {
    $data = DB::select('SELECT count(bac.id) as total FROM broadcast_aplikasi_access bac, broadcast_aplikasi ba, users u WHERE bac.ba_id=ba.uid AND ba.user_id=u.id AND ba.status = "ON" AND bac.user_id = ' . Auth::user()->id . ' and bac.status = "Delivered"');
    return $data[0];
  }
  public static function uid()
  {
    $data = Str::random(40) . strtotime(now());
    return $data;
  }

  public static function hitungJam($date)
  {
    date_default_timezone_set('Asia/Jakarta');
    $waktustart = date($date);
    $waktuend = date('Y-m-d h:i:sa');
    //echo $waktustart;
    //echo $waktuend;

    $datetime1 = new DateTime($waktustart); //start time
    $datetime2 = new DateTime($waktuend); //end time
    $durasi = $datetime1->diff($datetime2);
    if ($durasi->format('%Y') != 0) {
      return $durasi->format('%Y Tahun');
    } elseif ($durasi->format('%m') != 0) {
      return $durasi->format('%m Bulan');
    } elseif ($durasi->format('%d') != 0) {
      return $durasi->format('%d Hari');
    } elseif ($durasi->format('%H') != 0) {
      return $durasi->format('%h Jam');
    } elseif ($durasi->format('%i') != 0) {
      return $durasi->format('%i Menit');
    } else {
      return $durasi->format('%s Detik');
    }
  }

  public static function generateApproval($request)
  {
    $getRole = DB::table('role')->where('role_id', '!=', 4)->get();
    $uid = Helpers::uid();
    foreach ($getRole as $key => $value) {
      if ($value->role_id == '1') {
        if ($key < 1) {
          DB::table('approval')->insert([
            'uid' => $uid,
            'id_user' => Auth::user()->id,
            'id_object' => $request['id_object'],
            'id_category_object' => $request['id_category'],
            'id_role' => $value->role_id,
            'status' => 'true',
            'last_update' => 'ON',
            'created_at' => now()

          ]);
        }
      } else {
        DB::table('approval')->insert([
          'uid' => $uid,
          'id_object' => $request['id_object'],
          'id_category_object' => $request['id_category'],
          'id_role' => $value->role_id,
          'status' => 'false',
          'last_update' => 'OFF',
          'created_at' => now()
        ]);
      }
    }
  }
}
