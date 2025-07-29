<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Total Order List</title>
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
        <h4>Order Invoice</h4>
    </div><hr>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
        <p style="margin: 0;">Billing office: {{$returnOrder->user->name}}</p>
        <p style="margin: 0;">Supplier: {{$returnOrder->supplier->name}}</p>
        <div class="qrImg">
            QR-
        </div>
    </div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Unit Price(৳)</th>
                <th>Quantity</th>
                <th>Total (৳)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($returnCart as $key => $val)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $val->medicine->name }}</td>
                <td>{{ number_format($val->purchase_price, 2) }}</td>
                <td>{{ $val->return_qty }}</td>
                <td>{{ number_format($val->purchase_price * $val->return_qty, 2) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Subtotal:</strong></td>
                <td>৳{{ number_format($returnOrder->total, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Discount:</strong></td>
                <td>৳{{ number_format($returnOrder->discount, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>VAT:</strong></td>
                <td>৳{{ number_format($returnOrder->vat, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Total Payable:</strong></td>
                <td>৳{{ number_format($returnOrder->payable, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Paid:</strong></td>
                <td>৳{{ number_format($returnOrder->pay, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Due:</strong></td>
                <td>৳{{ number_format($returnOrder->due, 2) }}</td>
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
