<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\GeneralModel;
use Illuminate\Http\Request;

class HomePage extends Controller
{
  public function index()
  {
    $data['total_users'] = GeneralModel::getCountUsers();
    $data['total_objek_penilaian'] = GeneralModel::getCountObjPenilaian();
    $data['total_pembanding'] = GeneralModel::getCountPembanding();
    return view('content.pages.pages-home', $data);
  }
}
