<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
