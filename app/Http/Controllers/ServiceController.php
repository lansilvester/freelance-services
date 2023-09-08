<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller{
    public function index()
    {
        $data_service = Service::all();
        return view('admin.pages.services.all', compact('data_service'));
        
    }
    public function admin_service($id)
    {
        $data_service = Service::where('user_id', Auth::user()->id);
        return view('admin.pages.services.all', compact('data_service'));
        
    }
    
    public function create()
    {
        $data_kategori = Category::all();
        return view('admin.pages.services.create', compact('data_kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'nama' => 'required|string|max:255',
            'foto' => 'image|max:2048', // Sesuaikan dengan validasi yang Anda butuhkan
            'deskripsi' => 'required',
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
        $service->vendor_id = $user->vendor->id; // Sesuaikan dengan relasi yang digunakan
        $service->category_id = $request->input('category_id');
        $service->nama = $request->input('nama');
        $service->foto = $fotoServiceName;
        $service->deskripsi = $request->input('deskripsi');
        $service->save();
    
        return redirect()->route('service.index')->with('success', 'Service berhasil ditambahkan!');
    }
    

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.pages.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'deskripsi' => 'required',
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
        $service->save();
    
        return redirect()->route('service.index')->with('success', 'Service berhasil diperbarui!');
    }
    
    public function destroy($id)
    {
        //
    }
}
