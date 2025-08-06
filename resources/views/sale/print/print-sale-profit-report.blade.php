<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Total Sale Profit Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
            color: #000;
        }
        h1, h3, h4, h5, h6, p {
            margin: 5px 0;
            text-align: center;
        }
        hr {
            margin: 10px 0;
            border: 0;
            border-top: 1px solid #000;
        }

        .summary-boxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }
        .summary-card {
            flex: 1 1 30%;
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
            min-width: 150px;
        }
        .summary-title {
            font-size: 14px;
            color: #555;
        }
        .summary-value {
            font-size: 18px;
            font-weight: bold;
            margin-top: 5px;
        }

        .highlight-box {
            margin-top: 20px;
            border: 2px solid #28a745;
            padding: 20px;
            text-align: center;
        }
        .highlight-title {
            font-size: 16px;
            color: #555;
            margin-bottom: 5px;
        }
        .highlight-value {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
        }
        .signature-block {
            width: 45%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
            font-weight: bold;
        }

        .footer-note {
            font-size: 12px;
            margin-top: 40px;
            text-align: center;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <h1>{{ $company[0]->name }}</h1>
    <p>{{ $company[0]->address }}</p>
    <p>Mobile: {{ $company[0]->phone }} | Website: {{ $company[0]->website }}</p>

    <h3>Sale Profit Report</h3>
    <h5>Start: {{ $start }} &nbsp;&nbsp; End: {{ $end }}</h5>
    <hr>

    @php
        $grandProfit = collect($result)->flatMap(function($carts) use ($medicines) {
            return $carts->map(function($cart) use ($medicines) {
                $medicine = $medicines->firstWhere('id', $cart->medicine_id);
                return ($cart->unit_price - $medicine->purchase_price) * $cart->qty;
            });
        })->sum();
    @endphp

    <div class="highlight-box">
        <div class="highlight-title">Grand Profit</div>
        <div class="highlight-value">৳{{ number_format($grandProfit, 2) }}/-</div>
    </div>

    <h4>Order Summary</h4>
    <div class="summary-boxes">
        <div class="summary-card">
            <div class="summary-title">Total Order</div>
            <div class="summary-value">৳{{ number_format($total, 2) }}</div>
        </div>
        <div class="summary-card">
            <div class="summary-title">Discount</div>
            <div class="summary-value">৳{{ number_format($discount, 2) }}</div>
        </div>
        <div class="summary-card">
            <div class="summary-title">VAT</div>
            <div class="summary-value">৳{{ number_format($vat, 2) }}</div>
        </div>
        <div class="summary-card">
            <div class="summary-title">Payable</div>
            <div class="summary-value">৳{{ number_format($payable, 2) }}</div>
        </div>
        <div class="summary-card">
            <div class="summary-title">Paid</div>
            <div class="summary-value">৳{{ number_format($pay, 2) }}</div>
        </div>
        <div class="summary-card">
            <div class="summary-title">Due</div>
            <div class="summary-value">৳{{ number_format($due, 2) }}</div>
        </div>
    </div>

    <div class="signature-section">
        <div class="signature-block">Manager Signature</div>
        <div class="signature-block">Admin Signature</div>
    </div>

    <p class="footer-note">
        <strong>Note:</strong> This software is developed by <strong>BGMIT</strong>, created by <strong>SAMIM-HosseN</strong>.
        Call: +8801 62420 9291. Thank You!
    </p>

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
