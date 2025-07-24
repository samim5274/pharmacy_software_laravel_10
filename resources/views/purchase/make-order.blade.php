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
                    <h4 class="m-0">Make Purchase Order</h4>
                </div>
                @include('message.message')
                <div class="row">
                    <!-- Left Side: Product List -->
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="{{ url('/add-to-purchase-cart') }}" method="GET">
                                    <input type="search" name="search" id="search" class="form-control" placeholder="Search by Medicine name or ID">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row g-3 mt-2">
                            @if($cart)
                            @foreach($cart as $key => $val)
                            <div class="col-lg-4 col-md-6">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                            <h5 class="text-primary fw-semibold mb-0">{{ $val->medicine->name }}</h5>
                                            <span class="badge bg-secondary rounded-pill">#{{ $key + 1 }}</span>
                                        </div>

                                        <div class="mb-2">
                                            <small class="text-muted d-block">Price per item:</small>
                                            <span class="fw-bold text-dark" data-price="{{ $val->purchase_price }}">
                                                ৳{{ $val->purchase_price }}
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <small class="text-muted">Quantity:</small>
                                            <div class="input-group input-group-sm" style="width: 120px;">
                                                <button type="button" class="btn btn-outline-secondary btn-minus" data-id="{{ $val->id }}">−</button>
                                                <input type="number" class="form-control text-center qty-input" value="{{ $val->order_qty }}" min="1" name="txtStock" data-id="{{ $val->id }}">
                                                <button type="button" class="btn btn-outline-secondary btn-plus" data-id="{{ $val->id }}">+</button>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Subtotal:</small>
                                            <span class="fw-semibold text-success item-subtotal">
                                                ৳{{ $val->purchase_price * $val->order_qty }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end bg-white border-0">
                                        <a href="{{ url('/remove-to-purchase-cart/'.$val->medicine_id.'/'.$val->chalan_reg) }}" class="btn btn-sm btn-outline-danger">Remove</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <div class="col-12 text-center py-4 text-muted">
                                    <i class="mdi mdi-cart-outline display-4 d-block mb-2"></i>
                                    <p class="mb-0">No items in your cart.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-body p-3 p-md-4">
                                <form action="{{url('/confirm-purchase-order')}}" method="POST" id="myForm">
                                    @csrf

                                    <input type="hidden" id="cart-total-input" name="txtSubTotal">
                                    <input type="text" id="txtReg" hidden value="{{ $reg }}" name="txtReg">

                                    <h5 class="mb-3">CHL-{{ $reg }}</h5>
                                    <p class="mb-1"><strong>Location:</strong> <i class="mdi mdi-map-marker"></i> Uttara, Dhaka-1230</p>
                                    <hr>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Total:</span>
                                        <span>৳<span id="cart-total">00</span>/-</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Shipping Fee:</span>
                                        <span>৳<span id="shipping-fee">0.00</span>/-</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>VAT %:</span>
                                        <span>৳<span id="vat-amount">0.00</span>/-</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Discount:</span>
                                        <span>৳<span id="discount-amount">0.00</span>/-</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-3">
                                        <strong>Subtotal ({{$count}} items)</strong>
                                        <strong>৳<span id="cart-subtotal">00</span>/-</strong>
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
    <script src="{{ asset('assets/js/updatePurchaseOrderQty.js') }}"></script>
    <script src="{{ asset('assets/js/orderPayment.js') }}"></script>

    <script>
        window.onload = function () {
            const searchInput = document.getElementById('search');
            if (searchInput) {
                searchInput.focus();
            }
        };
        @if(session('success'))
            window.onload = function() {
                const reg = "{{ session('reg') }}";
                const printUrl = `{{ url('/specific-purchase-order-print') }}/${reg}`;
                window.open(printUrl, '_blank');
            };
        @endif
    </script>

</body>
</html>