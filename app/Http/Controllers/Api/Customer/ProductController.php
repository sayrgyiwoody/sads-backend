<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct()
    {
        $product_list = Product::when(request('searchKey'), function ($query, $searchKey) {
            return $query->where('product_name', 'LIKE', '%' . request('searchKey') . '%');
<<<<<<< HEAD
        })->get();
=======
        })->paginate(6)->withQueryString();
>>>>>>> 3b66a04d4cff07c5551308e673ceb5f034e412f1

        return response()->json(
            [
                'status' => 'success',
                'product_list' => $product_list,
            ], 200);
    }


}
