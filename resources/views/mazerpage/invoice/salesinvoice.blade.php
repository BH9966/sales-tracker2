<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Invoice — Sales Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    /* ===== Reset & base ===== */
    *, *::before, *::after { box-sizing: border-box; }
    html, body { margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial; color: #222; background: #f5f7fb; }
    a { color: inherit; text-decoration: none; }

    /* ===== Page layout ===== */
    .wrap { max-width: 1000px; margin: 30px auto; padding: 24px; background: #fff; border-radius: 12px; box-shadow: 0 6px 30px rgba(20,30,60,0.08); }
    .toolbar { display:flex; justify-content:space-between; gap:10px; margin-bottom:16px; align-items:center; flex-wrap:wrap; }
    .btn { padding:8px 14px; border-radius:8px; border:1px solid rgba(34,34,34,0.08); background:#fff; cursor:pointer; font-weight:600; }
    .btn.primary { background:#1f6feb; color:#fff; border-color:transparent; }
    .btn.ghost { background:transparent; }

    /* ===== Header ===== */
    .invoice-header { display:flex; justify-content:space-between; align-items:flex-start; gap:20px; margin-bottom:18px; flex-wrap:wrap; }
    .brand { display:flex; gap:14px; align-items:center; flex:1; }
    .brand img { width:88px; height:88px; object-fit:contain; border-radius:10px; background:#f0f3ff; padding:8px; }
    .company { font-weight:700; font-size:18px; line-height:1.2; }
    .company small { display:block; font-weight:500; color:#666; margin-top:4px; font-size:13px; }

    .meta { text-align:right; min-width:220px; }
    .meta .title { font-size:14px; color:#555; font-weight:700; }
    .meta .meta-row { margin-top:6px; font-size:14px; color:#333; }
    .meta .muted { color:#777; font-size:13px; }

    /* ===== Items table (scrollable) ===== */
    .table-wrapper { width:100%; overflow-x:auto; margin-bottom:16px; }
    .items { width:100%; min-width:800px; border-collapse: collapse; }
    .items thead th { text-align:left; padding:12px; font-weight:700; font-size:13px; border-bottom:2px solid #eef2f7; color:#222; white-space:nowrap; }
    .items tbody td { padding:12px; border-bottom:1px solid #f0f3f7; vertical-align:middle; font-size:14px; color:#222; }
    .items tbody tr:nth-child(even){ background: rgba(31,111,235,0.02); }
    .items .right { text-align:right; }
    .items .center { text-align:center; }

    /* ===== Totals ===== */
    .totals { display:flex; justify-content:flex-end; margin-top:10px; }
    .totals .summary { width:360px; max-width:100%; }
    .totals table { width:100%; border-collapse:collapse; }
    .totals td { padding:8px 10px; font-size:14px; }
    .totals .label { color:#666; }
    .totals .amount { text-align:right; font-weight:700; }

    /* ===== Footer / notes ===== */
    .notes { margin-top:18px; display:flex; justify-content:space-between; gap:16px; align-items:flex-start; flex-wrap:wrap; }
    .notes .left { color:#555; font-size:13px; flex:1; }
    .signature { text-align:center; min-width:220px; padding:12px; border-radius:8px; background: #fafbfd; border:1px dashed rgba(34,34,34,0.06); }
    .signature small { display:block; color:#666; font-size:12px; margin-top:6px; }

    /* ===== Responsive ===== */
    @media (max-width:700px){
      .meta { text-align:left; margin-top:10px; }
      .invoice-header { flex-direction:column; align-items:flex-start; }
      .totals { justify-content:center; }
      .totals .summary { width:100%; }
      .company { font-size:16px; }
      .items thead th, .items tbody td { font-size:12px; padding:8px; }
    }

    /* ===== Print styles ===== */
    @media print{
      body { background: #fff; }
      .wrap { box-shadow:none; border-radius:0; margin:0; }
      .toolbar { display:none; }
      a[href]:after { content: " (" attr(href) ")"; font-size:10px; color:#666; }
      .items thead th, .items tbody td { font-size:12px; }
    }
  </style>
</head>
<body>
  <div class="wrap" id="invoice">
    <header class="invoice-header">
      <div class="brand">
        <img   src="{{asset('template/images/logo/logo.png')}}" alt="Logo" />
        <div>
          <div class="company">AM PARK <small>Sales Report</small></div>
          <div style="margin-top:6px; font-size:13px; color:#666;">ampark.co.tz</div>
        </div>
      </div>

      <div class="meta">
        <div class="title">INVOICE</div>
        <div class="meta-row"><span class="muted">Date:</span> <strong>{{date('y-m-d')}}</strong></div>
        
      </div>
    </header>

    <!-- Items table with wrapper for responsiveness -->
    <div class="table-wrapper">
      <table class="items" aria-label="Invoice items">
        <thead>
          <tr>
            <th>N/D</th>
            <th class="center">Muuzaji</th>
            <th class="center">Biashara</th>
            <th class="center">Tarehe</th>
            <th class="center">Mauzo</th>
            <th class="center">Garama</th>
            <th class="center">Maelezo</th>
            <th class="center">Cash Mpya</th>
            <th class="center">Cash Jana</th>
            <th class="center">Cash Leo</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($data as $values)
            <tr>
              <td>{{$values->id}}</td>
              <td>{{$values->user->name}}</td>
              <td>{{$values->business->name}}</td>
              <td>{{ \Carbon\Carbon::parse($values->sale_date)->format('Y-m-d') }}</td>
              <td>{{number_format($values->total_sales, 2, '.',',')}}</td>
              <td>{{  number_format($values->cost, '2','.',',')  }}</td>
              <td>{{$values->cost_description}}</td>
              <td>{{ number_format( $values->total_sales - $values->cost , '2','.',',')}}</td>
              <td>{{ number_format($values->cash_mkononi_jana,'2','.',',')  }}</td>
              <td>{{ number_format( ($values->total_sales - $values->cost) + $values->cash_mkononi_jana ,'2','.',',')}}</td>
              <td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>


    <footer style="margin-top:18px; color:#888; font-size:12px; text-align:center;">
      AM PARK &copy;
    </footer>
  </div>

</body>
</html>
