<!DOCTYPE html>
<html>
<head>
    <title>New Enquiry Submitted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f9f9f9;
        }
        .email-container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 6px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
        }
        p, li {
            color: #555;
            font-size: 15px;
        }
        .btn {
            margin-top: 15px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #155bc1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            margin-top: 25px;
            font-size: 13px;
            color: #888;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Enquiry Submitted</h2>

        <p>Dear {{ ucwords($enquiry->company_name) }},</p>

        <p>You’ve just received a new enquiry from a shipowner or manager via <strong>Rated Marine Services</strong>.</p>

        <ul>
            <li><strong>Subject:</strong> {{ $enquiry->comment ? Str::limit($enquiry->comment, 60) : 'N/A' }}</li>
            <li><strong>Port / Location:</strong> 
                {{ optional(optional($enquiry->subscription)->port)->name ?? 'N/A' }}
            </li>
        </ul>

        <p>Please log in to your dashboard to view the full message and respond as soon as possible.</p>

        <a href="{{ url('/login') }}"  style="background-color: #155bc1; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px;">View Message</a>

        <div class="footer">
            Best regards,  <br>
            Rated Marine Services Team
        </div>
    </div>
</body>
</html>


