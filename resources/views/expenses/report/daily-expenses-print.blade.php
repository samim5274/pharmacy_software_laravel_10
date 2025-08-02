<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Specific Expenses Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    @media print {
      body {
        -webkit-print-color-adjust: exact;
        background: #fff;
      }
      .no-print {
        display: none !important;
      }
      thead th {
        background-color: #007bff !important;
        color: #fff !important;
      }
      .table-info {
        background-color: #d1ecf1 !important;
      }
      .invoice-wrapper {
        box-shadow: none;
        padding: 0;
      }
    }

    body {
      font-family: "DejaVu Sans", "Helvetica", Arial, sans-serif;
      background-color: #f1f4f9;
      color: #1f2d3a;
      margin: 0;
      padding: 0;
      font-size: 14px;
      line-height: 1.35;
    }

    .invoice-wrapper {
      max-width: 900px;
      margin: 0 auto;
      padding: 24px 16px;
    }

    .invoice-box {
      text-align: center;
      margin-bottom: 8px;
    }

    .invoice-box h2 {
      margin-bottom: 4px;
      font-size: 28px;
      font-weight: 700;
    }

    .invoice-box p {
      margin: 2px 0;
      font-size: 14px;
    }

    .report-title {
      font-size: 22px;
      font-weight: 700;
      margin: 6px 8px 6px;
      position: relative;
      display: inline-block;
    }

    .report-title::after {
      content: "";
      display: block;
      width: 120px;
      height: 3px;
      background: #0d6efd;
      margin: 6px auto 0;
      border-radius: 2px;
    }

    .note-mark {
      display: inline-block;
      background: #fff8e5;
      padding: 6px 12px;
      border-radius: 5px;
      border: 1px solid #ffe8b5;
      font-size: 12px;
      margin-top: 6px;
    }

    .qrImg {
      display: inline-flex;
      margin-top: 12px;
      padding: 8px;
      border: 1px dashed #adb5bd;
      border-radius: 6px;
      background: #f9fafb;
      font-size: 12px;
      min-width: 120px;
      min-height: 120px;
      align-items: center;
      justify-content: center;
      color: #6c757d;
      position: relative;
    }

    .table-container {
      background: #fff;
      padding: 16px;
      border-radius: 8px;
      box-shadow: 0 10px 28px rgba(31,45,58,0.06);
      margin-top: 12px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 12px;
      font-size: 13px;
    }

    thead th {
      background-color: #007bff;
      color: #fff;
      text-align: center;
      vertical-align: middle;
      padding: 10px;
    }

    tbody td {
      vertical-align: middle;
      padding: 8px 10px;
    }

    .table-info {
      font-weight: 600;
      background-color: #d1ecf1;
      color: #0c5460;
    }

    .signature-section {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 30px;
      margin-top: 60px;
      page-break-inside: avoid;
    }

    .signature-block {
      flex: 1 1 45%;
      text-align: center;
    }

    .signature-line {
      width: 60%;
      margin: 0 auto 6px;
      border-top: 1.5px solid #000;
      padding-top: 4px;
      font-size: 14px;
      font-weight: 600;
    }

    .footer-note {
      font-size: 12px;
      color: #6c757d;
      margin-top: 30px;
    }

    .badge-total {
      background: none;
      font-size: 14px;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="invoice-wrapper">
    <!-- Header -->
    <div class="invoice-box">
      <h1 style="text-align:center;">{{$company[0]->name}}</h1>
      <p style="text-align:center;">{{$company[0]->address}}</p>
      <p style="text-align:center;">Mobaile: {{$company[0]->phone}}  website: {{$company[0]->website}}</p>
      <div class="report-title">Expenses Print</div>
    </div>

    <hr />

    <!-- Table -->
    <div class="table-container">
      <table id="printableTable">
        <thead>
          <tr>
            <th style="width:40px;">#</th>
            <th>Date</th>
            <th>User</th>
            <th>Category</th>
            <th>Sub-Category</th>
            <th>Remark</th>
            <th class="text-end">Amount (৳)</th>
          </tr>
        </thead>
        <tbody>
          @php $grand = 0; @endphp
          @foreach($expenses as $key => $val)
            @php $grand += $val->amount; @endphp
            <tr>
              <td class="text-center">{{ $key + 1 }}</td>
              <td>{{ $val->date }}</td>
              <td>{{ $val->user->name ?? '' }}</td>
              <td>{{ $val->category->name ?? '' }}</td>
              <td>{{ $val->subcategory->name ?? '' }}</td>
              <td>{{ $val->remark }}</td>
              <td class="text-end">৳{{ number_format($val->amount, 2) }}</td>
            </tr>
          @endforeach
          <tr class="table-info">
            <td colspan="6" class="text-end">Total:</td>
            <td class="text-end">৳{{ number_format($total ?? $grand, 2) }}/-</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Signatures -->
    <div class="signature-section">
      <div class="signature-block">
        <div class="signature-line"></div>
        <div>Manager Signature</div>
      </div>
      <div class="signature-block">
        <div class="signature-line"></div>
        <div>Admin Signature</div>
      </div>
    </div>

    <p class="footer-note">
      <strong>Note:</strong> This Software develop by <strong>BGMIT</strong> created by <strong>SAMIM-HosseN</strong>. Call: +8801 62420 9291. Thank You!
    </p>
  </div>

  <script>
    window.addEventListener('load', function () {
      window.print();
      setTimeout(function () {
        window.close();
      }, 500);
    });
  </script>
</body>
</html>
