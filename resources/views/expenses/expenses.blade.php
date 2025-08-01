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
                        <h4 class="m-0">Expenses</h4>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-circle-plus me-2"></i> Add
                            </a>
                            <a href="{{url('/print-daily-expenses')}}" target="_Blank" class="btn btn-primary">
                                <i class="fa-solid fa-print me-2"></i> Print
                            </a>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped ">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Category</th>
                                        <th>Sub-Category</th>
                                        <th>Remark</th>
                                        <th class="text-center">Amount (৳)</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($expenses)
                                    @foreach($expenses as $key => $val)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$val->date}}</td>
                                        <td>{{$val->user->name}}</td>
                                        <td>{{$val->category->name}}</td>
                                        <td>{{$val->subcategory->name}}</td>
                                        <td>{{$val->remark}}</td>
                                        <td class="text-center">৳{{$val->amount}}/-</td>
                                        <td class="text-center p-1" style="white-space: nowrap; width: 2%;">
                                            <a href="{{url('/edit-expenses/'.$val->id)}}">
                                                <i class="fa-solid fa-edit me-2" style="font-size:1.1rem;"></i>
                                            </a>
                                            <a href="{{ url('/specific-expenses-list-print/'.$val->id) }}" target="_blank">
                                                <i class="fa-solid fa-print" style="font-size:1.1rem;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        <td colspan="6">Total:</td>
                                        <td class="text-center">৳{{$total}}/-</td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <div class="d-flex justify-content-end mt-3">
                                {{$expenses->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('/daily-expenses')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daily Expenses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Category -->
                        <div class="col-12">
                        <label for="category" class="form-label fw-semibold">Category</label>
                        <div class="input-group">
                            <select name="cbxCategory" id="category" required class="form-select">
                            <option value="" disabled selected>-- Select Category --</option>
                            @if($category)
                                @foreach($category as $val)
                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
                            @endif
                            </select>
                            <span class="input-group-text bg-white border-start-0" id="loader" style="display:none;">
                            <div class="spinner-border spinner-border-sm text-primary" role="status" aria-label="loading"></div>
                            </span>
                        </div>
                        </div>

                        <!-- Sub-Category -->
                        <div class="col-12">
                        <label for="subcategory" class="form-label fw-semibold">Sub-Category</label>
                        <select name="cbxsubcategory" id="subcategory" required class="form-select">
                            <option value="" disabled selected>-- Select Sub-Category --</option>
                        </select>
                        </div>

                        <!-- Amount -->
                        <div class="col-12">
                        <label for="Amount" class="form-label fw-semibold">Amount</label>
                        <input type="number" class="form-control" id="Amount" name="txtAmount" required placeholder="Amount">
                        </div>

                        <!-- Remark -->
                        <div class="col-12">
                        <label for="Remark" class="form-label fw-semibold">Remark</label>
                        <input type="text" class="form-control" id="Remark" name="txtRemark" value="N/A" required placeholder="Remark">
                        </div>
                    </div>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
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