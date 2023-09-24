<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller{
    public function index()
    {
        if(Auth::user()->role == 'super_admin'){
            $data_service = Service::all();
            return view('admin.pages.services.all', compact('data_service'));
        }
        
        if(Auth::user()->role == 'admin_vendor'){
            
            // $data_service = Service::where('vendor_id', Auth::user()->id)->get();

            $data_service = Auth::user()->vendor->services;
            // dd($data_service);
            return view('admin.pages.services.all', compact('data_service'));
        }
        
    }
    public function admin_service($id)
    {
        $data_service = Service::where('user_id', Auth::user()->id);
        return view('admin.pages.services.all', compact('data_service'));
        
    }
    
    public function create()
    {
        $data_kategori = Category::all();
        $data_vendor = Vendor::where('user_id', Auth::user()->id)->get();
        return view('admin.pages.services.create', compact('data_kategori','data_vendor'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'nama' => 'required|string|max:255',
            'foto' => 'image|max:2048', // Sesuaikan dengan validasi yang Anda butuhkan
            'deskripsi' => 'required',
            'layanan' => 'required',
        ]);
    
        // Ambil informasi user yang sedang login
        $user = auth()->user();
    
        // Proses upload foto service jika ada
        if ($request->hasFile('foto')) {
            // Lakukan proses upload dan simpan nama file
            $fotoServiceName = $request->file('foto')->store('service', 'public');
        } else {
            $fotoServiceName = null; // Tidak ada foto service
        }
    
        // Buat service baru dengan vendor_id sesuai user yang sedang login
        $service = new Service;
        $service->vendor_id = $request->input('vendor_id');
        $service->category_id = $request->input('category_id');
        $service->nama = $request->input('nama');
        $service->foto = $fotoServiceName;
        $service->deskripsi = $request->input('deskripsi');
        $service->layanan = $request->input('layanan');
        $service->save();
    
        return redirect()->route('service.index')->with('success', 'Service berhasil ditambahkan!');
    }
    

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.pages.services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $data_kategori = Category::all();

        return view('admin.pages.services.edit', compact('service','data_kategori'));
        
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'nama' => 'required|string|max:255',
            'foto' => 'image|max:2048', // Sesuaikan dengan validasi yang Anda butuhkan
            'deskripsi' => 'string',
            'layanan' => 'string',
        ]);
    
        $user = auth()->user();
    
        $service = Service::findOrFail($id);
    
        if ($service->vendor->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk memperbarui service ini.');
        }
    
        if ($request->hasFile('foto')) {
            // Lakukan proses upload dan simpan nama file
            $fotoServiceName = $request->file('foto')->store('service', 'public');
            // Hapus foto lama jika ada
            if ($service->foto) {
                Storage::disk('public')->delete($service->foto);
            }
            $service->foto = $fotoServiceName;
        }
    
        $service->category_id = $request->input('category_id');
        $service->nama = $request->input('nama');
        $service->deskripsi = $request->input('deskripsi');
        $service->layanan = $request->input('layanan');
        $service->save();
    
        return redirect()->route('service.index')->with('success', 'Service berhasil diperbarui!');
    }
    
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
    
        // Hapus foto jika ada
        if ($service->foto) {
            Storage::disk('public')->delete($service->foto);
        }
        $service->delete();
        return redirect()->route('service.index')->with('success', 'service berhasil dihapus.');
    }
}
