<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SewaController extends Controller
{
    public function index()
    {
        $countAlat = PeminjamanModel::whereNotNull('alat_id')->count();
        $peminjaman = PeminjamanModel::all();
        $countHarga = $peminjaman->sum(function ($sewa) {
            return $sewa->table_alat->harga_alat;
        });

        return view('user.listOrder', compact('peminjaman', 'countAlat', 'countHarga'));
    }

    public function mengubahStatusStore($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:in stock,terpinjam,kembali',
        ]);

        $peminjaman = PeminjamanModel::findOrFail($id);

        if (!$peminjaman) {
            return response()->json(['message' => 'Peminjaman not found'], 404);
        }
        $peminjaman->status = $request->status;
        $peminjaman->save();
        // dd($peminjaman);
        return redirect('/dataPeminjaman');
    }

    public function showPeminjamanPage()
    {

        $totPeminjaman = PeminjamanModel::latest()->get();
        return view('barang.dataPeminjaman', compact('totPeminjaman'));
        // return view('test');
    }

    // public function sentPeminjaman(Request $request) {
    //     $request["tanggal_sewa"] = Carbon::now()->toDateString();
    //     $request["tanggal_pengembalian"] = Carbon::now()->addDays(5)->toDateString();
    //     try {
    //         DB::beginTransaction();
    //         PeminjamanModel::create($request->except('category'));
    //         DB::commit();

    //         $peminjamanAlat = PeminjamanModel::where('user_id', $request->user_id)
    //             ->where('alat_id', $request->alat_id)->where('tanggal_pengembalian', $request->tanggal_pengembalian);
    //         $alatData = $peminjamanAlat->first();
    //         $alatData->save();
    //         return redirect('/');
    //     } catch (\Throwable $throw) {
    //         DB::rollback();
    //         dd($throw);
    //     }
    // }

    public function sentPeminjaman(Request $request)
    {
        $request->validate([
            // Add validation rules for other fields if needed
        ]);

        try {
            DB::beginTransaction();
            PeminjamanModel::create($request->except('category'));

            // ... (your existing logic)
            $peminjamanAlat = PeminjamanModel::where('user_id', $request->user_id)
                ->where('alat_id', $request->alat_id)->where('tanggal_pengembalian', $request->tanggal_pengembalian);
            $alatData = $peminjamanAlat->first();
            $alatData->save();

            DB::commit();
            return redirect('/');
        } catch (\Throwable $throw) {
            DB::rollback();
            dd($throw);
        }
    }
}
