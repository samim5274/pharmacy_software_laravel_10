<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Total Sale Report</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <style>
        /* Base */
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
            color: #222;
        }
        h1, h3 {
            margin: 0;
            padding: 0;
            line-height: 1.1;
        }
        h1 {
            font-size: 24px;
        }
        h3 {
            font-size: 16px;
            margin-top: 4px;
        }
        p {
            margin: 2px 0;
        }
        .text-center { text-align: center; }

        .invoice-box {
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            page-break-inside: auto;
        }
        thead {
            background: #f4f4f4;
        }
        thead th {
            padding: 8px;
            border: 1px solid #999;
            font-weight: 600;
            font-size: 12px;
        }
        tbody td, tfoot td {
            padding: 6px 8px;
            border: 1px solid #999;
            font-size: 12px;
            vertical-align: top;
        }
        tbody tr {
            page-break-inside: avoid;
        }
        tfoot tr {
            background: #efefef;
            font-weight: 600;
        }

        .company-info {
            margin-bottom: 4px;
        }

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
            min-height: 60px;
        }

        /* Print */
        @media print {
            body {
                padding: 0;
            }
            .signature-section {
                margin-top: 100px;
            }
            thead { display: table-header-group; } /* repeat header */
            tfoot { display: table-footer-group; }
            .no-print { display: none; }
            @page {
                size: A4 portrait;
                margin: 15mm 12mm;
            }
        }
    </style>
</head>
<body>

    <div class="invoice-box">
        <div class="text-center">
            <h1>{{ $company[0]->name }}</h1>
            <div class="company-info">
                <p>{{ $company[0]->address }}</p>
                <p>Mobile: {{ $company[0]->phone }} &nbsp; | &nbsp; Website: {{ $company[0]->website }}</p>
                <p>Category wise total Expenses betwwen {{$start}} to {{$end}}</p>
                <!-- <p>Print Date: {{ \Carbon\Carbon::now()->format('F j, Y') }}</p> -->
            </div>
        </div>

        <hr>

        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub-Category</th>
                    <th scope="col">Amount (৳)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $val)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $val->date }}</td>
                        <td>{{ $val->category->name }}</td>
                        <td>{{ $val->subcategory->name }}</td>
                        <td>৳{{ number_format($val->amount, 2) }}/-</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4">Total</td>
                    <td>৳{{ number_format($total) }}/-</td>
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

    <p class="note"><strong>Note:</strong> This software developed by <strong>BGMIT</strong> created by <strong>SAMIM-HosseN</strong>. Call: +8801 62420 9291. Thank You!</p>

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
