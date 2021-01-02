<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use Illuminate\Support\Facades\DB;
use File;

class HomeController extends Controller
{
    public function index()
    {        
        session_start();
        // $products = Product::get();
        $best_products = DB::select('SELECT p.*, c.category_name, sc.subcategory_name
        FROM products p 
        INNER JOIN categories c 
        ON p.id_category = c.id 
        INNER JOIN subcategories sc 
        ON p.id_subcategory = sc.id 
        LIMIT 3');

        $products = DB::select('SELECT p.*, c.category_name, sc.subcategory_name
        FROM products p 
        INNER JOIN categories c 
        ON p.id_category = c.id 
        INNER JOIN subcategories sc 
        ON p.id_subcategory = sc.id ORDER BY p.id DESC');
        
        return view('client.home.index', ['best_products' => $best_products, 'products' => $products] );
    }
}
