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
                        <h4 class="m-0">Expenses Setting</h4>
                        <!-- <h5 class="m-0 text-primary">
                            <a href="{{url('/print/complete/purchase/order')}}"><i class="fa-solid fa-print"></i> Print </a>
                        </h5> -->
                    </div><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Categroy</h5>
                            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                <table class="table table-bordered table-hover align-middle" id="printableTable">
                                    <thead class="table-primary text-center sticky-top bg-white">
                                        <tr>
                                            <th>#</th>
                                            <th class="text-start">Category</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cat as $val)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{$val->name}}</td>
                                            <td class="text-center text-primary" data-bs-toggle="modal" data-bs-target="#CategoryModal{{$val->id}}"><i class="fa-solid fa-pen-to-square"></i></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $cat->links() }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Add new Categroy</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{url('/add-new-category')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="Categroy" class="form-label">Categroy address</label>
                                            <input type="text" name="txtCategroy" class="form-control" id="Categroy" placeholder="Type your category name"  required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Add new Categroy</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{url('/add-new-sub-category')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="cbxCategory" class="form-label">Select Expenses Category</label>
                                            <select class="form-select" name="cbxCategory" id="cbxCategory">
                                                <option selected disabled>-- Select Category --</option>
                                                @foreach($category as $val)
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subCategroy" class="form-label">Sub-Categroy address</label>
                                            <input type="text" name="txtSubCategroy" class="form-control" id="subCategroy" placeholder="Type your sub-category name" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Sub-Categroy</h5>
                            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                <table class="table table-bordered table-hover align-middle" id="printableTable">
                                    <thead class="table-primary text-center sticky-top bg-white">
                                        <tr>
                                            <th>#</th>
                                            <th class="text-start">Category</th>
                                            <th class="text-start">Sub-Category</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subCat as $val)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{$val->excategory->name}}</td>
                                            <td>{{$val->name}}</td>
                                            <td class="text-center text-primary" data-bs-toggle="modal" data-bs-target="#SubCategoryModal{{$val->id}}"><i class="fa-solid fa-pen-to-square"></i></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $subCat->links() }}
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

<!-- Modal -->
@foreach($cat as $val)
<div class="modal fade" id="CategoryModal{{$val->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/update-ex-category')}}" method="GET">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">"{{$val->name}}" Category modify</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="Categroy" class="form-label">Categroy address</label>
                        <input type="text" name="txtCategroy" value="{{$val->name}}" class="form-control" id="Categroy" placeholder="Type your category name"  required>
                        <input type="hidden" value="{{$val->id}}" name="txtId">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to change this items?')">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal -->
@foreach($subCat as $val)
<div class="modal fade" id="SubCategoryModal{{$val->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">"{{$val->excategory->name}}" - "{{$val->name}}" Sub-Category modify</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('/update-ex-sub-category')}}" method="GET">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cbxCategory" class="form-label">Select Expenses Category</label>
                        <select class="form-select" name="cbxCategory" id="cbxCategory{{$val->id}}">
                            <option disabled {{ empty($val->ex_category_id) ? 'selected' : '' }}>-- Select Category --</option>
                            @foreach($category as $rows)
                            <option value="{{$rows->id}}" {{ ($val->ex_category_id == $rows->id) ? 'selected' : '' }}>
                                {{$rows->name}}
                            </option>
                            @endforeach
                        </select>
                        <input type="hidden" value="{{$val->id}}" name="txtId">
                    </div>
                    <div class="mb-3">
                        <label for="subCategroy" class="form-label">Sub-Categroy address</label>
                        <input type="text" name="txtSubCategroy" value="{{$val->name}}" class="form-control" id="subCategroy" placeholder="Type your sub-category name" required>
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to change this items?')">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
    
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>

</body>
</html>