<?php

namespace App\Http\Controllers;

use App\Models\AlatModel;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function tambahBarangStore(Request $request)
    {
        AlatModel::create($request->all());
        return redirect()->back();
    }
    public function editAlat_page($id)
    {
        $editKategori = AlatModel::find($id);
        return view('barang.editBarang', compact(['editBarang']));
    }
}
