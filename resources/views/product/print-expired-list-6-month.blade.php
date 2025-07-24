<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Total Order List</title>
    <link rel="icon" href="./img/LOGO35 pix.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        h2 { margin-bottom: 0; }
        p { margin-top: 2px; margin-bottom: 5px; }

        .invoice-table th, .invoice-table td {
            padding: 6px 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th {
            background-color: #f2f2f2;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .invoice-header h2, .invoice-header p {
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="invoice-header">
        <h2>Abir Pharmacy</h2>
        <p>House #02, Road #11, Sector #6, Uttara, Dhaka-1230</p>
        <h4>Expired List on 180 days.</h4>
    </div><hr>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
        <p style="margin: 0;">Officer: {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : 'N/A' }}</p>
        <div class="qrImg">
            QR-
        </div>
    </div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Generic</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Price (৳)</th>
                <th>Qty </th>
                <th>Total (৳)</th>
                <th>Mfg. Date </th>
                <th>Exp. Date </th>
            </tr>
        </thead>
        <tbody>
            @php $totalValue = 0; @endphp
            @foreach($product as $key => $val)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->genericName}}</td>
                <td>{{$val->brand->name}}</td>
                <td>{{$val->category->name}}</td>
                <td>৳ {{$val->price}}/-</td>
                <td>{{$val->stock}}</td>
                <td>৳ {{$val->price * $val->stock}}/-</td>
                <td>{{$val->manufacture_date}}</td>
                <td>{{$val->expiry_date}}</td>
            </tr>
            @php $totalValue += $val->price * $val->stock; @endphp
            @endforeach
            <tr class="table-info">
                <td colspan="5">Total:</td>
                <td>৳ {{$total}}/-</td>
                <td>{{$stock}} Pcs</td>
                <td>৳ {{$totalValue}}/-</td>
                <td colspan="3"></td>
            </tr>
        </tbody>
    </table>

    <div style="display: flex; justify-content: space-between; margin-top: 50px;">
        <div style="text-align: center;">
            <p>--------------------------</p>
            <strong>Manager Signature</strong>
        </div>
        <div style="text-align: center;">
            <p>--------------------------</p>
            <strong>Admin Signature</strong>
        </div>
    </div>

    <p class="small"><strong>Note:</strong> This Software develop by <strong>BGMIT</strong> created by <strong>SAMIM-HosseN</strong>. Call: +8801 62420 9291. Thank You!</p>

     <script>
        window.onload = function() {
            window.print();
            setTimeout(() => {
                window.close();
            }, 300); 
        };
    </script>
</body>
</html>
