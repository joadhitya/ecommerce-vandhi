<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        return view('admin.management-transaction.reports.reports');
    }

    public function getReportByType($type){
        switch($type){
            case 'PENJUALAN':
                echo $type;
                break;
            case 'CUSTOMER':
                $customers =   DB::select('SELECT c.*, (SELECT COUNT(o.`id`) FROM orders o WHERE o.`id_customer` = c.id) AS count_transaction 
                ,(SELECT SUM(od.PRICE) 
                FROM `order_details` od
                INNER JOIN orders o ON od.`id_order` = o.`id`
                INNER JOIN customers c ON o.`id_customer` = c.`id`
                WHERE o.`id_customer` = c.`id`) AS total_transaction 
                 FROM customers c
                INNER JOIN orders o ON c.id = o.`id_customer`');   
                $month = date("m");  
                $monthLabel = date("M");  
                $year = date("Y");  
                $count_month_customers =   DB::select('SELECT COUNT(id) AS count_customers 
                FROM customers  WHERE YEAR(created_at) = '.$year.' AND MONTH(created_at) = '.$month.' ');   
              
                $count =   $count_month_customers[0]->count_customers;
                $html = '';
                $no = 1;
                $html .= '
                    <h5 style="text-align:center">Report Customer Vandhi E-Commerce</h5>
                    <div style="display:flex; justify-content:space-between">
                        <p>
                            Pelanggan Baru Bulan Ini : '.$count.' Customers
                        </p>
                        <p>
                            Periode : '.$monthLabel.' '.$year.'
                        </p>
                    </div>
                ';
                $html .= '<table class="table table-responsive table-bordered table-hover mt-3" style="display:table" id="table-report-customer">
                    <th style="width:5%">No</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Joined At</th>
                    <th style="width:15%">Jumlah Transaksi</th>
                    <th style="text-align:right">Total Transaksi</th>
                    <th style="width:5%">Status</th>
                ';
                foreach($customers as $data){
                    $html .= '<tr>';
                    $html .= '<td>'.$no++.'</td>';
                    $html .= '<td>'.$data->username.'</td>';
                    $html .= '<td>'.$data->name.'</td>';
                    $html .= '<td>'.$data->created_at.'</td>';
                    $html .= '<td>'.$data->count_transaction.' kali</td>';
                    $html .= '<td style="text-align:right">Rp. '.number_format($data->total_transaction).'</td>';
                    $html .= '<td>Active</td>';
                    $html .= '</tr>';
                    }
                
                if($html == ''){
                    $html .= '<tr ><td class="text-center" colspan="6"><h6 class="mt-2">Tidak terdapat data kategori</h6></td></tr>';
                }

                $html .= '</table>';
                echo $html;
                break;
            case 'PRODUCT':
                echo $type;
                break;
            default:
                break;
        }
    }
}
