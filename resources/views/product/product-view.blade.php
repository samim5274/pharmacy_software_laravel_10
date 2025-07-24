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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Product Details</h4>
                                    </div>
                                    <div class="ms-auto">
                                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="fa-solid fa-calendar-plus me-1"></i> Add Medicine
                                        </button>
                                        
                                    </div>
                                </div>                                
                                <div class="mt-4 mx-n6">
                                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th scope="col" class="px-0 text-muted"> Name </th>
                                                <th scope="col" class="px-0 text-muted">Mfg. Date</th>
                                                <th scope="col" class="px-0 text-muted">Exp. Date</th>
                                                <th scope="col" class="px-0 text-muted">Brand</th>
                                                <th scope="col" class="px-0 text-muted">Category</th>
                                                <th scope="col" class="px-0 text-muted">Stock</th>
                                                <th scope="col" class="px-0 text-muted text-end"> P.U Price (৳)</th>
                                                <th scope="col" class="px-0 text-muted text-end"> S.U Price (৳)</th>
                                                <th scope="col" class="px-0 text-muted text-end"> Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product as $key => $val)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td class="px-0">
                                                    <div class="d-flex align-items-center">
                                                        <!-- <img src="#" class="rounded-circle" width="40" alt="flexy" /> -->
                                                        <div class="ms-3">
                                                            <a href="{{url('/edit-product/'.$val->id)}}"><h6 class="mb-0 fw-bolder">{{$val->name}}</h6></a>
                                                            <span class="text-muted">{{$val->genericName}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-0">{{$val->manufacture_date}}</td>
                                                <td class="px-0">{{$val->expiry_date}}</td>
                                                <td class="px-0">{{$val->brand->name}}</td>
                                                <td class="px-0">{{$val->category->name}}</td>
                                                <td class="px-0">{{$val->stock}}</td>
                                                <td class="px-0 text-dark fw-medium text-end">৳ {{$val->purchase_price}}/-</td>
                                                <td class="px-0 text-dark fw-medium text-end">৳ {{$val->price}}/-</td>
                                                <td class="px-0 text-dark fw-medium text-end">৳ {{$val->stock * $val->price}}/-</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="d-flex justify-content-end mt-3">
                                        {{ $product->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
        <form action="{{url('/add-medicine')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-light" id="staticBackdropLabel">Add New Medicine</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Medicine Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="generic_name" class="form-label">Generic Name</label>
                            <input type="text" name="generic_name" class="form-control" id="generic_name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="brand" class="form-label">Brand</label>
                            <select name="Brand" id="Brand" class="form-select" required>
                                <option selected disabled>-- Select Brand --</option>
                                @foreach($brands as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select" required>
                                <option selected disabled>-- Select Category --</option>
                                @foreach($category as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="purchaseprice" class="form-label">Purchase Price (৳)</label>
                            <input type="number" name="purchaseprice" class="form-control" id="purchaseprice" step="0.01" required>
                        </div>

                        <div class="col-md-6">
                            <label for="price" class="form-label">Sale Price (৳)</label>
                            <input type="number" name="price" class="form-control" id="price" step="0.01" required>
                        </div>

                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stock Quantity</label>
                            <input type="number" name="stock" class="form-control" id="stock" required>
                        </div>

                        <div class="col-md-6">
                            <label for="manufacture_date" class="form-label">Manufacture Date</label>
                            <input type="date" name="manufacture_date" class="form-control" id="manufacture_date" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="expiry_date" class="form-label">Expiry Date</label>
                            <input type="date" name="expiry_date" class="form-control" id="expiry_date" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3">N/A</textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save Medicine</button>
                </div>
            </div>
        </form>
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
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>
</html>