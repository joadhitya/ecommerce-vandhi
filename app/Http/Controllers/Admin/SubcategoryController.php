<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Subcategory;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function index()
    {   
        $categories = Category::get();
        return view('admin.master-data.subcategory.index', ['categories' => $categories]);
    }
    public function create()
    {
        //
    }

    public function display()
    {
        $subcategories = Subcategory::get();
        $html = '';
        $no = 1;
        foreach($subcategories as $data){
            $html .= '<tr>';
            $html .= '<td>'.$no++.'</td>';
            $html .= '<td>'.$data->subcategory_code.'</td>';
            $html .= '<td>'.$data->subcategory_name.'</td>';
            $html .= '<td>'.$data->subcategory_name.'</td>';
            $html .= '<td>'.$data->subcategory_description.'</td>';
            $html .= '<td>
                            <button type="button" onclick="editForm(\'subcategory\','.$data->id.',\'Y\')" class="btn mx-1 btn-xs btn-outline-warning"><span class="fa fa-edit"></span></button>
                            <button type="button" onclick="deleteData(\'subcategory\','.$data->id.')" class="btn mx-1 btn-xs btn-outline-danger"><span class="fa fa-trash"></span></button>
                        </td>';
            $html .= '</tr>';
            }
        
        if($html == ''){
            $html .= '<tr ><td class="text-center" colspan="6"><h6 class="mt-2">Tidak terdapat data Subkategori</h6></td></tr>';
         }
         echo $html;
    }

    public function store(Request $request)
    {
        // $this->_validation($request);
        Subcategory::create($request->all());
        $response[] = array(
            "id" =>'',
            'message' => 'Data Sub Kategori Berhasil di Tambahkan.'
       );
        echo json_encode($response);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $response[] = array(
            "id"=>$subcategory->id,
            "subcategory_code"=>$subcategory->subcategory_code,
            "subcategory_name"=>$subcategory->subcategory_name,
            "id_category"=>$subcategory->id_category,
            "subcategory_description"=>$subcategory->subcategory_description,
       );
       echo json_encode($response);  
    }
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());
        $response[] = array(
            "id" =>$id,
            'message' => 'Data Sub Kategori Berhasil di Perbaharui.'
       );
        echo json_encode($response);
    }
    public function destroy($id)
    {
        Subcategory::destroy($id);    
        $response[] = array(
            "id" =>$id,
            'message' => 'Data Sub Kategori Berhasil di Hapuskan.'
       );
        echo json_encode($response);
    }
    
    public function getDataSubCategoryByCategory($id){
        $subcategory = DB::table('subcategories')
        ->where('id_category', $id)
        ->get();        
        echo json_encode($subcategory);
    }
}
