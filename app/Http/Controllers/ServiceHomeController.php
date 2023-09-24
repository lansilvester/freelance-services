<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;

class ServiceHomeController extends Controller
{

    public function index()
    {
        $data_service = Service::all();
        $data_kategori = Category::all();
        return view('pages.service.all', compact('data_service','data_kategori'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        $data_kategori = Category::all();
        $data_ulasan = Review::where('service_id', $id)->get();
        return view('pages.service.show', compact('service','data_kategori','data_ulasan'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
