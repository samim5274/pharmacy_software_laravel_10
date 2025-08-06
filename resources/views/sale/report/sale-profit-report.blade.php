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
                            <h3 class="fw-bold text-dark">Total Sale Profit Report</h3>
                            <!-- <a href="#" target="_blank" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-print me-1"></i> Print Report
                            </a> -->
                        </div>

                        <!-- Filter Form -->
                        <div class="card">
                            <div class="card-body"> 
                                <form method="GET" action="{{url('/filter-date-wise-sale-profit')}}" target="_blank">
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
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">                     
                                @php
                                    $grandProfit = collect($result)->flatMap(function($carts) use ($medicines) {
                                        return $carts->map(function($cart) use ($medicines) {
                                            $medicine = $medicines->firstWhere('id', $cart->medicine_id);
                                            return ($cart->unit_price - $medicine->purchase_price) * $cart->qty;
                                        });
                                    })->sum();
                                @endphp

                                <h4 class="mb-3 text-primary">Today Order Summary</h4>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-12">
                                        <div class="card border-success shadow-lg">
                                            <div class="card-body text-center">
                                                <h6 class="card-subtitle mb-2 text-muted">Grand Profit</h6>
                                                <h4 class="display-4 text-success">৳{{ number_format($grandProfit, 2) }}/-</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-info shadow-sm">
                                            <div class="card-body text-center">
                                                <h6 class="card-subtitle mb-2 text-muted">Total Order</h6>
                                                <h4 class="card-title text-success">৳{{ number_format($total, 2) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-warning shadow-sm">
                                            <div class="card-body text-center">
                                                <h6 class="card-subtitle mb-2 text-muted">Discount</h6>
                                                <h4 class="card-title text-danger">৳{{ number_format($discount, 2) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-primary shadow-sm">
                                            <div class="card-body text-center">
                                                <h6 class="card-subtitle mb-2 text-muted">VAT</h6>
                                                <h4 class="card-title text-info">৳{{ number_format($vat, 2) }}</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card border-success shadow-sm">
                                            <div class="card-body text-center">
                                                <h6 class="card-subtitle mb-2 text-muted">Payable</h6>
                                                <h4 class="card-title text-success">৳{{ number_format($payable, 2) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-info shadow-sm">
                                            <div class="card-body text-center">
                                                <h6 class="card-subtitle mb-2 text-muted">Paid</h6>
                                                <h4 class="card-title text-primary">৳{{ number_format($pay, 2) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-danger shadow-sm">
                                            <div class="card-body text-center">
                                                <h6 class="card-subtitle mb-2 text-muted">Due</h6>
                                                <h4 class="card-title text-danger">৳{{ number_format($due, 2) }}</h4>
                                            </div>
                                        </div>
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