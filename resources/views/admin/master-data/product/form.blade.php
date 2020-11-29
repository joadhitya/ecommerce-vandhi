<div class="section-body" id="form-body-product" style="display: none">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
               
                <form class="needs-validation" id="form-product" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="">Product Code</label>
                            <input type="text" class="form-control" id="product_code" name="product_code"
                                placeholder="Product Code" value="" required>

                            <div class="invalid-feedback">
                                Please Input Product Code
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name"
                                placeholder="Product Name" value="" required>

                            <div class="invalid-feedback">
                                Please Input Product Name
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">Category Type</label>
                            <select class="form-control" name="id_category" required id="id_category"
                                onchange="get_sub_cat('subcategory')">
                                <option value="">Select Category</option>                               
                            </select>
                            <div class="invalid-feedback">
                                Please Input Category Type
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">Sub Category Type</label>
                            <select class="form-control" name="id_subcategory" required id="id_subcategory">
                                <option value="">Select Sub Category</option>
                            </select>
                            <div class="invalid-feedback">
                                Please Input Sub Category
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="">Product Price</label>
                            <input type="text" class="form-control" id="product_price" name="product_price"
                                placeholder="Product Price" value="" required >

                            <div class="invalid-feedback">
                                Please Input Product Price
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">Quanitity</label>
                            <input type="text" class="form-control" id="product_quantity" name="product_quantity"
                                placeholder="Product Quantity" value="" required>

                            <div class="invalid-feedback">
                                Please Input Product Quantity
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">Recomended</label>
                            <select class="form-control" name="product_recomended" required id="product_recomended">
                                <option value="">Choose Selection</option>
                            </select>
                            <div class="invalid-feedback">
                                Please Input Reomended Type
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="">Short Description</label>
                            <input class="form-control" name="product_short_description" value="" required
                                id="product_short_description" />
                            <div class="invalid-feedback">
                                Please Input Short Description
                            </div>
                        </div>

                    </div>
                    <hr>
                    <label style="font-weight:bold" for="">Meta Data for SEO</label>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                placeholder="Meta Title Product" value="">

                            <div class="invalid-feedback">
                                Please Input Meta Title Product
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Meta Keyword</label>
                            <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                placeholder="Meta Keyword Product" value="">

                            <div class="invalid-feedback">
                                Please Input Meta Title Keyword
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Meta Description</label>
                            <input type="text" class="form-control" id="meta_desc" name="meta_desc"
                                placeholder="Meta Description Product" value=""  >

                            <div class="invalid-feedback">
                                Please Input Meta Description
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-5 mb-3">
                            <label for="">Description</label>
                            <textarea style="height:335px" type="text" class="form-control" id="description"
                                name="description" value="" id
                                placeholder="Description Category"></textarea>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="">Image</label>
                            <div class="input-group mb-3">
                            <input onChange="get_image()" type="file" name="image" class="form-control"  >
                            </div>
                                <div>
                                    <img src="" alt="">
                                </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">Status</label>
                            <input readonly style="border-color: #28a745;background-color:transparent" type="text"
                                class="form-control" id placeholder="Active">
                        </div>
                    </div>
                    <button id="submit_product" name="submit" type="submit" class="btn btn-primary"><i
                            class="ti-check mr-2"></i> Submit
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
