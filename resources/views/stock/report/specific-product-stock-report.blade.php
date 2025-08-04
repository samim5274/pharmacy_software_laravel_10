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
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-2">
                        <div>
                            <h4 class="m-0">Product Stock Report</h4>
                        </div>
                        <div class="text-md-end">
                            <div class="d-flex flex-column flex-sm-row gap-4 m-0">
                                <div class="text-muted">
                                    <div><small>Stock Purchase Value</small></div>
                                    <div class="fw-semibold">৳{{ number_format($purchasePrice * $totalStock, 2) }}/-</div>
                                </div>
                                <div class="text-muted">
                                    <div><small>Stock Sale Value</small></div>
                                    <div class="fw-semibold text-primary">৳{{ number_format($salePrice * $totalStock, 2) }}/-</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Form -->
                    <form method="GET" action="{{url('/search-product-stock-report')}}" target="_blank">
                        <div class="row g-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <label for="cbxProduct" class="form-label">Select Product</label>
                                        <select name="cbxProduct" id="cbxProduct" class="form-select" required>
                                            <option selected disabled>-- Select Product --</option>
                                            @foreach($product as $val)
                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
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
                            </div>
                                                       
                        </div>
                    </form>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle" id="printableTable">
                            <thead class="table-primary text-center sticky-top bg-white">
                                <tr>
                                    <th>#</th>
                                    <th class="text-start">Product</th>
                                    <th>Stock In</th>
                                    <th>Stock Out</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                @foreach($stock as $key => $val)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <h6 class="mb-0 fw-bolder">{{$val->product->name}}</h6>
                                        <span class="text-muted">{{$val->product->genericName}}</span>
                                    </td>
                                    <td class="text-center">{{$val->stockIn}}</td>
                                    <td class="text-center">{{$val->stockOut}}</td>
                                    <td class="text-center">{{$val->remark}}</td>
                                </tr>
                                @endforeach
                                <tr class="table-primary bg-white">
                                    <td colspan="2">Total</td>
                                    <td class="text-center">{{$stockIn}}</td>
                                    <td class="text-center">{{$stockOut}}</td>
                                    <td class="text-center">{{$available = $stockIn - $stockOut}}</td>
                                </tr>                                
                            </tbody>                            
                        </table>
                    </div>                    
                    <div class="d-flex justify-content-end mt-3">
                        <div class="d-flex justify-content-end mt-3">
                            {{$stock->links()}}
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