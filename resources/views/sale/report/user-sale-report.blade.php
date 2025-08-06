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
                            <h3 class="fw-bold text-dark">User wise Sale Report</h3>
                            <!-- <a href="#" target="_blank" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-print me-1"></i> Print Report
                            </a> -->
                        </div>

                        <!-- Filter Form -->
                        <form method="GET" action="{{url('/filter-user-wise-sale-report')}}" target="_blank" class="p-4 border rounded shadow-sm bg-white">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="dtpStartDate" class="form-label fw-semibold">Start Date</label>
                                    <input type="date" id="dtpStartDate" name="dtpStartDate" class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="dtpEndDate" class="form-label fw-semibold">End Date</label>
                                    <input type="date" id="dtpEndDate" name="dtpEndDate" class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="cbxUser" class="form-label">Select User</label>
                                    <select name="cbxUser" id="User" required class="form-select">
                                        <option disabled selected>-- Select User --</option>
                                        @if($user)
                                            @foreach($user as $val)
                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="btn-group w-100">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-search me-1"></i> Filter
                                        </button>
                                        <button type="submit" name="print" value="1" class="btn btn-outline-secondary">
                                            <i class="fa-solid fa-print me-1"></i> Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle" id="printableTable">
                                <thead class="table-primary text-center bg-white">
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
                                        <th>Print</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order as $val)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $val->date }}</td>
                                            <td>{{ $val->user->name ?? 'N/A' }}</td>
                                            <td>ORD-{{ $val->reg }}</td>
                                            <td>৳{{ number_format($val->total, 2) }}</td>
                                            <td>৳{{ number_format($val->discount, 2) }}</td>
                                            <td>৳{{ number_format($val->vat, 2) }}</td>
                                            <td>৳{{ number_format($val->payable, 2) }}</td>
                                            <td>৳{{ number_format($val->pay, 2) }}</td>
                                            <td>৳{{ number_format($val->due, 2) }}</td>
                                            <td>
                                                <a href="{{ url('/specific-order-print/'.$val->reg) }}" class="text-primary" target="_blank" title="Print">
                                                    <i class="fa-solid fa-print"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- Total Row -->
                                    <tr class="table-info fw-bold text-center">
                                        <td colspan="4" class="text-end" >Total:</td>
                                        <td>৳{{ number_format($total, 2) }}</td>
                                        <td>৳{{ number_format($discount, 2) }}</td>
                                        <td>৳{{ number_format($vat, 2) }}</td>
                                        <td>৳{{ number_format($payable, 2) }}</td>
                                        <td>৳{{ number_format($pay, 2) }}</td>
                                        <td>৳{{ number_format($due, 2) }}</td>
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