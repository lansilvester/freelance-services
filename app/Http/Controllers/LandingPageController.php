<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $data_kategori = Category::all();
        $data_service = Service::paginate(5);
        
        return view('pages.main', compact('data_kategori', 'data_service'));
    }
}
