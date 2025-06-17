<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Approval Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .header h1 {
            color: #2c3e50;
            margin: 0;
        }
        .content {
            padding: 20px 0;
        }
        .credentials {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .credentials p {
            margin: 5px 0;
            font-size: 16px;
        }
        .credentials strong {
            color: #2c3e50;
        }
        .button {
            text-align: center;
            margin: 20px 0;
        }
        .button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .button a:hover {
            background-color: #2980b9;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Vendor Approval Notification</h1>
        </div>
        <div class="content">
            <p>Dear {{ $vendor->name }},</p>
            <p>We are pleased to inform you that your vendor account has been successfully approved! You can now log in to our platform using the credentials provided below.</p>

            <div class="credentials">
                <p><strong>Email:</strong> {{ $vendor->email }}</p>
                <p><strong>Password:</strong> {{ $password }}</p>
            </div>

            <p>For security reasons, we recommend changing your password after your first login.</p>

            <div class="button">
                <a href="{{ url('/shop/login') }}">Log In to Your Account</a>
            </div>

            <p>If you have any questions or need assistance, please contact our support team at support@example.com.</p>
            <p>Thank you for joining our platform!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
