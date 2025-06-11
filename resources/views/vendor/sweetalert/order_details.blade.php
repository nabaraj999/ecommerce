<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Voucher</title>
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

        .order-details, .vendor-details, .product-details, .address-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }

        .order-details p, .vendor-details p, .product-details p, .address-details p {
            margin: 5px 0;
            color: #333333;
        }

        .order-details strong, .vendor-details strong, .product-details strong, .address-details strong {
            color: #4CAF50;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .product-table th {
            background-color: #4CAF50;
            color: #ffffff;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            color: #999999;
            font-size: 12px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #4CAF50;
            color: #ffffff !important;
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
            <h1>Order Voucher</h1>
        </div>
        <div class="content">
            <div class="order-details">
                <h2>Order Details</h2>
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
            </div>

            <div class="product-details">
                <h2>Products</h2>
                <table class="product-table">
                    <tr>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Amount</th>
                    </tr>
                    @foreach ($order->order_descriptions as $des)
                        <tr>
                            <td>{{ $des->product->name }}</td>
                            <td>{{ $des->product->brand }}</td>
                            <td>{{ $des->qty }}</td>
                            <td>${{ $des->product->price }}</td>
                            <td>{{ $des->product->discount }}%</td>
                            <td>${{ $des->amount }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="address-details">
                <h2>Delivery Information</h2>
                <p><strong>Address:</strong> {{ $order->available_address->address }}</p>
                <p><strong>Delivery Price:</strong> ${{ $order->available_address->price }}</p>
                <p><strong>Address Note:</strong> {{ $order->address_note }}</p>
                <p><strong>Contact:</strong> {{ $order->contact }}</p>
            </div>

        </div>
        <div class="footer">
            <p>Thank you for your order! Contact us for any inquiries.</p>
        </div>
    </div>
</body>
</html>
