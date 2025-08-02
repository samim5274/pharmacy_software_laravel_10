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
        <h1 style="text-align:center;">{{$company[0]->name}}</h1>
        <p style="text-align:center;">{{$company[0]->address}}</p>
        <p style="text-align:center;">Mobaile: {{$company[0]->phone}}  website: {{$company[0]->website}}</p>
        <h4>Order Invoice</h4>
        <h5>Date: {{$order->order_date}}</h5>
    </div><hr>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
        <p style="margin: 0;">Billing office: {{$cart[0]->user->name}}</p>
        <p style="margin: 0;">Supplier: {{$order->supplier->name}}</p>
        <div class="qrImg">
            QR-
        </div>
    </div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Price per Item (৳)</th>
                <th>Quantity</th>
                <th>Total (৳)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $key => $val)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $val->medicine->name }}</td>
                <td>{{ number_format($val->purchase_price, 2) }}</td>
                <td>{{ $val->order_qty }}</td>
                <td>{{ number_format($val->purchase_price * $val->order_qty, 2) }}</td>
            </tr>
            @endforeach            
        </tbody>
    </table>

    <div class="row mt-4">
        <div class="col-md-6 offset-md-6">
            <table class="table table-sm table-borderless">
                <tr>
                    <th class="text-end" width="70%">Subtotal:</th>
                    <td class="text-end">৳ {{ number_format($order->total, 2) }}</td>
                </tr>
                <tr>
                    <th class="text-end">Discount:</th>
                    <td class="text-end text-danger">- ৳ {{ number_format($order->discount, 2) }}</td>
                </tr>
                <tr>
                    <th class="text-end">VAT:</th>
                    <td class="text-end text-success">+ ৳ {{ number_format($order->vat, 2) }}</td>
                </tr>
                <tr class="border-top">
                    <th class="text-end">Total Payable:</th>
                    <td class="text-end fw-bold">৳ {{ number_format($order->payable, 2) }}</td>
                </tr>
                <tr>
                    <th class="text-end">Paid:</th>
                    <td class="text-end text-primary">৳ {{ number_format($order->pay, 2) }}</td>
                </tr>
                <tr class="border-top">
                    <th class="text-end">Due:</th>
                    <td class="text-end {{ $order->due > 0 ? 'text-danger fw-bold' : 'text-success' }}">
                        ৳ {{ number_format($order->due, 2) }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    


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
