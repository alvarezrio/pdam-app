<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $complaints = Pengaduan::where('user_nik', Auth::user()->nik)->get(); // Mengambil semua pengaduan dari user yang login
        return view('pelanggan.aduan', compact('complaints')); // Memuat view dengan daftar pengaduan
    }

    public function store(Request $request)
    {
        $request->validate([
            'complaintCategory' => 'required|string|max:255',
            'complaintDetails'  => 'required|string',
            'complaintUrgency'  => 'required|string|max:255',
        ]);

        Pengaduan::create([
            'user_nik'      => Auth::user()->nik,
            'kategori'      => $request->complaintCategory,
            'urgensi'       => $request->complaintUrgency,
            'isi_aduan'     => $request->complaintDetails,
            'tindak_lanjut' => null, // Awalnya null, akan diupdate nanti
        ]);

        return redirect()->back()->with('success', 'Pengaduan telah berhasil dikirim.');
    }
}
