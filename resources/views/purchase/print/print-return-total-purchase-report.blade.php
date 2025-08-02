<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Invoice Print</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
            font-size: 13px;
        }

        h2, h4, p {
            margin: 0;
            padding: 0;
        }

        .header, .footer {
            text-align: center;
            margin-bottom: 10px;
        }

        .sub-header {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #444;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        .text-right {
            text-align: right;
        }

        .fw-bold {
            font-weight: bold;
        }

        .summary td {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .sign-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .sign-block {
            text-align: center;
        }

        .note {
            font-size: 12px;
            margin-top: 40px;
            text-align: center;
        }

        @media print {
            body {
                color: #000;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="text-align:center;">{{$company[0]->name}}</h1>
        <p style="text-align:center;">{{$company[0]->address}}</p>
        <p style="text-align:center;">Mobaile: {{$company[0]->phone}}  website: {{$company[0]->website}}</p>
        <h4>Purchase Return Report</h4>
    </div>

    <div class="sub-header">
        <p><strong>QR:</strong> QR-PENDING</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Supplier</th>
                <th>Chalan</th>
                <th>Total (৳)</th>
                <th>Discount</th>
                <th>VAT</th>
                <th>Payable</th>
                <th>Paid</th>
                <th>Due</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchase as $key => $val)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $val->order_date }}</td>
                <td>{{ $val->supplier->name }}</td>
                <td>CHL-{{ $val->chalan_reg }}</td>
                <td>৳{{ number_format($val->total, 2) }}</td>
                <td>৳{{ number_format($val->discount, 2) }}</td>
                <td>৳{{ number_format($val->vat, 2) }}</td>
                <td>৳{{ number_format($val->payable, 2) }}</td>
                <td>৳{{ number_format($val->pay, 2) }}</td>
                <td>৳{{ number_format($val->due, 2) }}</td>
                <td>
                    @switch($val->status)
                        @case(1) Ordered @break
                        @case(2) Delivered @break
                        @case(3) Canceled @break
                        @case(4) Bill Payment @break
                        @default Unknown
                    @endswitch
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4">Total</td>
                <td>৳{{$total}}/-</td>
                <td>৳{{$discount}}/-</td>
                <td>৳{{$vat}}/-</td>
                <td>৳{{$payable}}/-</td>
                <td>৳{{$pay}}/-</td>
                <td>৳{{$due}}/-</td>
            </tr>
        </tbody>
    </table>

    <div class="sign-section">
        <div class="sign-block">
            <p>----------------------</p>
            <strong>Manager Signature</strong>
        </div>
        <div class="sign-block">
            <p>----------------------</p>
            <strong>Admin Signature</strong>
        </div>
    </div>

    <div class="note">
        <p><strong>Note:</strong> This software is developed by <strong>BGMIT</strong>, created by <strong>SAMIM-HosseN</strong>. Call: +8801 62420 9291. Thank You!</p>
    </div>

    <script>
        window.onload = function () {
            window.print();
            setTimeout(() => window.close(), 300);
        };
    </script>
</body>
</html>
