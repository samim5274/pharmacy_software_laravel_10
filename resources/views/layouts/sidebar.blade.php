<aside class="left-sidebar bg-light shadow-sm">
    <div class="brand-logo d-flex align-items-center justify-content-between p-3 border-bottom">
        <a href="{{ url('/') }}" class="text-nowrap logo-img">
            <img src="assets/images/logos/main-icon.png" alt="Logo" width="40" />
        </a>
        <h5 class="m-0">Pharmacy Shop</h5>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="fas fa-times fs-6"></i>
        </div>
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
                    <li><a href="{{ url('/cart-view') }}"><i class="far fa-dot-circle me-2"></i>Cart</a></li>
                    <li><a href="{{ url('/order-list') }}"><i class="far fa-dot-circle me-2"></i>Order</a></li>
                    <li><a href="{{ url('/return-list') }}"><i class="far fa-dot-circle me-2"></i>Return</a></li>
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
                    <li><a href="#"><i class="far fa-dot-circle me-2"></i>Damage Item</a></li>
                    <li><a href="{{ url('/expired-list') }}"><i class="far fa-dot-circle me-2"></i>Expire</a></li>
                    <li><a href="{{ url('/expired-list-6-month') }}"><i class="far fa-dot-circle me-2"></i>Expire on 180 Days</a></li>
                </ul>
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
                    <li><a href="{{ url('/cancel-purchase-order-list') }}"><i class="far fa-dot-circle me-2"></i>Cancel List</a></li>
                    <li><a href="{{ url('/purchase-return') }}"><i class="far fa-dot-circle me-2"></i>Purchase Return</a></li>
                </ul>
            </li>

            <!-- Sale Report Section -->
            <li class="nav-small-cap text-muted mt-4 mb-2">
                <i class="fas fa-boxes me-2"></i> Sale Report
            </li>
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
                    <li><a href="{{ url('/product-sale-report') }}"><i class="far fa-dot-circle me-2"></i>Product Sale</a></li>
                </ul>
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
                <a class="sidebar-link d-flex align-items-center" href="#">
                    <i class="fas fa-calendar-alt me-3"></i>
                    <span>Other</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
