<?php

namespace App\Http\Controllers;

use App\Events\UserDeleted;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        if(Auth::user()->role == 'super_admin'){
            return view('admin.pages.users.create');
        }else{
            return redirect()->route('dashboard.index');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'foto_profil' => 'image|max:2048', // Sesuaikan dengan validasi yang Anda butuhkan
            'role' => 'required|in:admin_vendor,super_admin,user',
        ]);
    
        // Proses upload foto profil jika ada
        if ($request->hasFile('foto_profil')) {
            // Lakukan proses upload dan simpan nama file
            $fotoProfilName = $request->file('foto_profil')->store('profil', 'public');
        } else {
            $fotoProfilName = null; // Tidak ada foto profil
        }
    
        // Buat user baru
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->foto_profil = $fotoProfilName;
        $user->role = $request->input('role');
        $user->save();
    
        return redirect()->route('dashboard.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }
    

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::FindOrFail($id);
        if(Auth::user()->id == $user->id){
            return view('admin.pages.users.edit', compact('user'));
        }else{
            return redirect()->route('dashboard.index');

        }
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', // Password tidak wajib diubah
            'foto_profil' => 'image|max:2048', // Sesuaikan dengan validasi yang Anda butuhkan
            'role' => 'required|in:admin_vendor,super_admin,user',
        ]);
    
        // Cari user yang akan diperbarui
        $user = User::findOrFail($id);
    
        // Proses upload foto profil jika ada
        if ($request->hasFile('foto_profil')) {
            // Lakukan proses upload dan simpan nama file
            $fotoProfilName = $request->file('foto_profil')->store('profil', 'public');
    
            // Hapus foto profil lama jika ada
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }
    
            $user->foto_profil = $fotoProfilName;
        }
    
        // Perbarui informasi pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        // Perbarui password jika ada input
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->role = $request->input('role');
        $user->save();
    
        return redirect()->route('dashboard.index')->with('success', 'Pengguna berhasil diperbarui!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        event(new UserDeleted($user));

        // Hapus foto profil jika ada
        if ($user->foto_profil) {
            Storage::disk('public')->delete($user->foto_profil);
        }
    
        // Hapus user dari database
        $user->delete();
    
        return redirect()->route('dashboard.index')->with('success_hapus', 'Pengguna berhasil dihapus!');
    }
    
}
