<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Categories;
use Illuminate\Http\Request;

class walletCotroller extends Controller
{
    public function wallet()
    {
        $categories = Categories::whereNull('parent_id')
            ->where('status', 1) // Chỉ lấy danh mục cha đang hoạt động
            ->with([
                'children' => function ($query) {
                    $query->where('status', 1) // Chỉ lấy danh mục con đang hoạt động
                        ->with([
                            'children' => function ($subQuery) {
                                $subQuery->where('status', 1); // Chỉ lấy danh mục cháu đang hoạt động
                            }
                        ]);
                }
            ])->get();
            $listBank = Bank::get();  
        return view('client.contents.wallets.cash')->with(['categories' => $categories])->with(['listBank' => $listBank]);
    }
 
}
