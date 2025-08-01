<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Total Sale Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
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
        <h1 style="text-align:center;">Abir Pharmacy</h1>
        <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
        <h3 style="text-align:center;">Date wise Product Sale Report</h3>
        <h5 style="text-align:center;">Start: {{$start}} & End: {{$end}}</h5>
        <p><mark>Note: All company info get from database company info table.</mark></p>
        <hr>
        <div class="qrImg">
            QR-
        </div>
        <table class="table table-bordered table-striped " id="printableTable">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th class="text-start">Product</th>
                    <th>Total Quantity</th>
                    <th>Total Price (৳)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $data['product_name'] }}</td>
                    <td class="text-center">{{ $data['total_quantity'] }}</td>
                    <td class="text-center">৳{{ $data['total_price'] }}/-</td>
                </tr>
                @endforeach
                <tr class="table-primary fw-bold">
                    <td colspan="2">Grand Total:</td>
                    <td class="text-center">{{ $grand_total_qty }}</td>
                    <td class="text-center">৳{{ number_format($grand_total_price, 2) }}/-</td>
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

    <br>
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
