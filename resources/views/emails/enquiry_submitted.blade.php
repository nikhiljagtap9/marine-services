<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Enquiry Received</title>
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
            New Enquiry Received
        </div>
        <div class="email-body">
            <p><strong>Company:</strong> {{ $enquiry->company_name }}</p>
            <p><strong>Name:</strong> {{ $enquiry->your_name }}</p>
            <p><strong>Email:</strong> {{ $enquiry->email }}</p>
            <p><strong>Comment:</strong> {{ $enquiry->comment }}</p>
            @if($enquiry->photo)
                <p><strong>Photo:</strong>
                    <a href="{{ asset('storage/' . $enquiry->photo) }}" target="_blank">View Photo</a>
                </p>
            @endif
        </div>
        <div class="email-footer">
            Regards,<br>
            Rated Marine Services Team
        </div>
    </div>
</body>
</html>

