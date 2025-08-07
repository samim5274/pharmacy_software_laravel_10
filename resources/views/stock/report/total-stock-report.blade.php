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
                        <h4 class="m-0">Total Stock Report</h4>
                        <h5 class="m-0 text-primary">
                            <a href="{{url('/print/total/stock/report')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                        </h5>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle" id="printableTable">
                            <thead class="table-primary text-center sticky-top bg-white">
                                <tr>
                                    <th>#</th>
                                    <th class="text-start">Product</th>
                                    <th>Stock</th>
                                    <th>P.U Price (৳)</th>
                                    <th>S.U Price (৳)</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $val)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{url('/edit-product/'.$val->id)}}"><h6 class="mb-0 fw-bolder">{{$val->name}}</h6></a>
                                        <span class="text-muted">{{$val->genericName}}</span>
                                    </td>
                                    <td class="text-center">{{$val->stock}}</td>
                                    <td class="text-center">৳{{$val->purchase_price}}/-</td>
                                    <td class="text-center">৳{{$val->price}}/-</td>
                                    <td class="text-center">৳{{$val->stock * $val->price}}/-</td>
                                </tr>
                                @endforeach
                                <tr class="table-primary bg-white">
                                    <td colspan="2">Total</td>
                                    <td class="text-center">{{$stock}}</td>
                                    <td class="text-center">৳{{$purchasePrice}}/-</td>
                                    <td class="text-center">৳{{$salePrice}}/-</td>
                                    <td class="text-center">৳{{$salePrice * $stock}}/-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                    
                    <div class="d-flex justify-content-end mt-3">
                        <div class="d-flex justify-content-end mt-3">
                            {{$data->links()}}
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