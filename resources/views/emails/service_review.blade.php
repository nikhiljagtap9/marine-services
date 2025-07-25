<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Service Review</title>
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
        .email-body p, .email-body li {
            font-size: 16px;
            color: #555555;
            margin: 12px 0;
        }
        .email-body a {
            color: white;
            background-color: #155bc1;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
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
            New Service Review
        </div>
        <div class="email-body">
           <p>Dear {{ ucwords($review->userServiceProvider->serviceProviderDetail->company_name ?? '') }} </p>

            <p>You've received a new review from a client who recently received your services via <strong>Rated Marine Services</strong>.</p>

            <ul>
                <li><strong>Company Name:</strong> {{ ucwords($review->vessel_company_name) ?? '' }}</li>
                <li><strong>Port:</strong> {{ $review->port->name ?? 'N/A' }}</li>
                <li><strong>Rating:</strong> {{ $review->rating }} out of 5 Stars</li>
                @if(!empty($review->comment))
                    <li><strong>Comment:</strong> "{{ $review->comment }}"</li>
                @endif
            </ul>

            <p>Your professional performance matters. Acknowledge feedback and keep building trust with the maritime community.</p>

            <p>
                <a href="{{ url('/login') }}">View Full Review</a>
            </p>

            <p>Thank you for being part of our trusted provider network.</p>
        </div>
        <div class="email-footer">
            Best regards,<br>
            Services
        </div>
    </div>
</body>
</html>
