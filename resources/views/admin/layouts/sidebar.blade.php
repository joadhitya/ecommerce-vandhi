<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{asset('assets/admin/images/icon/Vandhi.png')}}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="" id="dashboard">
                        <a href="home.php"><i class="ti-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li id="master_data">
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-layout-sidebar-left"></i><span>Master Data
                            </span></a>
                        <ul id="data_master" class="collapse">
                            <li><a href="{{route('category')}}">Category</a></li>
                            <li><a href="{{route('subcategory')}}">Subcategory</a></li>
                            <li><a href="{{route('product')}}">Product</a></li>
                            <li><a href="">Size</a></li>
                            <li><a href="coupon_master.php">Coupon</a></li>
                        </ul>
                    </li>
                    <li id="transaction">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-money"></i><span>Transaction
                            </span></a>
                        <ul id="transaction_ul" class="collapse">
                            <li><a href="order_master.php">Order</a></li>
                            <li><a href="">Shipping</a></li>
                            <li><a href="">Invoice</a></li>
                        </ul>
                    </li>
                    <li><a href="customer_master.php"><i class="fa fa-users"></i> <span>Customers</span></a></li>
                    <li><a href="invoice.html"><i class="ti-user"></i> <span>User</span></a></li>
                    <li><a href="invoice.html"><i class="fa fa-inbox"></i> <span>Inbox</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
