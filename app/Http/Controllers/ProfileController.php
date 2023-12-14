<?php

namespace App\Http\Controllers;

use App\Models\VerifModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        // $warungs = Warung::where('verif_status', '=', 'verified')->take(6)->get();
        return view('profile.profile');
    }

    public function editProfile($id, Request $request)
    {
        $userGambar = VerifModel::findOrFail($id);
        $userGambar->update($request->all());
        if ($request->hasFile("profile_picture")) {
            $request->file("profile_picture")->move("img/", $request->file("profile_picture")->getClientOriginalName());
            $userGambar->profile_picture = $request->file("profile_picture")->getClientOriginalName();
            $userGambar->save();
        }
        return redirect()->back()->with("success", "");
    }

    public function updateUser($id, Request $request)
    {
        $updateUser = VerifModel::findOrFail($id);
        $updateUser->update($request->all());
        return redirect()->back()->with("success", "");
    }

    public function createUser(Request $request )
    {
        VerifModel::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'gender' => $request->gender,
            'alamat'=> $request->alamat,
            'remember_token' => Str::random(60),
            'role_user' => 0,
        ]);
        return redirect()->back();
    }


}
