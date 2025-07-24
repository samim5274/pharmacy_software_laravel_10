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
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <form action="{{ url('/update-medicine') }}" method="POST" class="modal-content">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Medicine Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}" required>
                                                <input type="text" name="id" hidden readonly value="{{$product->id}}">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="generic_name" class="form-label">Generic Name</label>
                                                <input type="text" name="generic_name" class="form-control" id="generic_name" value="{{$product->genericName}}" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="brand" class="form-label">Brand</label>
                                                <select name="brand_id" id="brand" class="form-select" required>
                                                    <option disabled {{ empty($product->brand_id) ? 'selected' : '' }}>-- Select Brand --</option>
                                                    @foreach($brands as $val)
                                                        <option value="{{ $val->id }}" {{ (isset($product) && $product->brand_id == $val->id) ? 'selected' : '' }}>
                                                            {{ $val->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="category" class="form-label">Category</label>
                                                <select name="category_id" id="category" class="form-select" required>
                                                    <option disabled {{ empty($product->category_id) ? 'selected' : '' }}>-- Select Category --</option>
                                                    @foreach($category as $val)
                                                        <option value="{{ $val->id }}" {{ (isset($product) && $product->category_id == $val->id) ? 'selected' : '' }}>
                                                            {{ $val->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="price" class="form-label">Unit Price (৳)</label>
                                                <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{$product->price}}" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="stock" class="form-label">Stock Quantity</label>
                                                <input type="number" name="stock" class="form-control" id="stock" value="{{$product->stock}}" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="manufacture_date" class="form-label">Manufacture Date</label>
                                                <input type="date" name="manufacture_date" class="form-control" value="{{$product->manufacture_date}}" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="expiry_date" class="form-label">Expiry Date</label>
                                                <input type="date" name="expiry_date" class="form-control" value="{{$product->expiry_date}}" required>
                                            </div>

                                            <div class="col-12">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" class="form-control" rows="3">{{$product->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between mt-4">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success">Edit Medicine</button>
                                    </div>
                                </form>
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
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>
</html>