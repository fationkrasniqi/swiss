<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Client Request #{{ $client->id }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: DejaVu Sans, Arial, sans-serif; 
            font-size: 13px; 
            color: #1f2937;
            padding: 40px;
            background: #f9fafb;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 40px;
        }
        .header { 
            text-align: center; 
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #2563eb;
        }
        .header h1 {
            font-size: 28px;
            color: #111827;
            margin-bottom: 8px;
        }
        .header p {
            font-size: 14px;
            color: #6b7280;
        }
        .section { 
            margin-bottom: 24px;
            padding: 16px;
            background: #f9fafb;
            border-radius: 8px;
            border-left: 4px solid #2563eb;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .info-row { 
            display: flex;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .label { 
            font-weight: bold; 
            width: 140px;
            color: #374151;
            flex-shrink: 0;
        }
        .value {
            color: #111827;
            flex: 1;
        }
        .services-list {
            background: #ffffff;
            padding: 12px;
            border-radius: 6px;
            line-height: 1.6;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e5e7eb;
            text-align: center;
            font-size: 11px;
            color: #9ca3af;
        }
        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #1e40af;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
        }
        @media print {
            body { padding: 20px; background: #fff; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Client Service Request</h1>
            <p>Request ID: <span class="badge">#{{ $client->id }}</span></p>
        </div>

        <div class="section">
            <div class="section-title">Client Information</div>
            <div class="info-row">
                <span class="label">Full Name:</span>
                <span class="value">{{ $client->first_name }} {{ $client->last_name }}</span>
            </div>
            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value">{{ $client->email }}</span>
            </div>
            <div class="info-row">
                <span class="label">Phone:</span>
                <span class="value">{{ $client->phone_prefix }} {{ $client->phone_number }}</span>
            </div>
            <div class="info-row">
                <span class="label">Canton:</span>
                <span class="value">{{ $client->canton }}</span>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Service Details</div>
            <div class="info-row">
                <span class="label">Services:</span>
                <span class="value services-list">{{ $client->services }}</span>
            </div>
            <div class="info-row">
                <span class="label">Hours Requested:</span>
                <span class="value">{{ $client->hours }} hours</span>
            </div>
            @if($client->service_date)
            <div class="info-row">
                <span class="label">Service Date:</span>
                <span class="value">{{ \Carbon\Carbon::parse($client->service_date)->format('d M Y') }}</span>
            </div>
            @endif
            <div class="info-row">
                <span class="label">Total Price:</span>
                <span class="value" style="font-weight:bold;color:#059669;font-size:16px">{{ $client->total_price }} CHF</span>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Request Information</div>
            <div class="info-row">
                <span class="label">Submitted On:</span>
                <span class="value">{{ $client->created_at->format('l, F j, Y \a\t g:i A') }}</span>
            </div>
        </div>

        <div class="footer">
            <p>This document was generated automatically from the client management system.</p>
            <p>© {{ date('Y') }} - All rights reserved</p>
        </div>
    </div>

    <script>
        // Auto-trigger download when page loads (only in browser preview)
        if (window.location.search.includes('download=1')) {
            window.print();
        }
    </script>
</body>
</html>
