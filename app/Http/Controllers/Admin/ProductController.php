<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Category;
use App\Subcategory;
use App\Product;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        $subcategories = Subcategory::get();
        return view('admin.master-data.product.index', ['categories' => $categories,'subcategories' => $subcategories]);
    }
    
    public function create()
    {
        //
    }
    public function display()
    {
        $products = Product::get();
        $html = '';
        $no = 1;
        foreach($products as $data){
            $html .= '<tr>';
            $html .= '<td>'.$no++.'</td>';
            $html .= '<td>'.$data->product_code.'</td>';
            $html .= '<td>'.$data->product_name.'</td>';
            $html .= '<td>'.$data->product_name.'</td>';
            $html .= '<td>'.$data->product_description.'</td>';
            $html .= '<td>
                            <button type="button" onclick="editForm(\'product\','.$data->id.',\'Y\')" class="btn mx-1 btn-xs btn-outline-warning"><span class="fa fa-edit"></span></button>
                            <button type="button" onclick="deleteData(\'product\','.$data->id.')" class="btn mx-1 btn-xs btn-outline-danger"><span class="fa fa-trash"></span></button>
                        </td>';
            $html .= '</tr>';
            }
        
        if($html == ''){
            $html .= '<tr ><td class="text-center" colspan="9"><h6 class="mt-2">Tidak terdapat data Produk</h6></td></tr>';
         }
         echo $html;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
