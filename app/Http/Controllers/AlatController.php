<?php

namespace App\Http\Controllers;

use App\Models\AlatModel;
use App\Models\Kategori;
use App\Models\KategoriAlatModel;
// use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;

class AlatController extends Controller
{
    public function tambahBarangStore(Request $request)
    {
        // $semuaBarang = KategoriAlatModel::all();
        $semuaBarang = AlatModel::create($request->except('category'));
        $semuaBarang->categories()->sync($request->category);
        $alatBarang = AlatModel::where('alat_catalogue_id', $request->alat_catalogue_id);

        $alatData = $alatBarang->first();
        $alatID = $alatData->id;
        $alatData->alat_catalogue_id = $alatID;

        $alatBarang = AlatModel::where('alat_catalogue_id', $request->alat_catalogue_id);

        $alatData = $alatBarang->first();
        $alatID = $alatData->id;
        $alatData->alat_catalogue_id = $alatID;
        
        
        if ($alatData) {
            $alatData->save();
        }
        if ($request->hasFile("input_gambar")) {
            $request->file("input_gambar")->move("img/alat/", $request->file("input_gambar")->getClientOriginalName());
            $semuaBarang->input_gambar = $request->file("input_gambar")->getClientOriginalName();
            $semuaBarang->save();
        }
        
        // $alatGambar = new AlatModel;
        // $alatGambar->nama_alat = $request->nama_alat;
        // $alatGambar->harga_alat = $request->harga_alat;

        // if ($image = $request->file('input_gambar')) {
        //     $destinationPath = 'img/alat/';
        //     $alatImage = "img/alat/" . date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $alatImage);
        //     $input['image'] = "$alatImage";
        //     $alatGambar->input_gambar = $input['image'];
        // }

        // $alatGambar->create($request->all());
        // $alatGambar->save();
        // return redirect()->back()->with("success", "Alat Successfully Added");
    }

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
