<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
class HomeController
{
    public function index()
    {
        $product = Product::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count', 'month_name');

        $labels = $product->keys();
        $data = $product->values();
  
        return view('home', compact('labels', 'data'));
    }
}
