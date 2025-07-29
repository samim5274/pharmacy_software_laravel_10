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
        #dropZone {
        width: 200px;
        height: 200px;
        border: 2px dashed #6c757d;
        border-radius: 50%;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        cursor: pointer;
        overflow: hidden;
        }
        #dropOverlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.3);
        color: white;
        font-weight: bold;
        font-size: 1rem;
        display: none;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        user-select: none;
        }
        #previewImage {
        width: 190px;
        height: 190px;
        object-fit: cover;
        border-radius: 50%;
        transition: opacity 0.3s ease;
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
                        <!-- <h4 class="m-0">Edit Profile : {{Auth::guard('admin')->user()->name}}</h4>
                        <h5 class="m-0 text-primary">
                            <a href="{{url('/print/complete/purchase/order')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                        </h5> -->
                    </div>
                    <div class="my-4">
                        <div class="card shadow-lg border-0 rounded-4 p-4">
                            <h3 class="mb-4 text-center"><i class="fas fa-user-edit me-2"></i>Edit Profile</h3>
                            <form action="{{ url('/update-profile/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                    <!-- Profile Image Preview + Upload -->
                                    <div class="col-md-4 text-center">
                                        <div id="dropZone" class="border border-dashed rounded-circle mx-auto"
                                            style="width: 200px; height: 200px; position: relative; cursor: pointer; background-color: #f8f9fa; display:flex; align-items:center; justify-content:center;">
                                            <img id="previewImage"
                                            src="{{asset('/img/employee/'.$user->photo)}}"
                                            alt="Profile Photo" class="rounded-circle shadow" style="width: 190px; height: 190px; object-fit: cover;">
                                            <div id="dropOverlay" style="position:absolute; inset:0; background:rgba(0,0,0,0.25); color:#fff; font-weight:bold; font-size:1rem; display:none; align-items:center; justify-content:center; border-radius: 50%;">Drop image here</div>
                                        </div>
                                        <input type="file" name="profile_photo" id="imageInput" accept="image/*" style="display:none;">
                                        <small class="text-muted d-block mt-2">Drag & drop or click to upload Max: 2MB</small>
                                    </div>

                                    <!-- Editable Fields -->
                                    <div class="col-md-8">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Phone</label>
                                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Date of Birth</label>
                                                <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Address</label>
                                                <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Role</label>
                                                <select name="role" class="form-select">
                                                    <option value="1" disabled>-- Select User Role --</option>
                                                    <option value="1" disabled {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                                                    <option value="2" disabled {{ $user->role == 2 ? 'selected' : '' }}>Manager</option>
                                                    <option value="3" disabled {{ $user->role == 3 ? 'selected' : '' }}>Account</option>
                                                    <option value="4" disabled {{ $user->role == 4 ? 'selected' : '' }}>Sale</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="mt-4 d-flex justify-content-between">
                                            <a href="{{ url('/profile') }}" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left me-1"></i> Cancel
                                            </a>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save me-1"></i> Update Profile
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
  const dropZone = document.getElementById('dropZone');
  const imageInput = document.getElementById('imageInput');
  const previewImage = document.getElementById('previewImage');
  const dropOverlay = document.getElementById('dropOverlay');

  // Clicking dropZone opens file selector
  dropZone.addEventListener('click', () => {
    imageInput.click();
  });

  // Show overlay on dragover
  dropZone.addEventListener('dragover', e => {
    e.preventDefault();
    dropOverlay.style.display = 'flex';
  });

  // Hide overlay on dragleave or drop
  dropZone.addEventListener('dragleave', e => {
    e.preventDefault();
    dropOverlay.style.display = 'none';
  });

  dropZone.addEventListener('drop', e => {
    e.preventDefault();
    dropOverlay.style.display = 'none';

    const files = e.dataTransfer.files;
    if (files.length > 0) {
      const file = files[0];
      if (file.type.startsWith('image/')) {
        imageInput.files = files;  // Set input files for form submission
        previewFile(file);
      } else {
        alert('Please drop an image file.');
      }
    }
  });

  // Preview selected image
  imageInput.addEventListener('change', () => {
    if (imageInput.files.length > 0) {
      previewFile(imageInput.files[0]);
    }
  });

  function previewFile(file) {
    const reader = new FileReader();
    reader.onload = e => {
      previewImage.src = e.target.result;
      previewImage.style.opacity = '0.8';
      setTimeout(() => previewImage.style.opacity = '1', 300);
    };
    reader.readAsDataURL(file);
  }
</script>


</body>
</html>