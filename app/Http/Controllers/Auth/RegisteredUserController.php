<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:15'], // Field nomor handphone
            'password' => ['required', 'confirmed', 'min:8'],
            'nik' => ['required', 'string', 'exists:pelanggan,nik'], // Validasi NIK
            'agree' => ['accepted'], // Validasi checkbox
        ]);
    
        // Cek apakah NIK ada di tabel pelanggan
        $nikExists = Pelanggan::where('nik', $validated['nik'])->exists();
        if (!$nikExists) {
            return back()->withErrors(['nik' => 'NIK tidak terdaftar sebagai pelanggan.']);
        }
    
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null, // Nilai default jika tidak diisi
            'password' => bcrypt($validated['password']),
            'nik' => $validated['nik'], // Menyimpan NIK
        ]);
    
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login.');
    }
}
