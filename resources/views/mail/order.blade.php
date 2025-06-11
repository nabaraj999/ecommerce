<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order Notification</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f5f5f5;">
    <div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">

        <!-- Header -->
        <div style="background: linear-gradient(135deg, #4f46e5, #7c3aed); color: white; padding: 40px 30px; text-align: center;">
            <div style="display: inline-block; width: 60px; height: 60px; background-color: rgba(255, 255, 255, 0.2); border-radius: 15px; margin-bottom: 20px; position: relative;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px;">📦</div>
            </div>
            <h1 style="margin: 0; font-size: 28px; font-weight: bold;">New Order Received</h1>
            <p style="margin: 10px 0 0 0; font-size: 16px; opacity: 0.9;">Order notification for vendor review</p>
        </div>

        <!-- Content -->
        <div style="padding: 40px 30px;">

            <!-- Greeting -->
            <h2 style="color: #1f2937; font-size: 24px; margin: 0 0 15px 0;">Dear User,</h2>
            <p style="color: #6b7280; font-size: 16px; line-height: 1.6; margin: 0 0 30px 0;">
                You have received a new order that requires your attention. Please review the order details below.
            </p>

            <!-- Order Details -->
            <div style="background-color: #f9fafb; border-radius: 10px; padding: 25px; margin-bottom: 30px;">
                <h3 style="color: #1f2937; font-size: 20px; margin: 0 0 20px 0; display: flex; align-items: center;">
                    📋 Order Details
                </h3>

                <!-- Order Info Grid -->
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 50%; padding: 15px; vertical-align: top;">
                            <div style="background-color: white; border-radius: 8px; padding: 20px; height: 100%; border-left: 4px solid #3b82f6;">
                                <div style="color: #6b7280; font-size: 14px; margin-bottom: 5px;">Order ID</div>
                                <div style="color: #1f2937; font-size: 20px; font-weight: bold;">#{{ $order->id }}</div>
                            </div>
                        </td>
                        <td style="width: 50%; padding: 15px; vertical-align: top;">
                            <div style="background-color: white; border-radius: 8px; padding: 20px; height: 100%; border-left: 4px solid #10b981;">
                                <div style="color: #6b7280; font-size: 14px; margin-bottom: 5px;">Total Amount</div>
                                <div style="color: #1f2937; font-size: 20px; font-weight: bold;">RS.{{ number_format($order->total_amount, 2) }}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 15px; vertical-align: top;">
                            <div style="background-color: white; border-radius: 8px; padding: 20px; border-left: 4px solid #f59e0b;">
                                <div style="color: #6b7280; font-size: 14px; margin-bottom: 5px;">Payment Method</div>
                                <div style="color: #1f2937; font-size: 18px; font-weight: bold; text-transform: capitalize;">{{ $order->payment_method }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Products Section -->
            <div style="background-color: #f9fafb; border-radius: 10px; padding: 25px; margin-bottom: 30px;">
                <h3 style="color: #1f2937; font-size: 20px; margin: 0 0 20px 0;">
                    🛍️ Ordered Products
                </h3>

                @foreach ($order->order_descriptions as $index => $des)
                <div style="background-color: white; border-radius: 8px; padding: 20px; margin-bottom: 15px; border: 1px solid #e5e7eb;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td style="width: 60px; vertical-align: top;">
                                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #ddd6fe, #c4b5fd); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                                    📦
                                </div>
                            </td>
                            <td style="padding-left: 15px; vertical-align: top;">
                                <div style="color: #1f2937; font-size: 18px; font-weight: bold; margin-bottom: 5px;">
                                    {{ $des->product->name }}
                                </div>
                                <div style="color: #6b7280; font-size: 14px;">
                                    Product Item #{{ $index + 1 }}
                                </div>
                            </td>
                            <td style="text-align: right; vertical-align: top;">
                                <span style="background-color: #dcfce7; color: #166534; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: bold;">
                                    NEW ORDER
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>

            <!-- Action Required -->
            <div style="background: linear-gradient(135deg, #fef3c7, #fde68a); border-radius: 10px; padding: 25px; margin-bottom: 30px; border: 1px solid #f59e0b;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 50px; vertical-align: top;">
                            <div style="font-size: 30px;">⚠️</div>
                        </td>
                        <td style="padding-left: 15px;">
                            <h4 style="color: #92400e; font-size: 18px; margin: 0 0 10px 0; font-weight: bold;">Action Required</h4>
                            <p style="color: #b45309; font-size: 14px; margin: 0; line-height: 1.5;">
                                This order requires your immediate attention. Please review and process this order to avoid delays.
                            </p>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Action Button -->
            <div style="text-align: center; margin-bottom: 20px;">
                <a href="{{ url('/admin/orders/' . $order->id) }}"
                   style="display: inline-block; background: linear-gradient(135deg, #4f46e5, #7c3aed); color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 16px;">
                    📋 View Order Details
                </a>
            </div>

            <div style="text-align: center;">
                <a href="{{ url('/admin/orders') }}"
                   style="display: inline-block; background-color: #6b7280; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-size: 14px; margin: 0 10px;">
                    📝 All Orders
                </a>
                <a href="{{ url('/admin/dashboard') }}"
                   style="display: inline-block; background-color: #10b981; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-size: 14px; margin: 0 10px;">
                    🏠 Dashboard
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div style="background-color: #f9fafb; padding: 25px 30px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="color: #6b7280; font-size: 14px; margin: 0 0 10px 0;">
                This is an automated email notification. Please do not reply directly to this message.
            </p>
            <p style="color: #9ca3af; font-size: 12px; margin: 0;">
                &copy; {{ date('Y') }} Your Company Name. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
