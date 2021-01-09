<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class OrderController extends Controller
{
    public function index()
    {
        $transactions = DB::select('SELECT  `orders`.*,order_status.STATUS_NAME AS STATUS_NAME 
        FROM `orders`,order_status WHERE order_status.id = `orders`.order_status');
        return view('admin.management-transaction.orders.index',['transactions' => $transactions]);
    }
    
    public function order_details($id){
        
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

        $status =  DB::select('SELECT * FROM order_status');
        return view('admin.management-transaction.orders.order_details',['header_orders' => $header_orders, 'detail_orders' => $detail_orders, 'status' => $status]);
    }

    public function update_status($id){
        $changeStatus = $_POST['statusValue'];

        $detail_orders =  DB::select('SELECT * FROM order_details WHERE id_order = '.$id.' ');
        // Checking Stock Available
        foreach($detail_orders as $data){
            // GET PRODUCT
            $product = Product::first($data->id_product);
            $product_stock = $product->product_stock;
            $product_buy = $data->quantity;
            $new_stock = $product_stock - $product_buy;
            if($new_stock < 0){
                echo 'Stock Tidak Mencukupi';
                return;
            }
        }

        foreach($detail_orders as $data_order){
            $product = Product::first($data->id_product);
            $product_stock = $product->product_stock;
            $product_buy = $data->quantity;
            $new_stock = $product_stock - $product_buy;
            DB::update('UPDATE products SET product_stock = '.$new_stock.' WHERE id = '.$data->id_product.' ');
        }
        
        $update = DB::update('UPDATE orders SET order_status = '.$changeStatus.' WHERE orders.id = '.$id.' ');
        if($update){
            echo 'Berhasil';
            return;
        }
    }
}
