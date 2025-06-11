<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #333333;
            font-size: 20px;
            margin-top: 0;
        }

        .content p {
            color: #666666;
            line-height: 1.6;
            margin: 10px 0;
        }

        .vendor-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }

        .vendor-details p {
            margin: 5px 0;
            color: #333333;
        }

        .vendor-details strong {
            color: #4CAF50;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            color: #999999;
            font-size: 12px;
        }

        a {
            color: white !important;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>New Order Request</h1>
        </div>
        <div class="content">
            <h2>Dear Vendor,</h2>
            <p>A new order has submitted a request to join our platform. Please review the details below:</p>

            @foreach ($order->order_descriptions as $des)
                <div class="vendor-details">
                    <p><strong>Product Name:</strong> {{ $des->product->name }}</p>
                </div>
            @endforeach

            <div class="vendor-details">
                <p><strong>Total Amount:</strong> {{ $order->total_amount }}</p>
            </div>

            <p>Please take appropriate action to review and approve this vendor request. You can access the admin panel
                for further details.</p>

            <a href="{{ url('/admin/vendors') }}" class="button">View Vendor Requests</a>
        </div>
        <div class="footer">
            <p>This is an automated email, please do not reply directly. Contact support for assistance.</p>
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
