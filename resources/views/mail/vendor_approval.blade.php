<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Approval Notification</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 650px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }
        .header {
            background-color: #004085;
            color: #ffffff;
            padding: 25px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.7;
            margin: 15px 0;
        }
        .credentials {
            background-color: #e9ecef;
            padding: 20px;
            border-left: 5px solid #007bff;
            border-radius: 6px;
            margin: 25px 0;
        }
        .credentials h3 {
            margin-top: 0;
            font-size: 18px;
            color: #0056b3;
        }
        .credentials p {
            margin: 8px 0;
            font-size: 15px;
        }
        .note {
            font-size: 14px;
            color: #dc3545;
            margin-top: 10px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            background-color: #f8f9fa;
            text-align: center;
            font-size: 13px;
            color: #6c757d;
            padding: 20px;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Vendor Account Approved</h1>
        </div>
        <div class="content">
            <p>Dear {{ $vendor->name }},</p>
            <p>We’re excited to inform you that your vendor account has been successfully approved! You now have access to our vendor portal where you can manage your services, track orders, and engage with our platform's features.</p>

            <div class="credentials">
                <h3>Your Login Details</h3>
                <p><strong>Email:</strong> {{ $vendor->email }}</p>
                <p><strong>Password:</strong> 123456</p>
                <p class="note">Note: This is a default password. For your account’s security, please change it immediately after logging in.</p>
            </div>

            <p><a href="{{ url('/shop/login') }}" class="button">Access Vendor Portal</a></p>

            <p>If you need any help or support, feel free to reach out to our team at <a href="mailto:support@example.com">support@example.com</a>.</p>
            <p>Welcome aboard!</p>
            <p>Best regards,<br><strong>The TechDoko Team</strong></p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} [Your Company Name]. All rights reserved.</p>
            <p>If you did not request this account, please contact us immediately.</p>
        </div>
    </div>
</body>
</html>
