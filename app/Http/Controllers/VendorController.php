<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    
    public function index()
    {
        $data_vendor = Vendor::paginate(7);
        return view('admin.pages.vendor.all', compact('data_vendor'));
    }

    public function create()
    {        
        return view('admin.pages.vendor.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'image|max:2048', // Sesuaikan dengan validasi yang Anda butuhkan
            'kontak' => 'required|string',
            'alamat' => 'required|string',
            'instagram' => 'nullable|string',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);
        if ($request->hasFile('foto')) {
            $fotoName = $request->file('foto')->store('foto_vendor', 'public');
        } else {
            $fotoName = null;
        }

        $user = Auth::user();

        // Buat vendor baru
        $vendor = new Vendor;
        $vendor->nama = $request->input('nama');
        $vendor->deskripsi = $request->input('deskripsi');
        $vendor->foto = $fotoName;
        $vendor->kontak = $request->input('kontak');
        $vendor->alamat = $request->input('alamat');
        $vendor->instagram = $request->input('instagram');
        $vendor->facebook = $request->input('facebook');
        $vendor->linkedin = $request->input('linkedin');
        $vendor->user_id = Auth::user()->id; // Set user_id sesuai dengan user yang sedang login
        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'Vendor berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendor.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'image|max:2048', // Sesuaikan dengan validasi yang Anda butuhkan
            'kontak' => 'required|string',
            'alamat' => 'required|string',
            'instagram' => 'nullable|string',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);

        // Cari vendor yang akan diperbarui
        $vendor = Vendor::findOrFail($id);

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoName = $request->file('foto')->store('foto_vendor', 'public');

            // Hapus foto lama jika ada
            if ($vendor->foto) {
                Storage::disk('public')->delete($vendor->foto);
            }

            $vendor->foto = $fotoName;
        }

        // Perbarui informasi vendor
        $vendor->nama = $request->input('nama');
        $vendor->deskripsi = $request->input('deskripsi');
        $vendor->kontak = $request->input('kontak');
        $vendor->alamat = $request->input('alamat');
        $vendor->instagram = $request->input('instagram');
        $vendor->facebook = $request->input('facebook');
        $vendor->linkedin = $request->input('linkedin');
        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'Vendor berhasil diperbarui!');
    }

    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendor.show', compact('vendor'));
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);

        // Hapus foto jika ada
        if ($vendor->foto) {
            Storage::disk('public')->delete($vendor->foto);
        }

        $vendor->delete();

        return redirect()->route('vendor.index')->with('success', 'Vendor berhasil dihapus.');
    }
}
