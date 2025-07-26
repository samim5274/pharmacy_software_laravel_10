<!--  App Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex align-items-center gap-2 text-decoration-none" href="#">
            <img src="{{ asset('assets/images/logos/main-icon.png') }}" alt="Logo" width="40">
            <h4 class="mb-0 text-light">Abid Pharmacy Ltd.</h4>
        </a>
      </div>
    </div>
    
<aside class="left-sidebar">
      <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="{{url('/')}}" class="text-nowrap logo-img">
                    <img src="assets/images/logos/main-icon.png" alt="" width="40"/>
                </a>
                <h4>Pharmacy Shop</h4>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-6"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{url('/')}}" aria-expanded="false">
                            <i class="fa-solid fa-gauge-high"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Dashboard -->
                    <!-- ---------------------------------- -->
                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"  
                            href="#" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-aperture"></i>
                            </span>
                            <span class="hide-menu">Analytical</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"  
                            href="#" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-shopping-cart"></i>
                            </span>
                            <span class="hide-menu">eCommerce</span>
                            </div>
                            
                        </a>
                    </li> -->
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="fa-solid fa-chart-simple"></i>
                            </span>
                                <span class="hide-menu">Product</span>
                            </div>
                            
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/add-product-view')}}">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Add New</span>
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/edit-product-view')}}">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Edit</span>
                                    </div>
                                    
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <span class="sidebar-divider lg"></span>
                    </li>
                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                        <span class="hide-menu">Ecommerce</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                                <span class="d-flex">
                                    <i class="ti ti-basket"></i>
                                </span>
                                <span class="hide-menu">Sale</span>
                            </div>
                            
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/cart-view')}}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Cart</span>
                                    </div>                                    
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/order-list')}}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Order</span>
                                    </div>                                    
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/return-list')}}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Return</span>
                                    </div>                                    
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-chart-donut-3"></i>
                            </span>
                            <span class="hide-menu">Damage</span>
                            </div>
                            
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="#">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Damage Item</span>
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/expired-list')}}">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Expire</span>
                                    </div>                                
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/expired-list-6-month')}}">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Expire on 180 Days</span>
                                    </div>                                
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-chart-donut-3"></i>
                            </span>
                            <span class="hide-menu">Purchase</span>
                            </div>
                            
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/make-purchase-order')}}">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Make Order</span>
                                    </div>                                    
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/purchase-order-list')}}">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Order List</span>
                                    </div>                                    
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/complete-purchase-order')}}">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Complete Order</span>
                                    </div>                                    
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between"  
                                    href="{{url('/payment-list')}}">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Payment</span>
                                    </div>                                    
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"  
                            href="#"
                            aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-user-circle"></i>
                            </span>
                            <span class="hide-menu">User Profile</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"  
                            href="#" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-calendar"></i>
                            </span>
                            <span class="hide-menu">Other</span>
                            </div>
                            
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>