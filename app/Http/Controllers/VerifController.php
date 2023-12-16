<?php

namespace App\Http\Controllers;

use App\Models\VerifModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class VerifController extends Controller
{
    public function registerPage()
    {
        return view('verif.register');
    }

    public function registerStore(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required|min:5',
                'username' => 'required'
            ], [
                'username.required' => "Field nama wajib di isi.",
                'email.unique' => "Email tidak dapat digunakan."
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            // Simpan data ke database
            VerifModel::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
                'role_user' => 0
            ]);

            notify()->success('Akunmu sukses didaftarkan ⚡️');
            return redirect('/register');
        } catch (ValidationException $e) {
            // Tangani kesalahan validasi
            notify()->error('Terdapat kesalahan validasi ⚡️');
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (QueryException $e) {
            // Tangani kesalahan database
            notify()->error('Email sudah tersedia ⚡️');
            return redirect()->back()->withInput();
        }
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
                return redirect('/dashboard')->with('berhasilLogin', 'Selamat Datang di AGRORENT');
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
