<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function listShop()
    {
        
        $shops = ShopsController::where('status', 1)->get();

        // Truyền dữ liệu sang view
        return view('admin.contents.shops.listShop', compact('shops'));
    }

    
}
