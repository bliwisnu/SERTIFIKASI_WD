<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SewaController extends Controller
{
    public function cetakListOrderStore()
    {
        $countAlat = PeminjamanModel::whereNotNull('alat_id')->count();
        $peminjaman = PeminjamanModel::all();
        $countHarga = $peminjaman->sum(function ($sewa) {
            return $sewa->table_alat->harga_alat;
        });

        return view('user.CetakListOrder', compact('peminjaman', 'countAlat', 'countHarga'));
    }

    public function listOrderStore()
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

    // public function sentPeminjaman(Request $request)
    // {
    //     $request->validate([
    //         // Add validation rules for other fields if needed
    //         'tanggal_sewa' => 'required|date',
    //         'tanggal_pengembalian' => 'required|date|after:tanggal_sewa',
    //         'alat_id' => [
    //             'required',
    //             Rule::unique('table_peminjaman')->where(function ($query) use ($request) {
    //                 return $query->where('tanggal_sewa', $request->tanggal_sewa)
    //                     ->where('alat_id', $request->alat_id);
    //             }),
    //         ],
    //     ], [
    //         'alat_id.unique' => 'Alat pada tanggal tersebut sudah disewa.',
    //     ]);

    //     try {
    //         DB::beginTransaction();
    //         PeminjamanModel::create($request->except('category'));

    //         // ... (your existing logic)
    //         $peminjamanAlat = PeminjamanModel::where('user_id', $request->user_id)
    //             ->where('alat_id', $request->alat_id)
    //             ->where('tanggal_pengembalian', $request->tanggal_pengembalian);
    //         $alatData = $peminjamanAlat->first();
    //         $alatData->save();

    //         DB::commit();

    //         // Success Notification
    //         notify()->success('Peminjaman berhasil disimpan ⚡️'); // Delay for 3 seconds
    //         return redirect('/');
    //     } catch (\Throwable $throw) {
    //         DB::rollback();

    //         // Error Notification
    //         notify()->error('Terdapat kesalahan validasi ⚡️'); // Delay for 3 seconds
    //         dd($throw);
    //     }
    // }

    // PERCOBAAN SETELAH BENAR

    // public function sentPeminjaman(Request $request)
    // {
    //     $request->validate([
    //         // Add validation rules for other fields if needed
    //         'tanggal_sewa' => 'required|date',
    //         'tanggal_pengembalian' => 'required|date|after:tanggal_sewa',
    //         'alat_id' => [
    //             'required',
    //             Rule::unique('table_peminjaman')->where(function ($query) use ($request) {
    //                 return $query->where('tanggal_sewa', $request->tanggal_sewa)
    //                     ->where('alat_id', $request->alat_id);
    //             }),
    //         ],
    //     ]);

    //     try {
    //         DB::beginTransaction();

    //         // Check if the alat is already booked for the specified dates
    //         $isAlatBooked = PeminjamanModel::where('alat_id', $request->alat_id)
    //             ->where('tanggal_sewa', '<=', $request->tanggal_pengembalian)
    //             ->where('tanggal_pengembalian', '>=', $request->tanggal_sewa)
    //             ->exists();

    //         if ($isAlatBooked) {
    //             notify()->error('Alat sudah di sewa ⚡️');
    //             return redirect()->back();
    //         }

    //         // If not booked, proceed with creating the peminjaman
    //         PeminjamanModel::create($request->except('category'));

    //         // ... (your existing logic)
    //         $peminjamanAlat = PeminjamanModel::where('user_id', $request->user_id)
    //             ->where('alat_id', $request->alat_id)
    //             ->where('tanggal_pengembalian', $request->tanggal_pengembalian);
    //         $alatData = $peminjamanAlat->first();
    //         $alatData->save();

    //         DB::commit();

    //         // If successful, show success notification
    //         notify()->success('Alat berhasil di sewa ⚡️');

    //         return redirect('/');
    //     } catch (\Throwable $throw) {
    //         DB::rollback();

    //         // If an error occurs, show error notification
    //         notify()->error('Terdapat kesalahan validasi ⚡️');

    //         dd($throw);
    //     }
    // }

    // PERCOBAAN SETELAH BENAR

    // PERCOBAAN SETELAH BENAR 2
    public function sentPeminjaman(Request $request)
    {
        $request->validate([
            // Add validation rules for other fields if needed
        ]);

        try {
            DB::beginTransaction();

            // Check if the tool is already booked for the specified date range
            $existingBooking = PeminjamanModel::where('alat_id', $request->alat_id)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('tanggal_sewa', [$request->tanggal_sewa, $request->tanggal_pengembalian])
                        ->orWhereBetween('tanggal_pengembalian', [$request->tanggal_sewa, $request->tanggal_pengembalian]);
                })
                ->first();

            if ($existingBooking) {
                // Tool is already booked for the specified date range
                notify()->error('Maaf, alat pada tanggal tersebut sudah di sewa 🙏🏻');
                return redirect()->back();
            }

            // Tool is available, create the booking
            PeminjamanModel::create($request->except('category'));

            $peminjamanAlat = PeminjamanModel::where('user_id', $request->user_id)
                ->where('alat_id', $request->alat_id)
                ->where('tanggal_pengembalian', $request->tanggal_pengembalian);
            $alatData = $peminjamanAlat->first();
            $alatData->save();

            DB::commit(); // Commit the transaction after the data is saved

            notify()->success('Alat berhasil di sewa ⚡️');
            // return redirect('/');
            return redirect()->back();
        } catch (\Throwable $throw) {
            DB::rollback();
            dd($throw);
        }
    }
    // PERCOBAAN SETELAH BENAR 2

    // SUDAH BENAR

    // public function sentPeminjaman(Request $request)
    // {
    //     $request->validate([
    //         // Add validation rules for other fields if needed
    //         'tanggal_sewa' => 'required|date',
    //         'tanggal_pengembalian' => 'required|date|after:tanggal_sewa',
    //         'alat_id' => [
    //             'required',
    //             Rule::unique('table_peminjaman')->where(function ($query) use ($request) {
    //                 return $query->where('tanggal_sewa', $request->tanggal_sewa)
    //                     ->where('alat_id', $request->alat_id);
    //             }),
    //         ],
    //     ]);

    //     try {
    //         DB::beginTransaction();
    //         PeminjamanModel::create($request->except('category'));

    //         // ... (your existing logic)
    //         $peminjamanAlat = PeminjamanModel::where('user_id', $request->user_id)
    //             ->where('alat_id', $request->alat_id)
    //             ->where('tanggal_pengembalian', $request->tanggal_pengembalian);
    //         $alatData = $peminjamanAlat->first();
    //         $alatData->save();

    //         DB::commit();
    //         return redirect('/');
    //     } catch (\Throwable $throw) {
    //         DB::rollback();
    //         dd($throw);
    //     }
    // }

    // SUDAH BENAR

    // public function sentPeminjaman(Request $request)
    // {
    //     $request->validate([
    //         // Add validation rules for other fields if needed
    //     ]);

    //     try {
    //         DB::beginTransaction();
    //         PeminjamanModel::create($request->except('category'));

    //         // ... (your existing logic)
    //         $peminjamanAlat = PeminjamanModel::where('user_id', $request->user_id)
    //             ->where('alat_id', $request->alat_id)->where('tanggal_pengembalian', $request->tanggal_pengembalian);
    //         $alatData = $peminjamanAlat->first();
    //         $alatData->save();

    //         DB::commit();
    //         return redirect('/');
    //     } catch (\Throwable $throw) {
    //         DB::rollback();
    //         dd($throw);
    //     }
    // }
}
