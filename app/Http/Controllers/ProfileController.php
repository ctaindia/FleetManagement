<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VendorDetail;
use App\Models\Master;
use Hash;

class ProfileController extends Controller
{
    public function index(Request $rq)
    {
        $userId = auth()->user()->id;
        $userType = auth()->user()->type;
        $otherDetail = (object)[];
        if($userType === 2) {
            $otherDetail = VendorDetail::where('user_id', $userId)->first();
        }
        return view('modules.profile.detail', compact('otherDetail'));
    }

    public function changePassword()
    {
        return view('modules.profile.change-password');
    }

    public function updateUserPassword(Request $req)
    {
        $req->validate([
            'old_password' => ['required','string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $passwordVerified = false;
        $user = \Auth::user();
        if(Hash::check($req->old_password,$user->password)){
            if($req->old_password != $req->password) {
                $passwordVerified = true;
            } else {
                return back()->with('Errors','The old password and new password can not be same');
            }
        }
        if($passwordVerified){
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect()->route('profile.detail')->with('Success','Password changed successFully');
        }
        return back()->with('Errors','The old password didnot match');
    }

    public function changeProfile()
    {
        return view('modules.profile.edit');
    }
    public function updateProfile(Request $req)
    {
        $req->validate([
            'name' => 'required|max:200|string',
            'mobile' => 'required|numeric'
        ]);
        $user = User::find(auth()->user()->id);
        $user->name = $req->name;
        if($user->email != $req->email) {
            $req->validate([
                'email' => 'required|email|unique:users'
            ]);
            $user->email = $req->email;
        }
        $user->mobile = $req->mobile;
        $user->save();

        return redirect()->route('profile.detail')
        ->with('Success','Profile updated SuccessFully');
    }
}
