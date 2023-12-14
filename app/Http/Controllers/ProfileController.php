<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        // $warungs = Warung::where('verif_status', '=', 'verified')->take(6)->get();
        return view ('profile.profile');
    }
}
