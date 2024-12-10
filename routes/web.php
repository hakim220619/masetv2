<?php

use App\Http\Controllers\Aplikasi\AplikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginController;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\RegisterController;
use App\Http\Controllers\Bangunan\BangunanController;
use App\Http\Controllers\Broadcast\BroadcastController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\Jenis_dokumen_tanah\Jenis_dokumen_tanah;
use App\Http\Controllers\Lihat_pembanding\Lihat_pembandingController;
use App\Http\Controllers\Object\ObjectController;
use App\Http\Controllers\Pembanding_bangunan\PembandingBangunanController;
use App\Http\Controllers\Pembanding_retail\Pembanding_retailController;
use App\Http\Controllers\Pembanding_tanah_kosong\Pembanding_tanah_kosongController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Retail\ReatailController;
use App\Http\Controllers\Tanah_kosong\TanahkosongController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Penilai\PenilaiController;
use App\Http\Controllers\PenilaiPublic\PenilaiPublicController;
use App\Http\Controllers\Reviewers\ReviewersController;
use App\Http\Controllers\Users\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main Page Route
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login_action', [LoginController::class, 'login_action'])->name('login.action');
Route::get('/auth/loginVerif/{google_id}', [LoginController::class, 'loginVerif'])->name('login.loginVerif');

Route::get('/login/google',  [LoginController::class, 'redirectToGoogle'])->name('login.redirectToGoogle');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('login.handleGoogleCallback');

Route::get('/forget-password', [LoginController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password-proses', [LoginController::class, 'forgetPasswordProses'])->name('forgetPasswordProses');
Route::get('/auth/reset-password-proses/{token}', [LoginController::class, 'resetPasswordProses'])->name('resetPasswordProses');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');

// authentication
// Route::get('/auth/login-basic', [LoginController::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-view', [RegisterController::class, 'index'])->name('auth-register-view');
Route::post('/auth/register', [RegisterController::class, 'addRegister'])->name('addRegister');
Route::post('/auth/updateUserBeforeLogin', [RegisterController::class, 'updateUserBeforeLogin'])->name('updateUserBeforeLogin');
Route::post('/checkEmail', [GeneralController::class, 'checkEmail'])->name('checkEmail');
Route::post('/checkNik', [GeneralController::class, 'checkNik'])->name('checkNik');
Route::post('/checkKontak', [GeneralController::class, 'checkKontak'])->name('checkKontak');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/admin', [HomePage::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/user', [HomePage::class, 'index'])->name('admin.user');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/setting/aplikasi', [AplikasiController::class, 'aplikasi'])->name('setting-aplikasi');

    Route::post('/setting/aplikasi/editProses', [AplikasiController::class, 'updateAplikasi'])->name('aplikasi.update');

    //Role Structure
    Route::get('/setting/roleStructure', [GeneralController::class, 'roleStructureView'])->name('setting-role-roleStructureView');
    Route::get('/setting/roleStructureList', [GeneralController::class, 'roleStructureList'])->name('role.roleStructureList');
    Route::post('/setting/addRoleStructureProses', [GeneralController::class, 'addRoleStructureProses'])->name('role.addRoleStructureProses');
    Route::post('/setting/updateRoleStructureProses', [GeneralController::class, 'updateRoleStructureProses'])->name('role.updateRoleStructureProses');
    Route::get('/setting/deleteRoleStructureProses/{id}', [GeneralController::class, 'deleteRoleStructureProses'])->name('role.deleteRoleStructureProses');
    //Role Access
    Route::get('/setting/roleAccess', [GeneralController::class, 'roleAccessView'])->name('setting-role-roleAccessView');
    Route::get('/setting/roleAccessList', [GeneralController::class, 'roleAccessList'])->name('role.roleAccessList');
    Route::post('/setting/addRoleAccessProses', [GeneralController::class, 'addRoleAccessProses'])->name('role.addRoleAccessProses');
    Route::post('/setting/updateRoleAceessProses', [GeneralController::class, 'updateRoleAceessProses'])->name('role.updateRoleAceessProses');
    Route::get('/setting/deleteRoleAccessProses/{id}', [GeneralController::class, 'deleteRoleAccessProses'])->name('role.deleteRoleAccessProses');

    //Role
    Route::get('/setting/role', [GeneralController::class, 'roleView'])->name('setting-role-roleView');
    Route::get('/setting/roleList', [GeneralController::class, 'roleList'])->name('role.roleList');
    Route::post('/setting/getUserByRoleAccess', [GeneralController::class, 'getUserByRoleAccess'])->name('role.getUserByRoleAccess');
    Route::post('/setting/addRoleProses', [GeneralController::class, 'addRoleProses'])->name('role.addRoleProses');
    Route::post('/setting/updateRoleProses', [GeneralController::class, 'updateRoleProses'])->name('role.updateRoleProses');
    Route::get('/setting/deleteRoleProses/{id}', [GeneralController::class, 'deleteRoleProses'])->name('role.deleteRoleProses');



    //Logs Activity
    Route::get('/mmlogs', [GeneralController::class, 'mmlogs'])->name('MasterDataSu-setting-mmlogs');
    Route::get('/setting/listUsersLogs', [GeneralController::class, 'listUsersLogs'])->name('setting.listUsersLogs');

    //Master Data
    Route::get('/options', [GeneralController::class, 'options'])->name('MasterDataSu-setting-options');
    Route::get('/options/listDataOptions', [GeneralController::class, 'listDataOptions'])->name('setting.listDataOptions');
    Route::post('/options/saveHeaderOptions', [GeneralController::class, 'saveHeaderOptions'])->name('setting.saveHeaderOptions');
    Route::post('/options/saveOptions', [GeneralController::class, 'saveOptions'])->name('setting.saveOptions');

    Route::post('/options/editHeader/{labelHeader}', [GeneralController::class, 'editHeader'])->name('options.editHeader');
    Route::post('/options/editOptions/{id}', [GeneralController::class, 'updateOption'])->name('options.updateOption');
    Route::get('/options/deleteHeader/{labelHeader}', [GeneralController::class, 'destroyOptionHeader'])->name('options.destroyOptionHeader');
    Route::get('/options/delete/{id}', [GeneralController::class, 'destroyOption'])->name('options.destroyOption');







    //Users
    //tanggal 5-21-2024
    Route::get('/users', [UsersController::class, 'users'])->name('MasterDataSu-users-list');
    Route::get('/users/list', [UsersController::class, 'userList'])->name('users.userList');
    Route::post('/users/addProses', [UsersController::class, 'addProses'])->name('users.addProses');
    Route::post('/users/editProses', [UsersController::class, 'editProses'])->name('users.editProses');
    Route::post('/users/updateProses', [UsersController::class, 'updateProses'])->name('users.updateProses');
    Route::post('/users/uploadsUsers', [UsersController::class, 'uploadsUsers'])->name('users.uploadsUsers');
    Route::get('/users/deleteProses/{id}', [UsersController::class, 'deleteProses'])->name('users.deleteProses');
    Route::get('/users/resetPassword/{id}', [UsersController::class, 'resetPassword'])->name('users.resetPassword');
    Route::get('/users/verificationProses/{id}', [UsersController::class, 'verificationProses'])->name('users.verificationProses');


    //Profile
    //tanggal 5-21-2024
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/security', [ProfileController::class, 'viewSecurity'])->name('profile.security');
    Route::get('/profile/suspended', [ProfileController::class, 'suspended'])->name('profile.suspended');
    Route::post('/profile/changePassword', [ProfileController::class, 'changePassword'])->name('profile.changePassword');

    //Bangunan
    Route::get('/object/bangunan', [BangunanController::class, 'bangunan'])->name('object-bangunan');
    Route::get('/object/bangunanView', [BangunanController::class, 'bangunanView'])->name('bangunan.bangunanView');
    Route::get('/object/retailView', [BangunanController::class, 'retailView'])->name('bangunan.retailView');
    Route::get('/object/tanahKosongView', [BangunanController::class, 'tanahKosongView'])->name('bangunan.tanahKosongView');
    Route::get('/object/bangunanLoadData', [BangunanController::class, 'bangunanLoadData'])->name('bangunan.bangunanLoadData');
    Route::get('/object/tanahKosongLoadData', [BangunanController::class, 'tanahKosongLoadData'])->name('bangunan.tanahKosongLoadData');
    Route::get('/object/retailLoadData', [BangunanController::class, 'retailLoadData'])->name('bangunan.retailLoadData');
    Route::post('/object/add_bangunan', [BangunanController::class, 'add_bangunan'])->name('add_bangunan');
    Route::get('/object/detail_bangunan/{id}', [BangunanController::class, 'detail_bangunan'])->name('detail_bangunan');


    Route::get('/object/acceptSurveyor/{id}', [BangunanController::class, 'acceptSurveyor'])->name('acceptSurveyor');


    //Tanah Kosong
    Route::get('/object/tanah_kosong', [TanahkosongController::class, 'tanah_kosong'])->name('object-tanah_kosong');
    Route::post('/object/add_tanah_kosong', [TanahkosongController::class, 'add_tanah_kosong'])->name('add_tanah_kosong');
    Route::get('/object/detail_tanah_kosong/{id}', [TanahkosongController::class, 'detail_tanah_kosong'])->name('detail_tanah_kosong');
    //Retail
    Route::get('/object/retail', [ReatailController::class, 'retail'])->name('object-retail');
    Route::post('/object/add_retail', [ReatailController::class, 'add_retail'])->name('add_retail');
    Route::get('/object/detail_retail/{id}', [ReatailController::class, 'detail_retail'])->name('detail_retail');

    //Object
    Route::get('/object/lihat_object', [ObjectController::class, 'lihat_object'])->name('object-lihat_object');

    //Penilai
    Route::get('/penilai', [PenilaiController::class, 'penilai'])->name('penilai');
    Route::get('/penilai/bangunanView', [PenilaiController::class, 'bangunanView'])->name('penilai.bangunanView');
    Route::get('/penilai/retailView', [PenilaiController::class, 'retailView'])->name('penilai.retailView');
    Route::get('/penilai/tanahKosongView', [PenilaiController::class, 'tanahKosongView'])->name('penilai.tanahKosongView');
    Route::get('/penilai/bangunanLoadData', [PenilaiController::class, 'bangunanLoadData'])->name('penilai.bangunanLoadData');
    Route::get('/penilai/tanahKosongLoadData', [PenilaiController::class, 'tanahKosongLoadData'])->name('penilai.tanahKosongLoadData');
    Route::get('/penilai/retailLoadData', [PenilaiController::class, 'retailLoadData'])->name('penilai.retailLoadData');

    Route::get('/penilai/acceptPenilai/{id}', [PenilaiController::class, 'acceptPenilai'])->name('penilai.acceptPenilai');

    //Reviuwer
    Route::get('/reviewers', [ReviewersController::class, 'reviewers'])->name('reviewers');
    Route::get('/reviewers/bangunanView', [ReviewersController::class, 'bangunanView'])->name('reviewers.bangunanView');
    Route::get('/reviewers/retailView', [ReviewersController::class, 'retailView'])->name('reviewers.retailView');
    Route::get('/reviewers/tanahKosongView', [ReviewersController::class, 'tanahKosongView'])->name('reviewers.tanahKosongView');
    Route::get('/reviewers/bangunanLoadData', [ReviewersController::class, 'bangunanLoadData'])->name('reviewers.bangunanLoadData');
    Route::get('/reviewers/tanahKosongLoadData', [ReviewersController::class, 'tanahKosongLoadData'])->name('reviewers.tanahKosongLoadData');
    Route::get('/reviewers/retailLoadData', [ReviewersController::class, 'retailLoadData'])->name('reviewers.retailLoadData');

    Route::get('/reviewers/acceptReviewers/{id}', [ReviewersController::class, 'acceptReviewers'])->name('reviewers.acceptReviewers');
    Route::get('/reviewers/reportReviewers/{id}', [ReviewersController::class, 'reportReviewers'])->name('reviewers.reportReviewers');

    //Penilai Public
    Route::get('/penilai_public', [PenilaiPublicController::class, 'penilai_public'])->name('penilai_public');
    Route::get('/penilai_public/bangunanView', [PenilaiPublicController::class, 'bangunanView'])->name('penilai_public.bangunanView');
    Route::get('/penilai_public/retailView', [PenilaiPublicController::class, 'retailView'])->name('penilai_public.retailView');
    Route::get('/penilai_public/tanahKosongView', [PenilaiPublicController::class, 'tanahKosongView'])->name('penilai_public.tanahKosongView');
    Route::get('/penilai_public/bangunanLoadData', [PenilaiPublicController::class, 'bangunanLoadData'])->name('penilai_public.bangunanLoadData');
    Route::get('/penilai_public/tanahKosongLoadData', [PenilaiPublicController::class, 'tanahKosongLoadData'])->name('penilai_public.tanahKosongLoadData');
    Route::get('/penilai_public/retailLoadData', [PenilaiPublicController::class, 'retailLoadData'])->name('penilai_public.retailLoadData');

    Route::get('/penilai_public/acceptPenilaiPublic/{id}', [PenilaiPublicController::class, 'acceptPenilaiPublic'])->name('penilai_public.acceptPenilaiPublic');
    Route::get('/penilai_public/reportPenilaiPublic/{id}', [PenilaiPublicController::class, 'reportPenilaiPublic'])->name('reviewers.reportPenilaiPublic');


    //Broadcast
    Route::get('/broadcast', [BroadcastController::class, 'broadcast'])->name('broadcast-byWhatsapp');
    Route::get('/sendMessage', [BroadcastController::class, 'sendMessage'])->name('broadcast.sendMessage');
    //Broadcast by Aplikasi
    Route::get('/broadcast/aplikasiRead/{uid}', [BroadcastController::class, 'broadcastByAplikasiRead'])->name('broadcast.broadcastByAplikasiRead');
    Route::get('/broadcast/aplikasiView', [BroadcastController::class, 'broadcastByAplikasiView'])->name('broadcast-broadcastByAplikasiView');
    Route::get('/broadcast/Listaplikasi', [BroadcastController::class, 'broadcastByListaplikasi'])->name('broadcast.broadcastByListaplikasi');
    Route::get('/broadcast/aplikasiAdd', [BroadcastController::class, 'broadcastByAplikasiAdd'])->name('broadcast.broadcastByAplikasiAdd');
    Route::get('/broadcast/aplikasiUpdate/{uid}', [BroadcastController::class, 'broadcastByAplikasiUpdate'])->name('broadcast.broadcastByAplikasiUpdate');
    Route::get('/broadcast/aplikasiDelete/{uid}', [BroadcastController::class, 'broadcastByAplikasiDelete'])->name('broadcast.broadcastByAplikasiDelete');
    Route::post('/broadcast/uploadFile', [BroadcastController::class, 'uploadFile'])->name('broadcast.uploadFile');
    Route::post('/broadcast/aplikasiProsess', [BroadcastController::class, 'aplikasiProsess'])->name('broadcast.aplikasiProsess');
    Route::post('/broadcast/aplikasiProsessUpdate', [BroadcastController::class, 'aplikasiProsessUpdate'])->name('broadcast.aplikasiProsessUpdate');

    // pembanding
    Route::get('/pembanding/bangunan', [PembandingBangunanController::class, 'bangunan'])->name('pembanding-bangunan');
    Route::post('/pembanding/add_pembanding_bangunan', [PembandingBangunanController::class, 'add_pembanding_bangunan'])->name('add_pembanding_bangunan');
    Route::get('/pembanding/detail_pembanding_bangunan/{id}', [PembandingBangunanController::class, 'detail_pembanding_bangunan'])->name('detail_pembanding_bangunan');

    Route::get('/pembanding/tanah_kosong', [Pembanding_tanah_kosongController::class, 'tanah_kosong'])->name('pembanding-tanah-kosong');
    Route::post('/pembanding/add_pembanding_tanah_kosong', [Pembanding_tanah_kosongController::class, 'add_pembanding_tanah_kosong'])->name('add_pembanding_tanah_kosong');
    Route::get('/pembanding/detail_pembanding_tanah_kosong/{id}', [Pembanding_tanah_kosongController::class, 'detail_pembanding_tanah_kosong'])->name('detail_pembanding_tanah_kosong');


    Route::get('/pembanding/retail', [Pembanding_retailController::class, 'retail'])->name('pembanding-retail');
    Route::post('/pembanding/add_pembanding_retail', [Pembanding_retailController::class, 'add_pembanding_retail'])->name('add_pembanding_retail');
    Route::get('/pembanding/detail_pembanding_retail/{id}', [Pembanding_retailController::class, 'detail_pembanding_retail'])->name('detail_pembanding_retail');

    //Lihat Pembanding
    Route::get('/pembanding/lihat_pembanding', [Lihat_pembandingController::class, 'lihat_pembanding'])->name('pembanding-lihat-pembanding');

    Route::get('/pembanding/bangunanView', [Lihat_pembandingController::class, 'bangunanView'])->name('pembanding.bangunanView');
    Route::get('/pembanding/retailView', [Lihat_pembandingController::class, 'retailView'])->name('pembanding.retailView');
    Route::get('/pembanding/tanahKosongView', [Lihat_pembandingController::class, 'tanahKosongView'])->name('pembanding.tanahKosongView');
    Route::get('/pembanding/bangunanLoadData', [Lihat_pembandingController::class, 'bangunanLoadData'])->name('pembanding.bangunanLoadData');
    Route::get('/pembanding/tanahKosongLoadData', [Lihat_pembandingController::class, 'tanahKosongLoadData'])->name('pembanding.tanahKosongLoadData');
    Route::get('/pembanding/retailLoadData', [Lihat_pembandingController::class, 'retailLoadData'])->name('pembanding.retailLoadData');

    // laporan
    Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan');
    Route::get('/getCoordinates', [LaporanController::class, 'getCoordinates'])->name('getCoordinates');

    // masterdata
    // Jenis Dokumen Hak Tanah
    Route::get('/jenis-dokumen-tanah', [Jenis_dokumen_tanah::class, 'index'])->name('index');
});
