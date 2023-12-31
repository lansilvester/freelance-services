<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $data_users = User::all();
        $data_vendor = Vendor::all();
        $data_service = Service::all();
        $data_kategori = Category::all();
        
        $my_vendor = Vendor::where('user_id',$id)->get();
        return view('admin.pages.dashboard', compact('data_users','data_vendor','data_service','data_kategori','my_vendor'));
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
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
