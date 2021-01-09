<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class add_to_cart{
    function addProduct($pid,$qty){
        $_SESSION['cart'][$pid]['qty']=$qty;
    }

    function updateProduct($pid,$qty){
        if(isset($_SESSION['cart'][$pid])){
            $_SESSION['cart'][$pid]['qty'] = $qty;                
        }
    }

    function removeProduct($pid){            
        if(isset($_SESSION['cart'][$pid])){
            unset($_SESSION['cart'][$pid]);            
        }
    }

    function emptyProduct(){
        unset($_SESSION['cart']);
    }

    function totalProduct(){
        if(isset($_SESSION['cart'])){
            return count($_SESSION['cart']);      
        }
        else{
            return 0;
        }
    }
}

function sentInvoice($order_id){
    return $order_id;
}

class TransactionController extends Controller
{
    
    public function manageCart(){
        session_start();
        $pid = $_POST['pid'];   
        $qty = $_POST['qty'];   
        if($qty == 'undefined'){
            $qty =1;
        }
        if($qty == 'undefined'){
            $qty =1;
        }
        $type = $_POST['type'];

        $obj= new add_to_cart();

        if($type=='add'){
            $obj->addProduct($pid,$qty);
        }
        
        if($type=='update'){
            $obj->updateProduct($pid,$qty);
        }
        
        if($type=='remove'){
            $obj->removeProduct($pid,$qty);
        }
        
        // // if($type='del'){
        // //     $obj->emptyProduct();
        // // }

        echo $obj->totalProduct();

    }
    

    public function checkout(Request $request){
        session_start();
        $cart_total = 0;
        $num = '1';
        $t_rand = rand(1111,9999);
        $fm_y = date_create(date('Y-m-d'));
        $year = date_format($fm_y,"Y");  
        $month = date_format($fm_y,"m");  
        $transaction_code = $t_rand.$num.$year.$month;
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
                    $cart_total = $cart_total+($price*$qty);
                }
        }
        $address = $_POST['address'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];
        // $raja_payment = $_POST['raja_payment'];
        $type_payment = $_POST['type_payment'];
        $id_customer = 1;
        $total_price = $cart_total;
        $payment_status='pending';
        if($type_payment=='cod'){
            $payment_status='success';
        }
        $order_status='1';    
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);        
        if($request->file('transfer_photo') != ''){
            $image = $data['transfer_photo'] = $request->file('transfer_photo')->store(
                    'assets/transfer_photo', 'public'
                );
        }else{
            $image = 'assets/transfer_photo/not_transfer.png';
        }
        // QUERY INSERT ORDERS
        $id_transaction = DB::table('orders')->insertGetId([
            'transaction_code' => $transaction_code, 
            'id_customer' => $id_customer, 
            'address' => $address, 
            'province' => $province, 
            'city' => $city, 
            'zip_code' => $zip_code, 
            'type_payment' => $type_payment, 
            'total_price' => $total_price, 
            'payment_status' => $payment_status, 
            'order_status' => $order_status,
            'weight' => 1,
            'transfer_photo' => $image,
            'txnid' => $txnid
         ]);

        // QUERY INSERT ORDERS DETAIL
        foreach($_SESSION['cart'] as $key=>$val) {
            $products = DB::select('SELECT p.*, c.category_name, sc.subcategory_name
                FROM products p 
                INNER JOIN categories c 
                ON p.id_category = c.id 
                INNER JOIN subcategories sc 
                ON p.id_subcategory = sc.id 
                WHERE p.id = '.$key.' ');
                
             foreach ($products as $product) {
                    $pid = $product->id;
                    $price = $product->product_price;
                    $qty = $val['qty'];
                    $price_product = $price*$qty;
                    DB::table('order_details')->insert([
                        'id_order' => $id_transaction, 
                        'id_product' => $pid, 
                        'quantity' => $qty, 
                        'price' => $price_product
                     ]);
                }
        }

        $sentInvoice = sentInvoice($id_transaction);

        echo $sentInvoice;

        unset($_SESSION['cart']);



    }


}
