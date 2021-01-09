<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    
    public function order(){
        session_start();
        $products = DB::select('SELECT  `orders`.*,order_status.status_name FROM `orders`,order_status WHERE orders.id_customer = 1  AND order_status.id = `orders`.order_status ');
        
        
        return view('client.order.order', ['products' => $products]);
    }

    public function orderDetails($id){
        
        session_start();
        $header_orders = DB::select('SELECT orders.*,customers.`email`,customers.`username`,order_status.status_name FROM `orders`
        INNER JOIN customers ON orders.`id_customer` = customers.`id` 
        INNER JOIN order_status ON orders.`order_status` = order_status.`id` 
        WHERE orders.id = '.$id.' ');
        
        $detail_orders = DB::select('SELECT DISTINCT(order_details.id),order_details.*, products.`product_code`,
        products.product_name,products.product_image,products.product_description, 
        categories.`category_name`, subcategories.`subcategory_name`
        FROM 
        `order_details`,products,`orders`,`categories`,`subcategories`
        WHERE order_details.id_order = '.$id.' 
        AND order_details.id_product = products.id 
        AND products.`id_category` = categories.`id`
        AND products.`id_subcategory` = subcategories.`id`');
        
        return view('client.order.order_details', ['header_orders' => $header_orders, 'detail_orders' => $detail_orders]);
    }
}
