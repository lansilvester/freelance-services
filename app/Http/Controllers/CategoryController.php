<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data_kategori = Category::all();
        return view('admin.pages.kategori.all', compact('data_kategori'));
    }
    public function create()
    {
        return view('admin.pages.kategori.create');
        
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'icon' => 'required',
            'deskripsi' => 'max:255',

        ]);
    
        $category = new Category;
        $category->nama = $request->input('nama');
        $category->icon = $request->input('icon');
        $category->deskripsi = $request->input('deskripsi');

        $category->save();
        
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dibuat!');
    }

    public function show($id)
    {
        $kategori = Category::findOrFail($id);
        return view('admin.pages.kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Category::findOrFail($id);
        return view('admin.pages.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'icon' => 'required',
            'deskripsi' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->nama = $request->input('nama');
        $category->icon = $request->input('icon');
        $category->deskripsi = $request->input('deskripsi');

        $category->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Category::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
