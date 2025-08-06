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
                    <div class="mt-5">
                        <!-- Header with Title and Print -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold text-dark">Sale Profit Report by Each Order</h3>
                            <!-- <a href="#" target="_blank" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-print me-1"></i> Print Report
                            </a> -->
                        </div>

                        <div class="card">
                            <div class="card-body">                     
                                <h4 class="mb-3">Cart Items by Reg</h4>
                                @php
                                    $grandProfit = 0;
                                @endphp
                                @foreach($result as $reg => $carts)                                
                                    <div class="card mb-4">
                                        <div class="card-header bg-primary text-white">
                                            <strong>Reg: {{ $reg }}</strong>
                                        </div>
                                        <div class="card-body p-0">
                                            <table class="table table-bordered mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product Name</th>
                                                        <th class="text-center">Qty</th>
                                                        <th class="text-center">Price</th>
                                                        <th class="text-center">Total</th>
                                                        <th class="text-end">Profit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $totalProfit = 0;
                                                    @endphp
                                                    @foreach($carts as $index => $cart)
                                                        @php
                                                            $medicine = $medicines->firstWhere('id', $cart->medicine_id);
                                                            $totalProfit += ($cart->unit_price - $medicine->purchase_price) * $cart->qty;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $medicine->name ?? 'N/A' }}</td>
                                                            <td class="text-center">{{ $cart->qty }}</td>
                                                            <td class="text-center">৳{{ $cart->unit_price }}/-</td>
                                                            <td class="text-center">৳{{ $cart->total_price }}/-</td>
                                                            <td class="text-end">৳{{ ($cart->unit_price - $medicine->purchase_price) * $cart->qty }}/-</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="5" class="text-end"><strong>Total Profit</strong></td>
                                                        <td class="text-end"><strong>৳{{ $totalProfit }}/-</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @php
                                        $grandProfit += $totalProfit;
                                    @endphp
                                @endforeach
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