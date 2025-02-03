<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {
        $userNik = Auth::user()->nik;
        $deposit = Deposit::where('user_nik', $userNik)->first();

        $saldo = $deposit ? $deposit->saldo : 0;  // Default saldo adalah Rp 0 jika tidak ada di database

        return view('pelanggan.deposit', compact('saldo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'depositAmount' => 'required|numeric|min:1'
        ]);

        $userNik = Auth::user()->nik;
        $deposit = Deposit::firstOrCreate(
            ['user_nik' => $userNik],
            ['saldo' => 0]
        );

        $deposit->increment('saldo', $request->depositAmount);

        return back()->with('success', 'Deposit berhasil diisi ulang.');
    }
}
