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
                        <h4 class="m-0">Sub-Category wise Expenses Report</h4>
                    </div>

                    <!-- Filter Form -->
                     <div class="card">
                        <div class="card-body">                            
                            <form method="GET" action="{{url('/filter-sub-category-expenses-report')}}" target="_blank">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-6">
                                        <label for="dtpStartDate" class="form-label">Start Date</label>
                                        <input type="date" id="dtpStartDate" name="dtpStartDate" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dtpEndDate" class="form-label">End Date</label>
                                        <input type="date" id="dtpEndDate" name="dtpEndDate" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cbxCategory" class="form-label">Select Category</label>
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
                                    <div class="col-md-6">
                                        <label for="cbxsubcategory" class="form-label">Select Sub-Category</label>
                                        <select name="cbxsubcategory" id="subcategory" required class="form-select">
                                            <option value="" disabled selected>-- Select Sub-Category --</option>
                                        </select>
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

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle mb-0" id="printableTable">
                            <thead class="table-primary">
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 15%;">Date</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th style="width: 15%;" class="text-end">Amount (৳)</th>
                                    <th style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $val)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $val->date }}</td>
                                        <td>{{ $val->category->name }}</td>
                                        <td>{{ $val->subcategory->name }}</td>
                                        <td class="text-end">৳{{ number_format($val->amount, 2) }}/-</td>
                                        <td class="text-center">
                                            <a href="{{ url('/specific-expenses-list-print/'.$val->id) }}" target="_blank" title="Print">
                                                <i class="fa-solid fa-print"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr class="fw-bold">
                                    <td colspan="4">Total</td>
                                    <td class="text-end">৳{{ number_format($total, 2) }}/-</td>
                                    <td></td>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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