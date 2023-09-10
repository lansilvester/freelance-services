<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $data_vendor = Vendor::where('user_id', $user->id)->get();
        if(Auth::user()->id == $user->id){
            return view('admin.pages.users.profile', compact('user','data_vendor'));
        }else{
            return redirect()->route('dashboard.index');
        }
    }
    
    public function edit($id)
    {
        $user = User::FindOrFail($id);
        return view('admin.pages.users.profile_edit', compact('user'));
        //
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'foto_profil' => 'image|max:2048'
        ]);
    
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
    
        $user->role = Auth::user()->role;
        $user->save();
    
        return redirect()->route('dashboard.index')->with('success', 'Pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        //
    }
}
