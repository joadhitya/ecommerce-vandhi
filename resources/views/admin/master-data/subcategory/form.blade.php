<div class="section-body" id="form-body-subcategory" style="display: none">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <form action="javascript:void(0)" id="form-subcategory" method="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id_subcategory" name="id_subcategory" value="">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Subcategory Code</label>
                                    <input type="text" id="subcategory_code" name="subcategory_code" value=""
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Category </label>
                                    <select class="form-control" style="height: 45px" name="id_category" id="id_category">
                                        <option value="">--Select Category--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Subcategory Name </label>
                                    <input type="text" id="subcategory_name" name="subcategory_name" value=""
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" id="subcategory_description" name="subcategory_description" value=""
                                        class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-1" style="display: none"
                            id="save-data-subcategory" onclick="saveDataMaster('subcategory')"> <i
                                class="fa fa-check mr-2"></i>Simpan</button>
                        <button type="submit" class="btn btn-primary mr-1" style="display: none"
                            id="update-data-subcategory" onclick="updateDataMaster('subcategory')"> <i
                                class="fa fa-check mr-2"></i>Update</button>

                </form>
            </div>
        </div>
    </div>
</div>
