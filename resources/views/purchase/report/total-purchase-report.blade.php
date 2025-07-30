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
                        <h4 class="m-0">Purchase Order Report</h4>
                        <h5 class="m-0 text-primary">
                            <a href="{{url('/print/purchase/order/list/report')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                        </h5>
                    </div>

                    <!-- Filter Form -->
                    <form method="GET" action="{{url('/search-purchase-order')}}" target="_blank" class="mb-4 p-3 rounded border bg-light">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-5">
                                <label for="dtpStartDate" class="form-label">Start Date</label>
                                <input type="date" id="dtpStartDate" name="dtpStartDate" class="form-control" required>
                            </div>
                            <div class="col-md-5">
                                <label for="dtpEndDate" class="form-label">End Date</label>
                                <input type="date" id="dtpEndDate" name="dtpEndDate" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-search me-1"></i> Filter
                                    </button>
                                    <button type="submit" name="print" value="1" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-print me-1"></i> Print
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

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
                                    <th>VAT (৳)</th>
                                    <th>Payable (৳)</th>
                                    <th>Pay (৳)</th>
                                    <th>Due (৳)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchase as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{$val->order_date}}</td>
                                    <td>{{$val->supplier->name}}</td>
                                    <td>CHL-{{$val->chalan_reg}}</td>
                                    <td>৳{{$val->total}}/-</td>
                                    <td>৳{{$val->discount}}/-</td>
                                    <td>৳{{$val->vat}}/-</td>
                                    <td>৳{{$val->payable}}/-</td>
                                    <td>৳{{$val->pay}}/-</td>
                                    <td>৳{{$val->due}}/-</td>
                                </tr>
                                @endforeach 
                                <tr>
                                    <td colspan="4">Total</td>
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
                            {{$purchase->links()}}
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

    <script>
        window.onload = function () {
            const today = new Date().toISOString().split('T')[0];

            const startInput = document.getElementById('dtpStartDate');
            const endInput = document.getElementById('dtpEndDate');

            startInput.max = today;
            endInput.max = today;

            startInput.value = today;
            endInput.value = today;
        };
    </script>
    
</body>
</html>