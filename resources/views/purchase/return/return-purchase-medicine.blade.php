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
                    <h4 class="m-0">Medicine Return: {{$reg}}</h4>
                    <h4 class="m-0">Supplier: {{$order->supplier->name}}</h4>
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
                                        <th>Return Qty</th>
                                        <th>Subtotal (৳)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $subtotal = 0; @endphp
                                    @foreach($cart as $key => $val)
                                    @php
                                        $lineTotal = $val->purchase_price * $val->return_qty;
                                        $subtotal += $lineTotal;
                                    @endphp
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $val->medicine->name }}</td>
                                            <td class="text-center">৳{{ number_format($val->purchase_price, 2) }}</td>
                                            <td class="text-center">{{ $val->order_qty }}</td>
                                            <td class="text-center">{{ $val->delivery_qty }}</td>
                                            <td class="text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$val->id}}">{{ $val->return_qty }}</td>
                                            <td class="text-end text-success">৳{{ number_format($val->total_purchase_price, 2) }}</td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                                <tbody>
                                    <tr class="table-info">
                                        <td colspan="6" class="text-end fw-semibold">Subtotal:</td>
                                        <td class="text-end">৳{{ number_format($order->total, 2) }}</td>
                                    </tr>
                                    <tr class="table-light">
                                        <td colspan="6" class="text-end fw-semibold">Discount:</td>
                                        <td class="text-end text-danger">-৳{{ number_format($order->discount, 2) }}</td>
                                    </tr>
                                    <tr class="table-light">
                                        <td colspan="6" class="text-end fw-semibold">VAT:</td>
                                        <td class="text-end text-success">+৳{{ number_format($order->vat, 2) }}</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td colspan="6" class="text-end fw-bold">Total Payable:</td>
                                        <td class="text-end fw-bold">৳{{ number_format($order->payable, 2) }}</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td colspan="6" class="text-end fw-semibold">Paid:</td>
                                        <td class="text-end">৳{{ number_format($order->pay, 2) }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td colspan="6" class="text-end fw-semibold">Due:</td>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-3 p-md-4">
                                <form action="{{url('/purchase-return-payment')}}" method="POST" id="myForm">
                                    @csrf

                                    <input type="hidden" id="cart-total-input" name="txtSubTotal" value="{{$subtotal}}">
                                    <input type="hidden" id="supplierId" name="txtSupplier" value="{{$order->supplier_id}}">
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

                                    <div class="mb-3 row">
                                        <label for="num4" class="col-sm-3 col-form-label">VAT (%)</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="num4" name="txtVAT" value="0" placeholder="VAT" onkeyup="calculateAmount()" onchange="calculateAmount()" min="0" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="num3" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="num3" name="txtDiscount" value="0" placeholder="Discount" onkeyup="calculateAmount()" onchange="calculateAmount()" min="0" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="num2" class="col-sm-3 col-form-label">Pay</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="num2" name="txtPay" placeholder="Pay" onkeyup="calculateAmount()" onchange="calculateAmount()" min="0" required>
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


<!-- Modal -->
@foreach($cart as $key => $val)
<div class="modal fade" id="staticBackdrop{{$val->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/return-qty')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $val->medicine->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border rounded shadow-sm p-3">
                        <div class="row mb-2">
                            <div class="col-6">
                                <p class="mb-1"><strong>Order Qty:</strong></p>
                                <p class="text-primary">{{ $val->order_qty }}</p>
                            </div>
                            <div class="col-6">
                                <p class="mb-1"><strong>Delivery Qty:</strong></p>
                                <p class="text-success">{{ $val->delivery_qty }}</p>
                                <input type="hidden" value="{{ $val->chalan_reg }}" name="txtReg">
                                <input type="hidden" value="{{ $val->medicine_id }}" name="txtMedicineId">
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="returnQty_{{ $val->id }}" class="form-label">Return Quantity</label>
                            <input type="number"
                                class="form-control border-primary"
                                min="0"
                                max="{{ $val->delivery_qty }}"
                                id="returnQty_{{ $val->id }}"
                                name="return_qty"
                                required
                                placeholder="Enter return quantity (Max: {{ $val->delivery_qty }})">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


    
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/orderPayment.js') }}"></script>
    
</body>
</html>