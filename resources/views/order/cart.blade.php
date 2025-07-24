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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row g-3">                       
                                @if($cart)
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-warning">
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Medicine Name</th>
                                                <th class="text-center">Unit Price</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cart as $key => $val)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td><a href="#">{{ $val->medicine->name }}</a></td>
                                                    <td class="text-center">
                                                        <span data-price="{{ $val->price }}">
                                                            ৳{{ $val->unit_price }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">{{ $val->qty }}</td>
                                                    <td class="text-center">
                                                        <strong>
                                                            <span class="item-subtotal">৳{{$val->unit_price * $val->qty}}</span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="col-12 text-center py-4 text-muted">
                                    <i class="mdi mdi-cart-outline display-4 d-block mb-2"></i>
                                    <p class="mb-0">No items in your cart.</p>
                                </div>
                                @endif
                                <div class="row resultData" id="content"></div>                        
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-2">
                            <div class="card mt-2">
                                <div class="card-body p-2 p-md-4">
                                    <form action="{{url('/order-return-confirm/'.$order[0]->reg)}}" method="GET" id="myForm">
                                        @csrf
                                        <div class="card-body p-3 p-md-4">
                                            <input type="hidden" id="cart-total-input" name="txtSubTotal" 
                                                value="{{ $cart->sum(fn($i) => $i->unit_price * $i->qty) }}">
                                            <input type="text" class="form-control mb-2" hidden value="{{ $reg }}" name="txtReg">
                                            <h4>ORD-{{ $reg }}</h4>
                                            <hr>
                                            <h4>Location</h4>
                                            <p><i class="mdi mdi-map-marker"></i> Uttara, Dhaka-1230</p>
                                            <hr>
                                            
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <p class="m-0">Total</p>
                                                <h5 class="card-title m-0">৳<span id="cart-total">{{ number_format($cart->sum(fn($i) => $i->unit_price * $i->qty), 0) }}</span>/-</h5>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="m-0">Shipping Fee</h5>
                                                <h5 class="card-title m-0">৳<span id="shipping-fee">0.00</span>/-</h5>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="m-0">VAT (৳)</h5>
                                                <h5 class="card-title m-0">৳<span id="vat-amount">{{$order[0]->vat}}</span>/-</h5>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="m-0">Discount</h5>
                                                <h5 class="card-title m-0">৳<span id="discount-amount">{{$order[0]->discount}}</span>/-</h5>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="m-0">Subtotal ({{ $count }} items)</h5>
                                                <h5 class="card-title m-0">৳<span id="cart-subtotal">{{ number_format($cart->sum(fn($i) => $i->unit_price * $i->qty), 0) }}</span>/-</h5>
                                            </div><hr>
                                            @if($order[0]->status == 2 || $order[0]->status == 3)
                                                <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Are you sure you want to RETURN this bill?')">Return</button>
                                            @else
                                            <span class="small">Order Already Returned.</span>
                                            @endif
                                        </div>
                                    </form> 
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