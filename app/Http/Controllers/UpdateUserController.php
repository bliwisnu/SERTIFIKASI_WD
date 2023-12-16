<?php

namespace App\Http\Controllers;

use App\Models\VerifModel;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{

    public function editUserPage($id)
    {
        $userData = VerifModel::findOrFail($id);
        return view('user.EditUser', compact('userData'));
    }

    public function updateUser($id, Request $request)
    {
        $updateProfile = VerifModel::findOrFail($id);
        $updateProfile->update($request->all());
        return redirect()->back()->with("success","");
    }
}
