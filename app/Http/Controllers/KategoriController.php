<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function tambahKategori(Request $request){
        Kategori::create($request->all());
        return redirect("/tambahKategori");
    }
    public function editKategori_page($id)
    {
        $editKategori = Kategori::find($id);
        return view('kategori.editKategori', compact(['editKategori']));
    }
    // public function editPage_store($slug, Request $request)
    // {
    //     $editKategori = Kategori::where('slug', $slug)->first();
    //     $editKategori->update($request->all());

    //     return redirect('/show-category');
    // }

    public function destroyKategori($id)
    {
        Kategori::find($id)->delete();
        return redirect("/daftarKategori");
    }
}
