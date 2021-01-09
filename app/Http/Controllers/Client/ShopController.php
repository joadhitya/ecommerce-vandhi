<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class ShopController extends Controller
{
    public function index(){
        session_start();
        $products = DB::select('SELECT p.*, c.category_name, sc.subcategory_name
        FROM products p 
        INNER JOIN categories c 
        ON p.id_category = c.id 
        INNER JOIN subcategories sc 
        ON p.id_subcategory = sc.id ');
        $categories = DB::select('SELECT * FROM categories');

        return view('client.shop.shop', ['products' => $products, 'categories' => $categories] );
    }
    
    public function shopCategory(){
        session_start();
        $id = 1;
        $category = Category::findOrFail($id);
        $products = DB::select('SELECT p.*, c.category_name, sc.subcategory_name
        FROM products p 
        INNER JOIN categories c 
        ON p.id_category = c.id 
        INNER JOIN subcategories sc 
        ON p.id_subcategory = sc.id 
        WHERE p.id_category = '.$id.' ');
        return view('client.shop.shop_category', ['category' => $category, 'products' => $products] );
    }
}
