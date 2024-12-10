<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $data['profile'] = User::getProfileById();
        return view('content.profile.profile', $data);
    }
    public function viewSecurity()
    {
        $data['profile'] = User::getProfileById();
        return view('content.profile.app-user-view-security', $data);
    }
    public function changePassword(Request $request)
    {
        User::changePassword($request);
        toast('', 'success');
        return redirect()->route('profile.security')->with('success', 'Password Successs Updateed!');
    }
    public function suspended(Request $request)
    {
        User::suspended($request);
        return response()->json([
            'success' => true,
            'message' => 'Data Class',
        ]);
    }
}
