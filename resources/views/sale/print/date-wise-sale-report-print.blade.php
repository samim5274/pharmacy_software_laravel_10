<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Total Sale Report</title>
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
        <h1 style="text-align:center;">{{$company[0]->name}}</h1>
        <p style="text-align:center;">{{$company[0]->address}}</p>
        <p style="text-align:center;">Mobaile: {{$company[0]->phone}}  website: {{$company[0]->website}}</p>
        <h3 style="text-align:center;">Date wise Sale Report</h3>
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
                            <span class="badge bg-success">Paid</span>
                        @elseif($val->status == 1)
                            <span class="badge bg-warning">Return</span>
                        @else
                            <span class="badge bg-danger">Due</span>
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
