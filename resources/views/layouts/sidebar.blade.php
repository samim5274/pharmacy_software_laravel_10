<aside class="left-sidebar bg-light shadow-sm">
    <div class="brand-logo d-flex align-items-center justify-content-between px-3 py-2 border-bottom bg-light">
    <div class="d-flex align-items-center gap-2">
        <!-- Logo (uncomment if needed) -->
        <a href="{{ url('/') }}" class="logo-img d-inline-block">
            <img src="assets/images/logos/main-icon.png" alt="Logo" width="36" height="36" class="img-fluid rounded" />
        </a>       
        <h5 class="mb-0 fw-semibold text-primary">Pharmacy Shop MIS</h5>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="fas fa-times"></i>
    </button>
</div>


    <nav class="sidebar-nav px-3 py-4" style="overflow-y: auto; height: calc(100vh - 70px);">
        <ul id="sidebarnav" class="list-unstyled">

            <!-- Dashboard -->
            <li class="nav-small-cap text-muted mb-2">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </li>
            <li class="sidebar-item mb-2">
                <a href="{{ url('/') }}" class="sidebar-link d-flex align-items-center">
                    <i class="fas fa-gauge-high me-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Product Section -->
            <li class="nav-small-cap text-muted mt-4 mb-2">
                <i class="fas fa-boxes me-2"></i> Product
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center justify-content-between" href="#">
                    <div>
                        <i class="fas fa-box-open me-3"></i>
                        <span>Product</span>
                    </div>
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-4 mt-1">
                    <li><a href="{{ url('/add-product-view') }}"><i class="far fa-dot-circle me-2"></i>Add New</a></li>
                    <li><a href="{{ url('/edit-product-view') }}"><i class="far fa-dot-circle me-2"></i>Edit</a></li>
                </ul>
            </li>

            <!-- Ecommerce Section -->
            <li class="nav-small-cap text-muted mt-4 mb-2">
                <i class="fas fa-shopping-cart me-2"></i> Ecommerce
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center justify-content-between" href="#">
                    <div>
                        <i class="fas fa-shopping-basket me-3"></i>
                        <span>Sale</span>
                    </div>
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-4 mt-1">
                    <li><a href="{{ url('/cart-view') }}"><i class="far fa-dot-circle me-2"></i>Cart / Sale</a></li>
                    <li><a href="{{ url('/order-list') }}"><i class="far fa-dot-circle me-2"></i>Order</a></li>
                    <li><a href="{{ url('/return-list') }}"><i class="far fa-dot-circle me-2"></i>Return</a></li>
                </ul>
            </li>

            <!-- Sale Report Section -->
            <!-- <li class="nav-small-cap text-muted mt-4 mb-2">
                <i class="fas fa-boxes me-2"></i> Sale Report
            </li> -->
            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center justify-content-between" href="#">
                    <div>
                        <i class="fas fa-box-open me-3"></i>
                        <span>Sale Report</span>
                    </div>
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-4 mt-1">
                    <li><a href="{{ url('/sale-report') }}"><i class="far fa-dot-circle me-2"></i>Total Sale</a></li>
                    <li><a href="{{ url('/date-wise-product-sale-report') }}"><i class="far fa-dot-circle me-2"></i>Product Report</a></li>
                    <li><a href="{{ url('/product-sale-report') }}"><i class="far fa-dot-circle me-2"></i>Product Sale</a></li>
                    <li><a href="{{ url('/sale-return-report') }}"><i class="far fa-dot-circle me-2"></i>Sale Return</a></li>
                    <li><a href="{{ url('/user-sale-report') }}"><i class="far fa-dot-circle me-2"></i>User Sale</a></li>
                    <li><a href="{{ url('/sale-profit-report')}}"><i class="far fa-dot-circle me-2"></i>Profit</a></li>
                    <li><a href="{{ url('/sale-profit-report-by-specified-order')}}"><i class="far fa-dot-circle me-2"></i>Specific Profit</a></li>
                </ul>
            </li>

            <!-- Damage Section -->
            <li class="sidebar-item mt-3">
                <a class="sidebar-link d-flex align-items-center justify-content-between" href="#">
                    <div>
                        <i class="fas fa-exclamation-circle me-3"></i>
                        <span>Damage</span>
                    </div>
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-4 mt-1">
                    <li><a href="{{url('/damage-product')}}"><i class="far fa-dot-circle me-2"></i>Damage Item</a></li>
                    <li><a href="{{ url('/expired-list') }}"><i class="far fa-dot-circle me-2"></i>Expire</a></li>
                    <li><a href="{{ url('/expired-list-6-month') }}"><i class="far fa-dot-circle me-2"></i>Expire on 180 Days</a></li>
                </ul>
            </li>

            <!-- Purchase Report Section -->
            <li class="nav-small-cap text-muted mt-4 mb-2">
                <i class="fa-solid fa-cart-plus me-2"></i> Purchase Report
            </li>

             <!-- Purchase Section -->
            <li class="sidebar-item mt-3">
                <a class="sidebar-link d-flex align-items-center justify-content-between" href="#">
                    <div>
                        <i class="fas fa-file-invoice-dollar me-3"></i>
                        <span>Purchase</span>
                    </div>
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-4 mt-1">
                    <li><a href="{{ url('/make-purchase-order') }}"><i class="far fa-dot-circle me-2"></i>Make Order</a></li>
                    <li><a href="{{ url('/purchase-order-list') }}"><i class="far fa-dot-circle me-2"></i>Order List</a></li>
                    <li><a href="{{ url('/complete-purchase-order') }}"><i class="far fa-dot-circle me-2"></i>Complete Order</a></li>
                    <li><a href="{{ url('/payment-list') }}"><i class="far fa-dot-circle me-2"></i>Payment</a></li>
                    <li><a href="{{ url('/purchase-due') }}"><i class="far fa-dot-circle me-2"></i>Due List & Payment</a></li>
                    <li><a href="{{ url('/cancel-purchase-order-list') }}"><i class="far fa-dot-circle me-2"></i>Cancel List</a></li>
                    <li><a href="{{ url('/purchase-return') }}"><i class="far fa-dot-circle me-2"></i>Purchase Return</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center justify-content-between" href="#">
                    <div>
                        <i class="fas fa-box-open me-3"></i>
                        <span>Purchase Report</span>
                    </div>
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-4 mt-1">
                    <li><a href="{{ url('/purchase-report') }}"><i class="far fa-dot-circle me-2"></i>Purchase Total</a></li>
                    <li><a href="{{ url('/purchase-delivery-report') }}"><i class="far fa-dot-circle me-2"></i>Total Delivery</a></li>
                    <li><a href="{{ url('/purchase-payment-report') }}"><i class="far fa-dot-circle me-2"></i>Payment Complete</a></li>
                    <li><a href="{{ url('/purchase-cancel-report') }}"><i class="far fa-dot-circle me-2"></i>Purchase Cancel</a></li>
                    <li><a href="{{ url('/purchase-return-report') }}"><i class="far fa-dot-circle me-2"></i>Purchase Return</a></li>
                    <li><a href="{{ url('/purchase-supplier-report') }}"><i class="far fa-dot-circle me-2"></i>Supplier Report</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center justify-content-between" href="#">
                    <div>
                        <i class="fa-solid fa-layer-group me-3"></i>
                        <span>Stock</span>
                    </div>
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-4 mt-1">
                    <li><a href="{{url('/total-stock')}}"><i class="far fa-dot-circle me-2"></i>Total Stock</a></li>
                    <li><a href="{{url('/category-stock')}}"><i class="far fa-dot-circle me-2"></i>Category Stock</a></li>
                    <li><a href="{{url('/brank-stock')}}"><i class="far fa-dot-circle me-2"></i>Brand Stock</a></li>
                    <li><a href="{{url('/product-stock')}}"><i class="far fa-dot-circle me-2"></i>Product Stock</a></li>
                </ul>
            </li>

            <!-- Expenses Section -->
            <li class="nav-small-cap text-muted mt-4 mb-2">
                <i class="fa-solid fa-suitcase me-3"></i> Expenses Section
            </li>
            <li class="sidebar-item mt-3">
                <a class="sidebar-link d-flex align-items-center" href="{{url('/expenses')}}">
                    <i class="fa-solid fa-comments-dollar me-3"></i>
                    <span>Expenses</span>
                </a>
            </li>
            <li class="sidebar-item mt-3">
                <a class="sidebar-link d-flex align-items-center" href="{{url('/expenses-setting')}}">
                    <i class="fa-solid fa-landmark me-3"></i>
                    <span>Account Setting</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center justify-content-between" href="#">
                    <div>
                        <i class="fa-solid fa-hand-holding-dollar me-3"></i>
                        <span>Expenses Report</span>
                    </div>
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-4 mt-1">
                    <li><a href="{{ url('/expenses-report') }}"><i class="far fa-dot-circle me-2"></i>Total Expenses</a></li>
                    <li><a href="{{ url('/category-expenses-report') }}"><i class="far fa-dot-circle me-2"></i>Category Expenses</a></li>
                    <li><a href="{{ url('/sub-category-expenses-report') }}"><i class="far fa-dot-circle me-2"></i>Sub-category Expenses</a></li>
                    <li><a href="{{ url('/user-expenses-report') }}"><i class="far fa-dot-circle me-2"></i>User Expenses Report</a></li>
                </ul>
            </li>

            <!-- Other Section -->
            <li class="nav-small-cap text-muted mt-4 mb-2">
                <i class="fa-solid fa-suitcase me-3"></i> Other Report
            </li>

            <!-- User & Other -->
            <li class="sidebar-item mt-3">
                <a class="sidebar-link d-flex align-items-center" href="{{url('/profile')}}">
                    <i class="fas fa-user-circle me-3"></i>
                    <span>User Profile</span>
                </a>
            </li>
            <li class="sidebar-item mt-3">
                <a class="sidebar-link d-flex align-items-center" href="{{url('/backup-database')}}">
                    <i class="fa-solid fa-database me-3"></i>
                    <span>Backup DB</span>
                </a>
            </li>
            <li class="sidebar-item mt-2">
                <a class="sidebar-link d-flex align-items-center" href="{{url('/login')}}">
                    <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
