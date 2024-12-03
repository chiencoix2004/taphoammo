<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    // public function listShop()
    // {

    //     $shops = Shop::where('status', 1)->get();

    //     // Truyền dữ liệu sang view
    //     return view('admin.contents.shops.listShop', compact('shops'));
    // }
    public function listShop1()
    {
        $shops = Shop::with('user', 'category')->where('status', 1)->orderBy('created_at', 'desc')->paginate(15); // Lấy shop và user tương ứng
        return view('admin.contents.shops.listShop', compact('shops'));
    }

    // public function detailShop($slug)
    // {

    //     // Lấy chi tiết danh mục cha theo slug và bao gồm các danh mục con
    //     $detailShop = Shop::with('user','category', 'product')->where('slug', $slug)->first();
    //     $detailShop->increment('view');
    //     return view('admin.contents.shops.detailShop')
    //         ->with('detailShop', $detailShop);
    // }
    public function detailShop($slug)
    {
        // Lấy chi tiết shop bao gồm sản phẩm, người dùng, danh mục và comment
        $detailShop = Shop::with('user', 'category', 'product')->where('slug', $slug)->first();
        // Đếm số lượng bình luận của shop
        $commentCount = $detailShop->comments->count();  // 'comments' là mối quan hệ trong model Shop
// , 'comments.replies'
        // Đếm số lượng bình luận trong tuần
        $commentCountThisWeek = $detailShop->comments()->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),  // Ngày đầu tuần
            Carbon::now()->endOfWeek()      // Ngày cuối tuần
        ])->count();
        // // Tăng lượt xem của shop
        // $detailShop->increment('view');
        // // 
        // // Trả lại view với thông tin shop
        // return view('admin.contents.shops.detailShop')
        //     ->with('detailShop', $detailShop)
        //     ->with('commentCount', $commentCount)
        //     ->with('commentCountThisWeek', $commentCountThisWeek);
        // Lấy các bình luận với phân trang (10 bình luận mỗi trang)
        $comments = $detailShop->comments()->paginate(5);

        // Tăng lượt xem của shop
        $detailShop->increment('view');

        // Trả lại view với thông tin shop và các bình luận phân trang
        return view('admin.contents.shops.detailShop')
            ->with('detailShop', $detailShop)
            ->with('commentCount', $commentCount)
            ->with('commentCountThisWeek', $commentCountThisWeek)
            ->with('comments', $comments);  // Truyền các bình luận đã phân trang
    }
}
