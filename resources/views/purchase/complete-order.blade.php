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
                <div class="container mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="m-0">Medicine Order List</h4>
                        <!-- <h5 class="m-0 text-primary">
                            <a href="#" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                        </h5> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped " id="printableTable">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Delivery Date</th>
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
                                    <td>{{$val->delivary_date}}</td>
                                    <td><a href="{{ url('/specific-purchase-order-print-make/' . $val->chalan_reg) }}" target="_blank"  title="Print Invoice"> CHL-{{$val->chalan_reg}} <i class="fa-solid fa-print text-primary"></i></a></td>
                                    <td>৳{{$val->total}}/-</td>
                                    <td>৳{{$val->discount}}/-</td>
                                    <td>৳{{$val->vat}}/-</td>
                                    <td>৳{{$val->payable}}/-</td>
                                    <td>৳{{$val->pay}}/-</td>
                                    <td>৳{{$val->due}}/-</td>
                                    <td class="text-center">
                                        <a href="{{url('/purchase-bill-pay/'.$val->chalan_reg)}}"><span class="badge bg-success px-2 py-2 text-white">
                                            <i class="fa-solid fa-money-bill-1-wave"></i>
                                        </span></a>
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

</body>
</html>