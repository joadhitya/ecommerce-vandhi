@if (Request::segment(2) == 'category')
<table class="table datatables table-bordered table-hover" id="table-category">
    <thead>
        <tr>
            <th style="width:2%">#</th>
            <th style="width:18%">Category Code</th>
            <th style="width:21%">Category Name</th>
            <th>Description</th>
            <th style="width:12%">Action</th>
        </tr>
    </thead>
    <tbody id="data-category">
        <x-loading :colspan="5" />
    </tbody>
</table>
@elseif (Request::segment(2) == 'subcategory')
<table class="table datatables table-bordered table-hover" id="table-subcategory">
    <thead>
        <tr>
            <th style="width:2%">#</th>
            <th style="width:18%">Subcategory Code</th>
            <th style="width:21%">Subcategory Name</th>
            <th style="width:21%">Category</th>
            <th>Description</th>
            <th style="width:12%">Action</th>
        </tr>
    </thead>
    <tbody id="data-subcategory">
        <x-loading :colspan="6" />
    </tbody>
</table>
@elseif (Request::segment(2) == 'product')
<table class="table datatables table-bordered table-hover" id="table-product">
    <thead>
        <tr>
            <th style="width:2%">#</th>
            <th>Code</th>
            <th>Product Name </th>
            <th>Category - Subcategory</th>
            <th style="width:12%">Price</th>
            <th style="width:9%">Qty</th>
            <th>Image</th>
            <th>Recomended</th>
            <th style="width:12%">Action</th>
        </tr>
    </thead>
    <tbody id="data-product">
        <x-loading :colspan="9" />
    </tbody>
</table>

@endif