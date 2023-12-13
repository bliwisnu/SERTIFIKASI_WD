<?php

namespace App\Http\Controllers;

use App\Models\AlatModel;
use App\Models\VerifModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_user == 0) {
            $allAlat = AlatModel::all();
            return view('user.dashboard-user', compact(['allAlat']));
        } elseif (auth()->user()->role_user == 1) {
            $countUsers = VerifModel::count();
            $allUsers = VerifModel::all();
            return view('dashboard', compact(['countUsers', 'allUsers']));
        }
    }
}

// $allAlat = AlatModel::all();
// return view('user.dashboard-user', compact(['allAlat']));
