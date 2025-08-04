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
                        <h4 class="m-0">Purchase Due Payment</h4>
                        <h5 class="m-0 text-primary">
                            <a href="{{url('/print/purchase/due/list')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                        </h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped " id="printableTable">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Reg</th>
                                    <th>Total (৳)</th>
                                    <th>Discount (৳)</th>
                                    <th>VAT % (৳)</th>
                                    <th>Payable (৳)</th>
                                    <th>Pay (৳)</th>
                                    <th>Due (৳)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{$val->order_date}}</td>
                                    <td>{{$val->supplier->name}}</td>
                                    <td><a href="{{ url('/view-purchase-order/'.$val->chalan_reg) }}">CHL-{{$val->chalan_reg}}</a></td>
                                    <td>৳{{$val->total}}/-</td>
                                    <td>৳{{$val->discount}}/-</td>
                                    <td>৳{{$val->vat}}/-</td>
                                    <td>৳{{$val->payable}}/-</td>
                                    <td>৳{{$val->pay}}/-</td>
                                    <td>৳{{$val->due}}/-</td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column align-items-center gap-1">
                                            <div class="d-flex justify-content-center gap-2 mt-1">
                                                <a href="{{ url('/specific-purchase-order-print/'.$val->chalan_reg) }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-print"></i></a>
                                                <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$val->id}}"><i class="fa-solid fa-sack-dollar"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="table-info">
                                    <td colspan="4">Total:</td>
                                    <td>৳{{$total}}/-</td>
                                    <td>৳{{$discount}}/-</td>
                                    <td>৳{{$vat}}/-</td>
                                    <td>৳{{$payable}}/-</td>
                                    <td>৳{{$pay}}/-</td>
                                    <td>৳{{$due}}/-</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="d-flex justify-content-end mt-3">
                            {{$order->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

@foreach($order as $key => $val)
<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$val->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
        <form action="{{url('/purchase-due-payment')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-light" id="staticBackdropLabel">Due Collection: CHL-{{$val->chalan_reg}}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12 text-center">
                            <h4 class="fw-bold mb-1">{{ $val->supplier->name }}</h4>
                        </div>

                        <div class="col-12">
                            <div class="row row-cols-1 row-cols-sm-2 g-2">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted">Total</div>
                                        <div class="fw-semibold">৳{{ number_format($total, 2) }}/-</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted">Discount</div>
                                        <div class="fw-semibold">৳{{ number_format($discount, 2) }}/-</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted">VAT</div>
                                        <div class="fw-semibold">৳{{ number_format($vat, 2) }}/-</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted">Payable</div>
                                        <div class="fw-semibold">৳{{ number_format($payable, 2) }}/-</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted">Paid</div>
                                        <div class="fw-semibold">৳{{ number_format($pay, 2) }}/-</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted">Due</div>
                                        <div class="fw-semibold"><h2>৳{{ number_format($val->due, 2) }}/-</h2></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="dueAmount" class="form-label">Collection Amount <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="hidden" value="{{$val->chalan_reg}}" name="txtChalanId">
                                <span class="input-group-text">৳</span>
                                <input type="number" name="txtDueAmount" class="form-control" id="dueAmount" required step="0.01" placeholder="0.00" min="0" max="{{$val->due}}">
                                <span class="input-group-text">/-</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="discountAmount" class="form-label">Discount Amount <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" name="txtDiscount" class="form-control" id="discountAmount" required step="0.01" placeholder="0.00" min="0" max="{{$val->due}}">
                                <span class="input-group-text">/-</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save Medicine</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
    
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/due.js') }}"></script>

</body>
</html>