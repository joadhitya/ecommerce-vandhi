<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Subcategory;
use App\Product;
use Illuminate\Support\Facades\DB;
use File;

class ProductController extends Controller
{
    
    public function getAllProduct()
    {
        $products = Product::get();
        echo json_encode($products);
    }

    public function getProductById($id){
        $product = DB::select('SELECT p.*, c.category_name, sc.subcategory_name
        FROM products p 
        INNER JOIN categories c 
        ON p.id_category = c.id 
        INNER JOIN subcategories sc 
        ON p.id_subcategory = sc.id 
        WHERE p.id = '.$id.' ');
        return view('client.product.product_detail', ['product' => $product] );
    }
}
