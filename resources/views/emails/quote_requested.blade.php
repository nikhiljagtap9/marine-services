<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Quote Request</title>
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
            color: #333333;
            margin-bottom: 25px;
            font-weight: bold;
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 10px;
        }
        .email-body p {
            font-size: 16px;
            color: #555555;
            margin: 12px 0;
        }
        .email-body a {
            color: #007BFF;
            text-decoration: none;
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
            New Quote Request
        </div>
        <div class="email-body">
            <p>Dear {{ ucwords($quote->company_name) }},</p>

            <p>A shipowner or manager has requested a quote from your company via Rated Marine Services.</p>

            <ul>
                <li><strong>Service Category:</strong> {{ implode(', ', $quote->category_names ?? []) }}</li>
                <li><strong>Shipowner/Manager Name:</strong> {{ ucwords($quote->requester_name) }}</li>
                <li><strong>Location:</strong> {{ $quote->port_name }}</li>
                <li><strong>Date:</strong> {{ $quote->request_date }}</li>
            </ul>

            <p>Please log in to your dashboard to view the full request and provide your offer promptly.</p>

            <p>
                <a href="{{ url('/login') }}" style="background-color: #155bc1; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px;">
                    View Request
                </a>
            </p>

            <p>Fast response increases your chances of selection!</p>


        </div>
        <div class="email-footer">
            Kind regards,<br>
            Rated Marine Services
        </div>
    </div>
</body>
</html>
