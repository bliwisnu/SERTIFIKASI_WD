<?php

namespace App\Http\Controllers;

use App\Models\VerifModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TambahUserController extends Controller
{
    public function TambahUserStore(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:5',
            'username' => 'required'
        ], [
            'username.required' => "Field nama wajib di isi."
        ]);
        VerifModel::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'gender' => $request->gender,
            'alamat'=> $request->alamat,
            'remember_token' => Str::random(60),
            'role_user' => $request->requset_user,
        ]);
        return redirect('/register')->with('successRegist', 'Akunmu sukses didaftarkan.');
    }
}
