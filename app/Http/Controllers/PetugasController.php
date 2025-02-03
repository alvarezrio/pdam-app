<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use Carbon\Carbon;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        $consumers = [];
        if ($request->has('searchQuery')) {
            $query = $request->input('searchQuery');
            $consumers = Pelanggan::where('nik', 'like', "%{$query}%")
                                  ->orWhere('nama', 'like', "%{$query}%")
                                  ->get();
        }

        return view('petugas.index', compact('consumers'));
    }

    public function submitMeterReading(Request $request, $nik)
    {
        $validatedData = $request->validate([
            'currentReading' => 'required|numeric',
            'masaTagihan' => 'required|string'
        ]);

        // Cek database untuk entri yang sudah ada
        $tagihanExist = Tagihan::where('tagihan_nik', $nik)
                            ->where('tagihan_masaTagihan', $validatedData['masaTagihan'])
                            ->exists();

        if ($tagihanExist) {
            return redirect()->back()->with('error', 'Tagihan untuk masa ini sudah tercatat.');
        }

        $tglTagihan = Carbon::now()->startOfMonth()->addDays(-1);
        $tglJatuhTempo = Carbon::now()->startOfMonth()->addDays(14); // Tanggal 15 bulan ini

        $tagihan = new Tagihan([
            'tagihan_nik' => $nik,
            'tagihan_tglTagihan' => $tglTagihan,
            'tagihan_tglJatuhTempo' => $tglJatuhTempo,
            'tagihan_jmlMeteran' => $validatedData['currentReading'],
            'tagihan_jmlTagihan' => $validatedData['currentReading'] * 50,
            'tagihan_statusPembayaran' => 'belum_dibayar',
            'tagihan_masaTagihan' => $validatedData['masaTagihan']
        ]);

        $tagihan->save();

        return redirect()->route('petugas')->with('success', 'Data pencatatan meteran berhasil disimpan.');
    }

    public function showDashboard()
    {
        // Only show the form here
        return view('petugas.dashboard');
    }

    public function dashboard(Request $request)
    {
        // Process the dashboard form submission here
        $request->validate([
            'month' => 'required|integer'
        ]);

        $month = $request->month;
        $year = now()->year;

        $recorded = Tagihan::whereMonth('tagihan_tglTagihan', '=', $month)
                        ->whereYear('tagihan_tglTagihan', '=', $year)
                        ->count();

        $totalCustomers = Pelanggan::count();
        $notRecorded = $totalCustomers - $recorded;

        $summary = [
            'recorded' => $recorded,
            'not_recorded' => $notRecorded
        ];

        return view('petugas.dashboard', compact('summary', 'month'));
    }



}
