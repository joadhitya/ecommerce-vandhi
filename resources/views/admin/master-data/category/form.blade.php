<div class="section-body" id="form-body-category" style="display: none">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <form class="needs-validation" action="javascript:void(0)" id="form-category" method=""
                    enctype="multipart/form-data" novalidate="">
                    @csrf
                    <input type="hidden" id="id_category" name="id_category" value="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category Code</label>
                                <input type="text" id="category_code" name="category_code" value="" required
                                    class="form-control">

                                <div class="invalid-feedback">
                                    Please Input Category Code
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Category Name </label>
                                <input type="text" id="category_name" name="category_name" value="" required
                                    class="form-control">

                                <div class="invalid-feedback">
                                    Please Input Category Name
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" id="category_description" name="category_description" value=""
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-1" style="display: none" id="save-data-category"
                        onclick="saveDataMaster('category')"> <i class="fa fa-check mr-2"></i>Simpan</button>
                    <button type="submit" class="btn btn-primary mr-1" style="display: none" id="update-data-category"
                        onclick="updateDataMaster('category')"> <i class="fa fa-check mr-2"></i>Update</button>

                </form>
            </div>
        </div>
    </div>
</div>
