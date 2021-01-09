<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function registerClient(){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = Hash::make($_POST['password']);

        $is_username = DB::table('customers')->where('username', $username)->first();
        $is_email = DB::table('customers')->where('email', $password)->first();

        if($is_username){
            echo 'username_present';
        }else if($is_email){
            echo 'email_present';
        }else{
            $id_customer = DB::table('customers')->insertGetId([
                'username' => $username, 
                'email' => $email, 
                'password' => $password 
             ]);
            echo 'insert';
        }
    }
    public function loginClient(){
        $username = $_POST['username'];
        $password = Hash::make($_POST['password']);
        
        $customer = DB::table('customers')->where('username', $username)->first();
        if($customer){
            if(Hash::check($_POST['password'],$customer->password)){
                session_start();
                $_SESSION['USER_LOGIN'] = 'yes';
                $_SESSION['USER_ID'] = $customer->id;
                $_SESSION['USER_NAME'] = $customer->username;
                $_SESSION['EMAIL'] = $customer->email;
                echo 'valid';
            }else{
                echo 'wrong';
            }
        }else{
            
            echo 'wrong';
        }       
    }

    public function logoutClient(){
        session_start();
        unset($_SESSION['USER_LOGIN']);
        unset($_SESSION['USER_ID']);    
        unset($_SESSION['USER_NAME']);  
        echo 'logout';
    }
    
    public function profileClient(){
        session_start();
        $id_customer = $_SESSION['USER_ID'];
        $customer = DB::table('customers')->where('id', $id_customer)->first();
        return view('client.auth.profile', ['customer' => $customer]);
    }
    public function updateProfileClient(){
        session_start();
        $id_user = $_SESSION['USER_ID'];
        $password = $_POST['password'];
        $npassword = $_POST['npassword'];   

        $customer = DB::table('customers')->where('id', $id_user)->first();
        if(Hash::check($_POST['password'],$customer->password)){
            $password = Hash::make($_POST['password']);            
            DB::update('UPDATE customers c SET c.password = "'.$password.'" WHERE  c.id = '.$id_user.' '); 
            echo 'valid';
        }else{
            echo 'wrong';
        }

    }
}
