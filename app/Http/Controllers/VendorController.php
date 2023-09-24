<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    
    public function index()
    {
        $data_vendor = Vendor::paginate(7);
        $data_vendor_by_user = Vendor::where('user_id', Auth::user()->id)->get();
        return view('admin.pages.vendor.all', compact('data_vendor','data_vendor_by_user'));
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
            'foto' => 'image|max:2048',
            'kontak' => 'required|string',
            'alamat' => 'required|string',
            'instagram' => 'nullable|string',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'map' => 'nullable|string'
        ]);
        if ($request->hasFile('foto')) {
            $fotoName = $request->file('foto')->store('foto_vendor', 'public');
        } else {
            $fotoName = null;
        }
        $user = Auth::user();

        // Periksa peran pengguna saat ini
        if ($user->role === 'user') {
            // Jika peran adalah 'user', ubah menjadi 'admin_vendor'
            $user->role = 'admin_vendor';
            $user->save();
        }

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
        $vendor->map = $request->input('map');
        $vendor->user_id = $user->id; // Set user_id sesuai dengan user yang sedang login
        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'Vendor berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('admin.pages.vendor.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
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
            'map' => 'nullable|string',
        ]);

        $vendor = Vendor::findOrFail($id);

        if ($request->hasFile('foto')) {
            $fotoName = $request->file('foto')->store('foto_vendor', 'public');

            // Hapus foto lama jika ada
            if ($vendor->foto) {
                Storage::disk('public')->delete($vendor->foto);
            }

            $vendor->foto = $fotoName;
        }

        $vendor->nama = $request->input('nama');
        $vendor->deskripsi = $request->input('deskripsi');
        $vendor->kontak = $request->input('kontak');
        $vendor->alamat = $request->input('alamat');
        $vendor->instagram = $request->input('instagram');
        $vendor->facebook = $request->input('facebook');
        $vendor->linkedin = $request->input('linkedin');
        $vendor->map = $request->input('map');
        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'Vendor berhasil diperbarui!');
    }

    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        $data_service = Service::where('vendor_id', $id)->paginate(5);
        return view('admin.pages.vendor.show', compact('vendor','data_service'));
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);
        dd($vendor);
        
        // Hapus foto jika ada
        if ($vendor->foto) {
            Storage::disk('public')->delete($vendor->foto);
        }
        $vendor->services()->delete();
        $vendor->services->each(function ($service) {
            $service->review()->delete();
        });
        $vendor->delete();
        return redirect()->route('vendor.index')->with('success', 'Vendor berhasil dihapus.');
    }
}
