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
}
