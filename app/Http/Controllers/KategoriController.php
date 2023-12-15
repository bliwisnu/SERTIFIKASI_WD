<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menambah Kategori
    public function tambahKategori(Request $request)
    {
        Kategori::create($request->all());
        $categoryAlat = Kategori::where('category_id', $request->category_id);

        $categoryData = $categoryAlat->first();
        $categoryID = $categoryData->id;
        $categoryData->category_id = $categoryID;
        
        return redirect("/tambahKategori");
    }

    // Mengedit Kategori
    public function editKategori_page($id)
    {
        $editKategori = Kategori::find($id);
        return view('kategori.editKategori', compact(['editKategori']));
    }
    public function editKategoriStore($id, Request $request)
    {
        $editKategoriStore = Kategori::find($id);
        $editKategoriStore->update($request->all());
        return redirect('/daftarKategori');
    }

    // Hapus Kategori
    public function destroyKategori($id)
    {
        Kategori::find($id)->delete();
        return redirect("/daftarKategori");
    }
}
