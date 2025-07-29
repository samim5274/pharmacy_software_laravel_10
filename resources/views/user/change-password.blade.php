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
                        <h4 class="m-0">Edit Profile : {{Auth::guard('admin')->user()->name}}</h4>
                        <!--<h5 class="m-0 text-primary">
                            <a href="{{url('/print/complete/purchase/order')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                        </h5> -->
                    </div>
                    <div class="my-4">
                        <div class="card shadow-lg border-0 rounded-4 p-4">
                            <h3 class="mb-4 text-center"><i class="fas fa-user-edit me-2"></i>Change password</h3>
                            <form action="{{url('/change-password/'.Auth::guard('admin')->user()->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                    <!-- Profile Image Preview + Upload -->
                                    <div class="col-md-4 text-center">
                                        <div id="dropZone" class="border border-dashed rounded-circle mx-auto"
                                            style="width: 200px; height: 200px; position: relative; cursor: pointer; background-color: #f8f9fa; display:flex; align-items:center; justify-content:center;">
                                            <img id="previewImage"
                                            src="{{asset('/img/employee/'.Auth::guard('admin')->user()->photo)}}"
                                            alt="Profile Photo" class="rounded-circle shadow" style="width: 190px; height: 190px; object-fit: cover;">                                            
                                        </div>
                                    </div>

                                    <!-- Editable Fields -->
                                    <div class="col-md-8">
                                        <input type="hidden" name="id" class="form-control" value="{{ Auth::guard('admin')->user()->id }}">
                                        <div class="col-md-12">
                                            <label class="form-label">Old Password</label>
                                            <input type="password" name="txtPass1" class="form-control" >
                                        </div>  
                                        <div class="col-md-12">
                                            <label class="form-label">New Password</label> 
                                            <input type="password" name="txtPass2" class="form-control" >
                                        </div>       
                                        <div class="col-md-12">
                                            <label class="form-label">Re-type Password</label>                       
                                            <input type="password" name="txtPass3" class="form-control" >
                                        </div>
                                        <!-- Buttons -->
                                        <div class="mt-4 d-flex justify-content-between">
                                            <a href="{{ url('/profile') }}" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left me-1"></i> Cancel
                                            </a>
                                            <button type="submit" class="btn btn-success" id="submitBtn" disabled>
                                                <i class="fas fa-save me-1"></i> Update Password
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
        document.addEventListener("DOMContentLoaded", function () {
            const newPass = document.querySelector('input[name="txtPass2"]');
            const retypePass = document.querySelector('input[name="txtPass3"]');
            const oldPass = document.querySelector('input[name="txtPass1"]');
            const submitBtn = document.getElementById('submitBtn'); // Add this line

            const messageBox = document.createElement('div');
            messageBox.style.marginTop = "8px";
            messageBox.style.fontSize = "0.9rem";
            retypePass.parentNode.appendChild(messageBox);

            function validatePasswordStrength(password) {
                const lengthCheck = password.length >= 8;
                const uppercaseCheck = /[A-Z]/.test(password);
                const lowercaseCheck = /[a-z]/.test(password);
                const digitCheck = /[0-9]/.test(password);
                const specialCharCheck = /[!@#$%^&*(),.?":{}|<>]/.test(password);

                return {
                    lengthCheck,
                    uppercaseCheck,
                    lowercaseCheck,
                    digitCheck,
                    specialCharCheck,
                    isValid: lengthCheck && uppercaseCheck && lowercaseCheck && digitCheck && specialCharCheck
                };
            }

            function validatePasswords() {
                const oldVal = oldPass.value.trim();
                const newVal = newPass.value.trim();
                const retypeVal = retypePass.value.trim();
                const result = validatePasswordStrength(newVal);

                let isValid = false;

                if (!result.lengthCheck) {
                    messageBox.innerHTML = `<span style="color:red;">The password must be at least 8 characters long.</span>`;
                } else if (!result.uppercaseCheck) {
                    messageBox.innerHTML = `<span style="color:red;">Must contain at least one uppercase letter (A-Z).</span>`;
                } else if (!result.lowercaseCheck) {
                    messageBox.innerHTML = `<span style="color:red;">Must contain at least one lowercase letter (a-z).</span>`;
                } else if (!result.digitCheck) {
                    messageBox.innerHTML = `<span style="color:red;">Must contain at least one number (0-9).</span>`;
                } else if (!result.specialCharCheck) {
                    messageBox.innerHTML = `<span style="color:red;">Must contain at least one special character (@, #, $, %, etc.).</span>`;
                } else if (newVal !== retypeVal) {
                    messageBox.innerHTML = `<span style="color:red;">The new and retyped passwords are not the same.</span>`;
                } else if (oldVal && oldVal === newVal) {
                    messageBox.innerHTML = `<span style="color:red;">The old and new passwords cannot be the same.</span>`;
                } else {
                    messageBox.innerHTML = `<span style="color:green;">Password is acceptable.</span>`;
                    isValid = true;
                }

                // Enable or disable the button
                submitBtn.disabled = !isValid;
            }

            newPass.addEventListener("input", validatePasswords);
            retypePass.addEventListener("input", validatePasswords);
            oldPass.addEventListener("input", validatePasswords);
        });
    </script>

</body>
</html>