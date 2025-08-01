<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/main-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <style>
        .loader {
            width: 48px;
            height: 48px;
            border: 5px solid #000;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        } 
    </style>
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
                        <h4 class="m-0">Expenses Edit</h4>
                    </div><hr>
                    <div class="row">
                        <form action="{{url('/update-expenses/'.$expenses->id)}}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Category -->
                                        <div class="col-12">
                                            <label for="category" class="form-label fw-semibold">Category</label>
                                            <div class="input-group">
                                                <select name="cbxCategory" id="category" required class="form-select">
                                                <option value="" disabled selected>-- Select Category --</option>
                                                @if($category)
                                                    @foreach($category as $key => $val)
                                                        <option value="{{ $val->id }}" {{ $val->id == $expenses->catId ? 'selected' : '' }}>
                                                            {{ $val->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Sub-Category -->
                                        <div class="col-12">
                                            <label for="subcategory" class="form-label fw-semibold">Sub-Category</label>
                                            <select name="cbxsubcategory" id="subcategory" required class="form-select">
                                                <option value="" disabled selected>-- Select Sub-Category --</option>
                                                @if($category)
                                                    @foreach($subcategory as $key => $val)
                                                        <option value="{{ $val->id }}" {{ $val->id == $expenses->subcatId ? 'selected' : '' }}>
                                                            {{ $val->name }}
                                                        </option>
                                                    @endforeach
                                                @endif  
                                            </select>
                                        </div>

                                        <!-- Amount -->
                                        <div class="col-12">
                                            <label for="Amount" class="form-label fw-semibold">Amount</label>
                                            <input type="number" class="form-control" id="Amount" name="txtAmount" value="{{$expenses->amount}}" required placeholder="Amount">
                                        </div>

                                        <!-- Remark -->
                                        <div class="form-group row">
                                            <label for="Remark" class="col-sm-3 col-form-label">Remark</label>
                                            <input type="text" class="form-control" id="Remark" name="txtRemark" value="{{$expenses->remark}}" required placeholder="Remark">                                        
                                        </div>
                                    </div>
                                    </div>

                                <div class="modal-footer my-4">
                                    <a href="{{url('/expenses')}}"><button type="button" class="btn btn-secondary me-3">Close</button></a>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var loader = $('#loader');  // Correct selector with $
            var category = $('#category');

            loader.hide();

            category.change(function(){
                var categoryId = $(this).val();
                console.log("Selected Category ID:", categoryId);

                if(!categoryId) {
                    $("#subcategory").html("<option disabled selected>-- Select Sub-Category --</option>");
                } else {
                    loader.show();

                    $.ajax({
                        url: "/getSubCategory/" + categoryId,
                        type: "GET",
                        success: function(data){
                            var subCategory = data.subCategory;
                            var html = "<option disabled selected>-- Select Sub Category --</option>";

                            for(let i = 0; i < subCategory.length; i++){
                                html += `<option value="${subCategory[i].id}">${subCategory[i].name}</option>`;
                            }

                            $("#subcategory").html(html);
                            loader.hide();
                        },
                        error: function(){
                            alert('Failed to fetch subcategories.');
                            loader.hide();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>