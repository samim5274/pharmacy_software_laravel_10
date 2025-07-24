<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/main-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">

    <!-- update qty -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    @include('layouts.sidebar')

    <div class="body-wrapper">
        @include('layouts.topbar')

        <div class="body-wrapper-inner">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">View Purchase Order: {{$reg}}</h4>
                </div>
                @include('message.message')
                <div class="row">
                    @if($cart)
                    <div class="col-lg-12 col-md-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-primary text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Medicine Name</th>
                                        <th>Price per Item (৳)</th>
                                        <th>Quantity</th>
                                        <th>Subtotal (৳)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $key => $val)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $val->medicine->name }}</td>
                                            <td class="text-end">৳{{ number_format($val->purchase_price, 2) }}</td>
                                            <td class="text-center">{{ $val->order_qty }}</td>
                                            <td class="text-end text-success">
                                                ৳{{ number_format($val->purchase_price * $val->order_qty, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                <tbody>
                                    <tr class="table-info">
                                        <td colspan="4" class="text-end fw-semibold">Subtotal:</td>
                                        <td class="text-end">৳{{ number_format($order->total, 2) }}</td>
                                    </tr>
                                    <tr class="table-light">
                                        <td colspan="4" class="text-end fw-semibold">Discount:</td>
                                        <td class="text-end text-danger">-৳{{ number_format($order->discount, 2) }}</td>
                                    </tr>
                                    <tr class="table-light">
                                        <td colspan="4" class="text-end fw-semibold">VAT:</td>
                                        <td class="text-end text-success">+৳{{ number_format($order->vat, 2) }}</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td colspan="4" class="text-end fw-bold">Total Payable:</td>
                                        <td class="text-end fw-bold">৳{{ number_format($order->payable, 2) }}</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td colspan="4" class="text-end fw-semibold">Paid:</td>
                                        <td class="text-end">৳{{ number_format($order->pay, 2) }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td colspan="4" class="text-end fw-semibold">Due:</td>
                                        <td class="text-end">৳{{ number_format($order->due, 2) }}</td>
                                    </tr>
                                </tbody>                                
                            </table>
                        </div>
                    </div>
                    @else
                        <div class="col-12 text-center py-4 text-muted">
                            <i class="mdi mdi-cart-outline display-4 d-block mb-2"></i>
                            <p class="mb-0">No items in your cart.</p>
                        </div>
                    @endif
                    <a href="{{url('/purchase-order-cancel/'.$order->chalan_reg)}}" onclick="return confirm('Are you sure you want to cancel this order?')"><button type="button" class="btn btn-danger w-100"><span id="btnText"><h4 class="m-0">Cancel</h4></span></button></a>
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