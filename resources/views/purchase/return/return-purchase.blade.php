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
                    <h4 class="m-0">Purchase Return</h4>
                </div>
                @include('message.message')
                <div class="row">
                    <div class="container">
                        <div class="col-lg-12">
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
                                            @if($val->due <= 0)
                                            <td>৳{{$val->due}}/-</td>
                                            @else
                                            <td data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$val->id}}">৳{{$val->due}}/-</td>
                                            @endif
                                            <td class="text-center">
                                                <a href="{{url('/find-purchase-medicine/'.$val->chalan_reg)}}"><span class="badge bg-success px-2 py-2 text-white">
                                                    <i class="fa-solid fa-eye"></i>
                                                </span></a>
                                            </td>
                                        </tr>
                                        @endforeach                                        
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
                const printUrl = `{{ url('/print-purchase-return-invoice') }}/${reg}`;
                window.open(printUrl, '_blank');
            };
        @endif
    </script>


</body>
</html>