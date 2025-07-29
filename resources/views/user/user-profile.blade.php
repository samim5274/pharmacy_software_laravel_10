<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/main-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
</head>

<body>

  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('layouts.sidebar')
    <div class="body-wrapper">
        @include('layouts.topbar')
        <div class="body-wrapper-inner">
            <div class="container-fluid">
                @include('message.message')
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- <h4 class="m-0">Profile</h4>
                        <h5 class="m-0 text-primary">
                            <a href="{{url('/print/complete/purchase/order')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                        </h5> -->                        
                    </div>
                    <div class="container my-4">
                        <div class="card shadow-lg border-0 rounded-4 position-relative">
                            
                            <a href="{{ url('/change-password') }}" class="btn btn-sm btn-warning position-absolute top-0 end-0 m-3">
                                <i class="fas fa-key me-1"></i> Change Password
                            </a>

                            <div class="row g-0">
                                <!-- Profile Picture -->
                                <div class="col-md-4 text-center bg-light d-flex align-items-center justify-content-center rounded-start">
                                    <img src="{{asset('/img/employee/'.Auth::guard('admin')->user()->photo)}}" alt="User Profile" class="img-fluid rounded-circle p-3" style="width: 250px; height: 250px; object-fit: cover;">
                                </div>

                                <!-- User Details -->
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1">{{Auth::guard('admin')->user()->name}}</h4>
                                        <p class="text-muted mb-2"><i class="fas fa-envelope me-2"></i> {{Auth::guard('admin')->user()->email}}</p>
                                        <p class="text-muted mb-2"><i class="fas fa-phone-alt me-2"></i> +880 {{Auth::guard('admin')->user()->phone}}</p>
                                        <p class="text-muted mb-2"><i class="fas fa-map-marker-alt me-2"></i> {{Auth::guard('admin')->user()->address}}</p>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="text-muted mb-2"><i class="fas fa-id-badge me-2"></i> User ID: #00{{Auth::guard('admin')->user()->id}}</p>
                                                <p class="text-muted mb-2">
                                                    <i class="fas fa-user-tag me-2"></i> Role:
                                                    @php
                                                        $role = Auth::guard('admin')->user()->role;
                                                    @endphp

                                                    @if($role == 1)
                                                        Admin
                                                    @elseif($role == 2)
                                                        Manager
                                                    @elseif($role == 3)
                                                        Account
                                                    @elseif($role == 4)
                                                        Sale
                                                    @else
                                                        Unknown
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-sm-6">
                                                @php
                                                    use Carbon\Carbon;
                                                    $dob = Auth::guard('admin')->user()->dob;
                                                @endphp                                        
                                                <p class="text-muted mb-2"><i class="fas fa-calendar-alt me-2"></i>Date of Birth: {{ $dob ? Carbon::parse($dob)->format('M j, Y') : 'N/A' }}</p>
                                                <p class="text-muted mb-2"><i class="fas fa-user-clock me-2"></i> Joined: Mar 15, 2022</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 d-flex flex-wrap gap-2">
                                            <a href="{{url('/edit-profile/'.Auth::guard('admin')->user()->id)}}"><button class="btn btn-sm btn-primary"><i class="fas fa-edit me-1"></i> Edit Profile</button></a>
                                            <a href="{{ url('/login') }}" class="btn btn-sm btn-outline-danger"><i class="fas fa-sign-out-alt me-1"></i> Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> 
    </div>
</div>

    
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>

</body>
</html>