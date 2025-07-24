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
                <div class="container mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="m-0">Medicine Expired List on 180 days.</h4>
                        <h5 class="m-0 text-primary">
                            <a href="{{url('/print-expired-list-6-month')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                        </h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped text-center" id="printableTable">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Generic</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Mfg. Date</th>
                                    <th>Exp. Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalValue = 0; $totalStock = 0; @endphp
                                @foreach($product as $key => $val)
                                    @php 
                                        $rowTotal = $val->price * $val->stock;
                                        $totalValue += $rowTotal;
                                        $totalStock += $val->stock;
                                    @endphp
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-start">{{ $val->name }}</td>
                                        <td class="text-start">{{ $val->genericName }}</td>
                                        <td>{{ $val->brand->name ?? '-' }}</td>
                                        <td>{{ $val->category->name ?? '-' }}</td>
                                        <td>৳ {{ number_format($val->price, 0) }}/-</td>
                                        <td>{{ $val->stock }}</td>
                                        <td>৳ {{ number_format($rowTotal, 0) }}/-</td>
                                        <td>{{ $val->manufacture_date }}</td>
                                        <td>{{ $val->expiry_date }}</td>
                                    </tr>
                                @endforeach
                                <tr class="table-info fw-bold">
                                    <td colspan="5" class="text-center">Total:</td>
                                    <td>৳ {{ number_format($total, 0) }}/-</td>
                                    <td>{{ $totalStock }}</td>
                                    <td>৳ {{ number_format($totalValue, 0) }}/-</td>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <div class="d-flex justify-content-end mt-3">
                            {{$product->links()}}
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