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
                    <div class="mt-5">
                        <!-- Header with Title and Print -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold text-dark">Total Sale Return Report</h3>
                            <!-- <a href="{{ url('/print-total-sale-report') }}" target="_blank" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-print me-1"></i> Print Report
                            </a> -->
                        </div>

                        <!-- Filter Form -->
                        <form method="GET" action="{{url('/filter-date-wise-sale-return-report')}}" target="_blank" class="mb-4 p-3 rounded border bg-light">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-6">
                                    <label for="dtpStartDate" class="form-label">Start Date</label>
                                    <input type="date" id="dtpStartDate" name="dtpStartDate" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dtpEndDate" class="form-label">End Date</label>
                                    <input type="date" id="dtpEndDate" name="dtpEndDate" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-search me-1"></i> Filter
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-grid gap-2">
                                        <button type="submit" name="print" value="1" class="btn btn-outline-secondary">
                                            <i class="fa-solid fa-print me-1"></i> Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle" id="printableTable">
                                <thead class="table-primary text-center">
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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order as $key => $val)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $val->date }}</td>
                                        <td>{{ $val->user->name }}</td>
                                        <td>ORD-{{ $val->reg }}</td>
                                        <td>৳{{ $val->total }}/-</td>
                                        <td>৳{{ $val->discount }}/-</td>
                                        <td>৳{{ $val->vat }}/-</td>
                                        <td>৳{{ $val->payable }}/-</td>
                                        <td>৳{{ $val->pay }}/-</td>
                                        <td>৳{{ $val->due }}/-</td>
                                        <td>
                                            @if($val->status == 1)
                                                <span class="badge bg-warning">Return</span>
                                            @elseif($val->status == 2)
                                                <span class="badge bg-success">Paid</span>
                                                <a href="{{ url('/specific-order-print/'.$val->reg) }}" class="text-primary ms-1" target="_blank" title="Print">
                                                    <i class="fa-solid fa-print"></i>
                                                </a>
                                            @else
                                                <span class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#due{{ $val->id }}">Due</span>
                                                <a href="{{ url('/specific-order-print/'.$val->reg) }}" class="text-primary ms-1" target="_blank" title="Print">
                                                    <i class="fa-solid fa-print"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                    <!-- Total Row -->
                                    <tr class="table-info fw-bold text-center">
                                        <td colspan="4">Total:</td>
                                        <td>৳{{ $total }}/-</td>
                                        <td>৳{{ $discount }}/-</td>
                                        <td>৳{{ $vat }}/-</td>
                                        <td>৳{{ $payable }}/-</td>
                                        <td>৳{{ $pay }}/-</td>
                                        <td>৳{{ $due }}/-</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="d-flex justify-content-end mt-3">
                            {{ $order->links() }}
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