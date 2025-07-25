@php
    $planName = ucfirst($payment->plan->name); // e.g., Silver / Gold / Platinum
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Failed</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            font-size: 22px;
            color: #dc3545;
            margin-bottom: 25px;
            font-weight: bold;
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 10px;
        }
        .email-body p {
            font-size: 16px;
            color: #333;
            margin: 12px 0;
        }
        .email-footer {
            margin-top: 30px;
            font-size: 14px;
            color: #888888;
            border-top: 1px solid #eeeeee;
            padding-top: 15px;
        }
        .retry-btn {
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        Payment Success
    </div>
    <div class="email-body">
<p>Dear {{ ucfirst(auth()->user()->name) }},</p>

<p>We’re pleased to confirm that your payment was successful, and your membership has been activated/renewed.</p>

<ul>
    <li><strong>Payment Status:</strong> <span style="color: green;">SUCCESS</span></li>
    <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($payment->created_at)->format('d M Y') }}</li>
    <li><strong>Plan:</strong> {{ $planName }}</li>
</ul>

<p>Your company is now visible on the platform with all included features and priority listings.</p>

<p>
    <strong>View Your Profile:</strong><br> 
</p>

<p>Thank you for being part of <strong>Rated Marine Services</strong>.</p>
</div>
    <div class="email-footer">
        Kind regards,<br>
        <strong>Rated Marine Services Team</strong>
    </div>
</div>
</body>
</html>

