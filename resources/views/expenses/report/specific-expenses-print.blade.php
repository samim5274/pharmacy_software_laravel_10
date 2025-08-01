<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Specific Expenses Report</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    @media print {
      .no-print { display: none !important; }
      body { background: #fff; }
      .invoice-container { box-shadow: none; }
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
      max-width: 820px;
      margin: 0 auto;
      padding: 24px 16px;
    }

    .invoice-header {
      background: #fff;
      padding: 18px 24px;
      border-radius: 8px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 12px;
      align-items: flex-start;
      margin-bottom: 20px;
      box-shadow: 0 4px 18px rgba(0,0,0,0.04);
    }

    .company-info {
      flex: 1 1 320px;
    }

    .company-info h2 {
      margin: 0;
      font-size: 26px;
      font-weight: 700;
    }

    .company-info p {
      margin: 4px 0;
      font-size: 13px;
    }

    .report-title {
      flex: 1 1 100%;
      text-align: center;
      font-size: 22px;
      font-weight: 700;
      margin: 8px 0 4px;
      position: relative;
      display: inline-block;
    }

    .report-title::after {
      content: "";
      display: block;
      width: 140px;
      height: 3px;
      background: #0d6efd;
      margin: 6px auto 0;
      border-radius: 2px;
    }

    .note {
      background: #fff8e5;
      border: 1px solid #ffe8b5;
      padding: 10px 14px;
      border-radius: 5px;
      font-size: 12px;
      margin-top: 6px;
      max-width: 100%;
    }

    .qr-box {
      flex: 0 0 140px;
      text-align: center;
      background: #f9fbfd;
      border: 1px dashed #c7d2e0;
      border-radius: 6px;
      padding: 10px;
      font-size: 12px;
      position: relative;
    }

    .qr-box .label {
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
    }

    .qr-placeholder {
      width: 100px;
      height: 100px;
      background: #e9ecef;
      margin: 0 auto;
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #6c757d;
      font-size: 12px;
    }

    .invoice-card {
      background: #fff;
      border-radius: 10px;
      padding: 28px 32px;
      margin-bottom: 32px;
      box-shadow: 0 10px 28px rgba(31,45,58,0.06);
      position: relative;
    }

    .info-row {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-bottom: 8px;
    }

    .info-item {
      flex: 1 1 200px;
      font-size: 14px;
    }

    .info-label {
      font-weight: 600;
      color: #343a40;
    }

    .info-value {
      margin-left: 4px;
      color: #1f2d3a;
    }

    .amount-box {
      text-align: right;
      font-size: 1.95rem;
      font-weight: 700;
      color: #0d6efd;
      border-top: 2px dashed #dee2e6;
      padding-top: 20px;
      margin-top: 20px;
    }

    .signature-section {
      margin-top: 60px;
      display: flex;
      gap: 40px;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .signature-block {
      flex: 1 1 45%;
      text-align: center;
    }

    .signature-line {
      width: 60%;
      margin: 0 auto;
      border-top: 1.5px solid #000;
      padding-top: 8px;
      font-size: 13px;
      font-weight: 600;
      margin-bottom: 4px;
    }

    .small-muted {
      font-size: 12px;
      color: #6c757d;
    }
  </style>
</head>
<body>
  <div class="invoice-wrapper">
    <!-- Header -->
    <div class="invoice-header text-center">
      <div class="company-info">
        <h2>Abir Pharmacy</h2>
        <p>House #02, Road #11, Sector #6, Uttara, Dhaka-1230</p>
        <p class="small-muted"><em>All company info pulled from <strong>company_info</strong> table.</em></p>
      </div>

      <div class="qr-box">
        <span class="label">QR Code</span>
        <div class="qr-placeholder">QR</div>
      </div>

      <div class="w-100 text-center">
        <div class="report-title">Expenses Print</div>
        <div class="note mt-2">
          <strong>Note:</strong> সমস্ত কোম্পানির তথ্য ডাটাবেজের <code>company_info</code> টেবিল থেকে নেওয়া হয়েছে।
        </div>
      </div>
    </div>

    <!-- Expense Loop -->
    @foreach($expenses as $val)
      <div class="invoice-card">
        <div class="info-row">
          <div class="info-item">
            <span class="info-label">Date:</span>
            <span class="info-value">{{ $val->date }}</span>
          </div>
          <div class="info-item">
            <span class="info-label">User:</span>
            <span class="info-value">{{ $val->user->name ?? '' }}</span>
          </div>
        </div>

        <div class="info-row">
          <div class="info-item">
            <span class="info-label">Category:</span>
            <span class="info-value">{{ $val->category->name ?? '' }}</span>
          </div>
          <div class="info-item">
            <span class="info-label">Subcategory:</span>
            <span class="info-value">{{ $val->subcategory->name ?? '' }}</span>
          </div>
          <div class="info-item">
            <span class="info-label">Remark:</span>
            <span class="info-value">{{ $val->remark ?? 'N/A' }}</span>
          </div>
        </div>

        <div class="amount-box">
          ৳{{ number_format($val->amount, 2) }}/-
        </div>
      </div>
    @endforeach

    <!-- Signature Section -->
    <div class="signature-section">
      <div class="signature-block">
        <div class="signature-line"></div>
        <div class="small-muted">Prepared By</div>
      </div>
      <div class="signature-block">
        <div class="signature-line"></div>
        <div class="small-muted">Approved By</div>
      </div>
    </div>
  </div>

  <script>
    window.addEventListener('load', function() {
      window.print();
      setTimeout(() => window.close(), 500);
    });
  </script>
</body>
</html>
