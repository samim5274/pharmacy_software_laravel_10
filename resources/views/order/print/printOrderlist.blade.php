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
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
            page-break-inside: avoid;
        }
        .signature-block {
            width: 45%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="invoice-box">
        <h1 style="text-align:center;">Abir Bekare & Foods</h1>
        <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
        <h3 style="text-align:center;">Total Order List</h3>
        <p><mark>Note: All company info get from database company info table.</mark></p>
        <hr>
        <div class="qrImg">
            QR-
        </div>
        <table class="table table-bordered table-striped " id="printableTable">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>date</th>
                    <th>Name</th>
                    <th>Reg</th>
                    <th>Total (৳)</th>
                    <th>Discount (৳)</th>
                    <th>VAT % (৳)</th>
                    <th>Payable (৳)</th>
                    <th>Pay (৳)</th>
                    <th>Due (৳)</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $key => $val)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$val->date}}</td>
                    <td>{{$val->user->name}}</td>
                    <td>{{$val->reg}}</td>
                    <td>৳{{$val->total}}/-</td>
                    <td>৳{{$val->discount}}/-</td>
                    <td>৳{{$val->vat}}/-</td>
                    <td>৳{{$val->payable}}/-</td>
                    <td>৳{{$val->pay}}/-</td>
                    <td>৳{{$val->due}}/-</td>
                    <td class="text-center">
                        @if($val->status == 2)
                            <span class="badge bg-success">Payment</span>
                        @else
                            <span class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#due{{$val->id}}">Due</span>
                        @endif
                    </td>
                </tr>
                @endforeach
                <tr class="table-info">
                    <td colspan="4">Total:</td>
                    <td>৳{{$total}}/-</td>
                    <td>৳{{$discount}}/-</td>
                    <td>৳{{$vat}}/-</td>
                    <td>৳{{$payable}}/-</td>
                    <td>৳{{$pay}}/-</td>
                    <td>৳{{$due}}/-</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="signature-section">
        <div class="signature-block">
            Manager Signature
        </div>
        <div class="signature-block">
            Admin Signature
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
