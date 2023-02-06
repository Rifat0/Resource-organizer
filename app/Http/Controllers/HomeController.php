<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function dashboard()
    {
        $headerInfo = Category::with('items')->get();
        return view('content.dashboard',compact('headerInfo'));
    }
}
