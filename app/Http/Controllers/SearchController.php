<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Vendor;

class SearchController extends Controller{
    
    public function search(Request $request){
        $query = $request->input('query');
        $data_kategori = Category::all();

            $results = Service::where('nama', 'like', '%' . $query . '%')->get();
    

        return view('pages.service.search', compact('results','data_kategori','query'));
    }
}
