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
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background: #007bff;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
        }
        .credentials {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .credentials p {
            margin: 10px 0;
            font-size: 16px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            padding: 20px;
            border-top: 1px solid #eee;
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
            <p>We are pleased to inform you that your vendor account has been successfully approved! You can now access our vendor portal to manage your services and interact with our platform.</p>

            <div class="credentials">
                <h3>Your Login Credentials</h3>
                <p><strong>Email:</strong> {{ $vendor->email }}</p>
                <p><strong>Password:</strong> {{ $password }}</p>
                <p>Please use these credentials to log in to the vendor portal. For security reasons, we recommend changing your password after your first login.</p>
            </div>

            <p><a href="{{ url('/shop/login') }}" class="button">Log In to Vendor Portal</a></p>

            <p>If you have any questions or need assistance, please contact our support team at support@example.com.</p>
            <p>Thank you for joining our platform!</p>
            <p>Best regards,<br>The [Your Company Name] Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} [Your Company Name]. All rights reserved.</p>
            <p>If you did not register for this account, please contact us immediately.</p>
        </div>
    </div>
</body>
</html>
