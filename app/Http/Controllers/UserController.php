<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query'); // Kata kunci pencarian
        $users = User::whereNull('role_id')->with('role')->get(); // Eager load role data
        $petugas = User::whereNotNull('role_id')->with('role')->get();
        $roles = Role::all();
        return view('admin.user', compact('users', 'petugas', 'roles'));
    }


    public function getByNik($nik)
    {
        $pelanggan = Pelanggan::where('nik', $nik)->first();

        if ($pelanggan) {
            return response()->json([
                'status' => 'success',
                'data' => $pelanggan
            ]);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:255', // Tambahkan validasi untuk phone
            'nik' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null, // Nilai default jika tidak diisi
            'password' => bcrypt($validated['password']),
            'nik' => $validated['nik'], // Menyimpan NIK
        ]);

        return redirect()->route('admin.user')->with('success', 'User has been added successfully.');
    }

    public function updateUserRole(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        // Debugging: Cek data yang diterima
        logger()->info('Validated Data:', $validatedData);

        // Debugging: Cek user sebelum update
        logger()->info('User before update:', $user->toArray());

        $user->update(['role_id' => $validatedData['role_id']]);

        // Debugging: Cek user setelah update
        logger()->info('User after update:', $user->toArray());

        return redirect()->route('admin.user')->with('success', 'User role updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User has been deleted successfully.');
    }
}
