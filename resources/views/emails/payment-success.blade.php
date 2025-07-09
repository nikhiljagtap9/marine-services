<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>
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
            color: #28a745;
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
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            ✅ Payment Successful
        </div>
        <div class="email-body">
            <p><strong>Dear {{ auth()->user()->name }},</strong></p>
            <p>Your payment was successful. Below are the details:</p>

            <p><strong>Payment ID:</strong> {{ $payment->payment_id }}</p>
            <p><strong>Amount Paid:</strong> {{ $payment->paid_price }} {{ $payment->currency }}</p>
            <p><strong>Card:</strong> {{ $payment->card_type }} (**** {{ $payment->last_four_digits }})</p>
            <p><strong>Plan Valid Till:</strong> {{ \Carbon\Carbon::parse($subscription->end_date)->format('d M, Y') }}</p>
        </div>
        <div class="email-footer">
            Thank you for choosing us,<br>
            Rated Marine Services Team
        </div>
    </div>
</body>
</html>
