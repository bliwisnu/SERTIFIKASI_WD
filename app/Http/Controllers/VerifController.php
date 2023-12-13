<?php

namespace App\Http\Controllers;

use App\Models\VerifModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VerifController extends Controller
{
    public function registerPage()
    {
        return view('verif.register');
    }

    public function registerStore(Request $request)
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
            'remember_token' => Str::random(60)
        ]);
        return redirect('/register')->with('successRegist', 'Akunmu sukses didaftarkan.');
    }

    function loginStore(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $time = 360;
            $response = new Response(redirect('/')->with('berhasilLogin'));
            if ($request->has('remember')) {
                $response->withCookie(Cookie("alat-alat", "alat-alat", $time));
                return $response;
            } else {
                return redirect('/')->with('berhasilLogin', 'Selamat Datang di AGRORENT');
            }
        } else {
            return redirect()->back()->with('wrongAuth', 'Email atau Password tidak sesuai');
        }
    }
    public function lupaPassword_store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);

        // Ambil user berdasarkan email
        $user = VerifModel::where("email", $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect("/login")->with('success', 'Password berhasil diubah!');
    }

    public function delete_user($id)
    {
        VerifModel::find($id)->delete();
        return redirect()->back();
    }
    public function forget(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // Ambil user berdasarkan email
        $user = VerifModel::where("email", $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect("/login")->with('success', 'Password berhasil diubah!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
