<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $productLatest = Product::orderBy('id', 'desc')->limit(9)->get();
        $products = Product::where('status', 1)->latest()->paginate(10);
        view()->share('products',$products);
        view()->share('productLatest',$productLatest);
    }
}
