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
                                        <th class="text-start">Medicine Name</th>
                                        <th>Unit Price (৳)</th>
                                        <th>Order Qty</th>
                                        <th>Delivery Qty</th>
                                        <th>Subtotal (৳)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $subtotal = 0; @endphp
                                    @foreach($cart as $key => $val)
                                    @php
                                        $lineTotal = $val->purchase_price * $val->delivery_qty;
                                        $subtotal += $lineTotal;
                                    @endphp
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $val->medicine->name }}</td>
                                            <td class="text-center">৳{{ number_format($val->purchase_price, 2) }}</td>
                                            <td class="text-center">{{ $val->order_qty }}</td>
                                            <td class="text-center">{{ $val->delivery_qty }}</td>
                                            <td class="text-end text-success">৳{{ number_format($val->purchase_price * $val->delivery_qty, 2) }}</td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                                <tbody>
                                    <tr class="table-info">
                                        <td colspan="5" class="text-end fw-semibold">Subtotal:</td>
                                        <td class="text-end">৳{{ number_format($order->total, 2) }}</td>
                                    </tr>
                                    <tr class="table-light">
                                        <td colspan="5" class="text-end fw-semibold">Discount:</td>
                                        <td class="text-end text-danger">-৳{{ number_format($order->discount, 2) }}</td>
                                    </tr>
                                    <tr class="table-light">
                                        <td colspan="5" class="text-end fw-semibold">VAT:</td>
                                        <td class="text-end text-success">+৳{{ number_format($order->vat, 2) }}</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td colspan="5" class="text-end fw-bold">Total Payable:</td>
                                        <td class="text-end fw-bold">৳{{ number_format($order->payable, 2) }}</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td colspan="5" class="text-end fw-semibold">Paid:</td>
                                        <td class="text-end">৳{{ number_format($order->pay, 2) }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td colspan="5" class="text-end fw-semibold">Due:</td>
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
                    @if($order->status != 4)
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-3 p-md-4">
                                <form action="{{url('/purchase-pay')}}" method="POST" id="myForm">
                                    @csrf

                                    <input type="hidden" id="cart-total-input" name="txtSubTotal" value="{{$subtotal}}">
                                    <input type="text" id="txtReg" hidden value="{{ $reg }}" name="txtReg">

                                    <h5 class="mb-3">CHL-{{ $reg }}</h5>
                                    <p class="mb-1"><strong>Location:</strong> <i class="mdi mdi-map-marker"></i> Uttara, Dhaka-1230</p>
                                    <hr>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Total:</span>
                                        <span>৳<span id="cart-total">{{ number_format($subtotal, 2) }}</span>/-</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Shipping Fee:</span>
                                        <span>৳<span id="shipping-fee">00.00</span>/-</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>VAT %:</span>
                                        <span>৳<span id="vat-amount">{{ number_format($order->vat, 2) }}</span>/-</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Discount:</span>
                                        <span>৳<span id="discount-amount">{{ number_format($order->discount, 2) }}</span>/-</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-3">
                                        <strong>Subtotal ({{$count}} items)</strong>
                                        <strong>৳<span id="cart-subtotal">{{ number_format($subtotal, 2) }}</span>/-</strong>
                                    </div>

                                    <!-- VAT Input -->
                                    <div class="mb-3 row">
                                        <label for="num4" class="col-sm-3 col-form-label">VAT (%)</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="num4" name="txtVAT" value="0" placeholder="VAT" onkeyup="calculateAmount()" onchange="calculateAmount()" min="0">
                                        </div>
                                    </div>

                                    <!-- Discount Input -->
                                    <div class="mb-3 row">
                                        <label for="num3" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="num3" name="txtDiscount" value="0" placeholder="Discount" onkeyup="calculateAmount()" onchange="calculateAmount()" min="0">
                                        </div>
                                    </div>

                                    <!-- Pay Input -->
                                    <div class="mb-3 row">
                                        <label for="num2" class="col-sm-3 col-form-label">Pay</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="num2" name="txtPay" placeholder="Pay" onkeyup="calculateAmount()" onchange="calculateAmount()" min="0">
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="text-end mb-3">
                                        <p id="result" class="display-6 text-danger">Amount: 00/-</p>
                                    </div>

                                    <button type="submit" id="confirmBtn" class="btn btn-outline-success w-100">
                                        <span id="btnText">
                                            <h4 class="m-0">Confirm</h4>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
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
    <script src="{{ asset('assets/js/orderPayment.js') }}"></script>

    <script>
        @if(session('success'))
            window.onload = function() {
                const reg = "{{ session('reg') }}";
                const printUrl = `{{ url('/print-specific-purchase-pay-order') }}/${reg}`;
                window.open(printUrl, '_blank');
            };
        @endif
    </script>
</body>
</html>