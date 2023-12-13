<?php

namespace App\Http\Controllers;

use App\Models\AlatModel;
// use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;

class AlatController extends Controller
{
    public function tambahBarangStore(Request $request)
    {
        AlatModel::create($request->all());
        return redirect()->back();
    }
    // public function tambahBarangStore(Request $request) {
    // $alat = new AlatModel;
    // $alat->nama_alat = $request->nama_alat;
    // $alat->harga_alat = $request->harga_alat;

    // if ($image = $request->file('Foto')) {
    //     $destinationPath = 'img/alat/';
    //     $profileImage = "img/alat/" . date('YmdHis') . "." . $image->getClientOriginalExtension();
    //     $image->storeAs($destinationPath, $profileImage, 'public');
    //     $alat->input_gambar = $profileImage;
    // }

    // $alat->save();
// }

    public function editAlat_page($id)
    {
        $editKategori = AlatModel::find($id);
        return view('barang.editBarang', compact(['editBarang']));
    }
    public function destroy($id)
    {
        AlatModel::find($id)->delete();
        return redirect()->back();
    }
}
