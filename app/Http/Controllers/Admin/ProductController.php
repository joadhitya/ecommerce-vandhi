<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use Illuminate\Support\Facades\DB;
use File;

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
            $html .= '<td>'.$data->id_category.'-'.$data->id_subcategory.'</td>';
            $html .= '<td>Rp. '.number_format($data->product_price).'</td>';
            $html .= '<td>'.$data->product_stock.'</td>';
            $html .= '<td><img class="img-thumbnail" src="/storage/'.$data->product_image.'" style="width:80px!important"/></td>';
            $recomended = 'Not Recomended';
            if($data->product_recomended){
                $recomended = 'Recomended';
            }
            $html .= '<td>'.$recomended.'</td>';
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
        $data = $request->all();

        if($request->file('product_image') != ''){
            $img = $data['product_image'] = $request->file('product_image')->store(
                'assets/product_image', 'public'
            );
        }else{
            $img = 'assets/product_image/default.png';
        }

        $id_product = DB::table('products')->insertGetId([
            'id_category' => $request->id_category, 
            'id_subcategory' => $request->id_subcategory, 
            'product_code' => $request->product_code, 
            'product_name' => $request->product_name, 
            'product_price' => $request->product_price, 
            'product_stock' => $request->product_stock, 
            'product_recomended' => $request->product_recomended, 
            'product_description' => $request->product_description, 
            'product_slug' => $request->product_slug, 
            'product_image' => $img
         ]);


        $response[] = array(
            "id" => $id_product,
            'message' => 'Data Product Berhasil di Tambahkan.'
       );
        echo json_encode($response);
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
        $product = DB::table('products')->where('id', $id)->first();
        $image = $product->product_image;
        $arr_image = explode("/",$image);
        $image_name = $arr_image[2];
        if($image_name !== 'default.png'){
            File::delete('storage/'.$product->product_image);   
        }
        Product::destroy($id); 
        $response[] = array(
            "id" =>$id,
            'message' => 'Data Produk Berhasil di Hapuskan.'
       );
        echo json_encode($response);
    }
}
