<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;

class UserBillController extends Controller
{
    public function index()
    {
        // Ambil nik dari user yang terautentikasi, asumsi ada kolom 'nik' di tabel users
        $nik = Auth::user()->nik;

        // Fetch paid bills
        $paidBills = Tagihan::select('id', 'tagihan_tglPembayaran', 'tagihan_jmlDibayar', 'tagihan_nokwitansi', 'tagihan_statusPembayaran', 'tagihan_masaTagihan')
                            ->where('tagihan_nik', $nik)
                            ->where('tagihan_statusPembayaran', 'Lunas')
                            ->get();

        // Fetch unpaid bills
        $unpaidBills = Tagihan::select('id', 'tagihan_tglTagihan', 'tagihan_jmlTagihan', 'tagihan_tglJatuhTempo', 'tagihan_masaTagihan')
                            ->where('tagihan_nik', $nik)
                            ->where('tagihan_statusPembayaran', 'belum_dibayar')
                            ->get();

        // Fetch pending bills
        $pendingBills = Tagihan::select('id', 'tagihan_tglPembayaran', 'tagihan_jmlDibayar', 'tagihan_nokwitansi', 'tagihan_statusPembayaran', 'tagihan_masaTagihan')
                            ->where('tagihan_nik', $nik)
                            ->where('tagihan_statusPembayaran', 'Pending')
                            ->get();

        // Send data to the view
        return view('pelanggan.index', [
            'paidBills' => $paidBills,
            'unpaidBills' => $unpaidBills,
            'pendingBills' => $pendingBills // Include pending bills in the view data
        ]);
    }

}
