<?php

namespace App\Http\Controllers;
use App\Models\Tagihan;
use App\Models\Pelanggan;

use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function checkPayment(Request $request)
    {
        $request->validate([
            'nikPelanggan' => 'required|string'
        ]);

        $nikPelanggan = $request->nikPelanggan;
        $pelanggan = Pelanggan::where('nik', $nikPelanggan)->first();
        $tagihan = Tagihan::where('tagihan_nik', $nikPelanggan)
                            ->orderBy('tagihan_tglTagihan', 'desc')
                            ->get();

        return view('cekTagihan', compact('tagihan', 'pelanggan'));
    }

}
