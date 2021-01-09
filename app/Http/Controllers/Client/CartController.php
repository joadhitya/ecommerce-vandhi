<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
    public function cart()
    {   
        session_start();
        if(!isset($_SESSION['cart'])){
            $cart_product = [];
        }else{
            $no = 0;
            $total_price = 0;
            $cart_product = array();
            foreach($_SESSION['cart'] as $key=>$val) {
                $products = DB::select('SELECT p.*, c.category_name, sc.subcategory_name
                FROM products p 
                INNER JOIN categories c 
                ON p.id_category = c.id 
                INNER JOIN subcategories sc 
                ON p.id_subcategory = sc.id 
                WHERE p.id = '.$key.' ');
                foreach ($products as $product) {
                    $price = $product->product_price;
                    $qty = $val['qty'];
                    $cart_product[] = array(
                        'product_id' => $key,
                        'product_name' => $product->product_name,
                        'category_name' => $product->category_name,
                        'subcategory_name' => $product->subcategory_name,
                        'product_description' => $product->product_description,
                        'product_price' => $product->product_price,
                        'product_image' => $product->product_image,
                        'product_quantity' => $qty,
                        'total_price_item' => $price * $qty
                    );
                    
                }
            }
        }

        return view('client.cart.cart', ['cart_product' => $cart_product]);
    }
    
    
    public function checkout()
    {   
        session_start();
        $cart_total = 0;
        foreach($_SESSION['cart'] as $key=>$val) {
            $products = DB::select('SELECT p.*, c.category_name, sc.subcategory_name
                FROM products p 
                INNER JOIN categories c 
                ON p.id_category = c.id 
                INNER JOIN subcategories sc 
                ON p.id_subcategory = sc.id 
                WHERE p.id = '.$key.' ');
             foreach ($products as $product) {
                    $price = $product->product_price;
                    $qty = $val['qty'];
                    $cart_product[] = array(
                        'product_id' => $key,
                        'product_name' => $product->product_name,
                        'category_name' => $product->category_name,
                        'subcategory_name' => $product->subcategory_name,
                        'product_description' => $product->product_description,
                        'product_price' => $product->product_price,
                        'product_image' => $product->product_image,
                        'product_quantity' => $qty,
                        'total_price_item' => $price * $qty
                    );                    
                }
        }
            
        return view('client.checkout.checkout', ['cart_product' => $cart_product]);
    }
}
