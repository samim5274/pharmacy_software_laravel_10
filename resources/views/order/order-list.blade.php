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
                        <h4 class="m-0">Medicine Order List</h4>
                        <h5 class="m-0 text-primary">
                            <a href="{{url('/print-all-order')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
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
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{$val->date}}</td>
                                    <td>{{$val->user->name}}</td>
                                    <td><a href="{{url('/view-order/'.$val->reg)}}">{{$val->reg}}</a></td>
                                    <td>৳{{$val->total}}/-</td>
                                    <td>৳{{$val->discount}}/-</td>
                                    <td>৳{{$val->vat}}/-</td>
                                    <td>৳{{$val->payable}}/-</td>
                                    <td>৳{{$val->pay}}/-</td>
                                    <td>৳{{$val->due}}/-</td>
                                    <td class="text-center">
                                        @if($val->status == 1)
                                            <span class="badge bg-warning">Return</span>
                                        @elseif($val->status == 2)
                                        <span class="badge bg-success">Paid</span>
                                        <span class="text-primary"><a href="{{url('/specific-order-print/'.$val->reg)}}" target="_blank"><i class="fa-solid fa-print"></i></a></span>
                                        <a href="{{url('/view-order/'.$val->reg)}}" class="text-danger"><i class="fa-regular fa-share-from-square"></i></a>
                                        @else
                                            <span class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#due{{$val->id}}">Due</span>
                                            <span class="text-primary"><a href="{{url('/specific-order-print/'.$val->reg)}}" target="_blank"><i class="fa-solid fa-print"></i></a></span>
                                        @endif                                        
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
    


<!-- Modal -->
@foreach($order as $key => $val)
<div class="modal fade" id="due{{$val->id}}" tabindex="-1" aria-labelledby="dueLabel{{$val->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <form action="{{ url('/due-collection/'.$val->reg) }}" method="POST">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-light" id="dueLabel{{$val->id}}">Due Collection: <strong>ORD-{{$val->reg}}</strong></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 py-3">
                    <!-- Due Amount -->
                    <div class="text-center mb-4">
                        <input type="hidden" name="txtDue" id="num1{{$val->id}}" value="{{ $val->due }}">
                        <h1 class="display-4 text-danger mb-0">৳ {{ $val->due }}/-</h1>
                        <small class="text-muted">Total Due Amount</small>
                    </div>

                    <!-- Discount -->
                    <div class="mb-3 row align-items-center">
                        <label for="num3{{$val->id}}" class="col-sm-3 col-form-label text-end fw-semibold">Discount:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="num3{{$val->id}}" name="txtDiscount" value="0" placeholder="Enter Discount" onkeyup="calculateAmount({{$val->id}})" onchange="calculateAmount({{$val->id}})">
                        </div>
                    </div>

                    <!-- Pay Amount -->
                    <div class="mb-3 row align-items-center">
                        <label for="num2{{$val->id}}" class="col-sm-3 col-form-label text-end fw-semibold">Pay Amount:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="num2{{$val->id}}" name="txtPay" placeholder="Enter Payment" onkeyup="calculateAmount({{$val->id}})" onchange="calculateAmount({{$val->id}})">
                        </div>
                    </div>

                    <!-- Calculated Final Amount -->
                    <div class="row">
                        <div class="offset-sm-3 col-sm-9">
                            <div id="result{{$val->id}}" class="fs-4 fw-bold text-danger">Amount: $0/-</div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4 py-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" id="btnSave{{$val->id}}" onclick="return confirm('Are you sure you want to collect this due?')">
                        <i class="bi bi-check-circle-fill me-1"></i> Save
                    </button>
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
    <script src="{{ asset('assets/js/due.js') }}"></script>

</body>
</html>