<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Platform</title>
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
            Welcome to Our Platform
        </div>
        <div class="email-body">
            <p>Hi {{ $user->name }},</p>
            <p>Thank you for registering as a Service Provider on our platform.</p>
            <p>You can now log in and manage your services, update your profile, and connect with potential clients.</p>
        </div>
        <div class="email-footer">
            Best regards,<br>
            Rated Marine Services Team
        </div>
    </div>
</body>
</html>
