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
    

    <!-- Sidebar Start -->
    @include('layouts.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        @include('layouts.topbar')
        <!--  Header End -->
        

        <div class="body-wrapper-inner">
            <div class="container-fluid">
                @include('message.message')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Edit Medicine Details</h4>
                                    </div>
                                </div>                                
                                <div class="mt-4 mx-n6">
                                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th scope="col" class="px-0 text-muted"> Name </th>
                                                <th scope="col" class="px-0 text-muted">Mfg. Date</th>
                                                <th scope="col" class="px-0 text-muted">Exp. Date</th>
                                                <th scope="col" class="px-0 text-muted">Brand</th>
                                                <th scope="col" class="px-0 text-muted">Category</th>
                                                <th scope="col" class="px-0 text-muted">Stock</th>
                                                <th scope="col" class="px-0 text-muted text-end"> Unit Price (৳)</th>
                                                <th scope="col" class="px-0 text-muted text-end"> Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product as $key => $val)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td class="px-0">
                                                    <div class="d-flex align-items-center">
                                                        <!-- <img src="#" class="rounded-circle" width="40" alt="flexy" /> -->
                                                        <div class="ms-3">
                                                            <a href="{{url('/edit-product/'.$val->id)}}"><h6 class="mb-0 fw-bolder">{{$val->name}}</h6></a>
                                                            <span class="text-muted">{{$val->genericName}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-0">{{$val->manufacture_date}}</td>
                                                <td class="px-0">{{$val->expiry_date}}</td>
                                                <td class="px-0">{{$val->brand->name}}</td>
                                                <td class="px-0">{{$val->category->name}}</td>
                                                <td class="px-0">{{$val->stock}}</td>
                                                <td class="px-0 text-dark fw-medium text-end">৳ {{$val->price}}/-</td>
                                                <td class="px-0 text-dark fw-medium text-end">৳ {{$val->stock * $val->price}}/-</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="d-flex justify-content-end mt-3">
                                        {{ $product->links() }}
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
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>
</html>