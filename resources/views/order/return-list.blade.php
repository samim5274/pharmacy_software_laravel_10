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
                        <h4 class="m-0">Order Return List</h4>
                        <!-- <h5 class="m-0 text-primary">
                            <a href="{{url('/print-all-order')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                        </h5> -->
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
                                        @else
                                            <span class="badge bg-danger">Due</span>
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
    
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/due.js') }}"></script>

</body>
</html>