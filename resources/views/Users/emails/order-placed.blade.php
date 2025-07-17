<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
</head>

<body>
    <h2>Thank you for your order, {{ $order->user->first_name }}!</h2>
    <p>Your order ID is: <strong>#{{ $order->id }}</strong></p>
    <p>Total Price: ₹{{ number_format($order->total_price, 2) }}</p>

    <h4>Items:</h4>
    <ul>
        @foreach ($order->items as $item)
            <li>
                {{ $item->product->name }} - ₹{{ $item->price }} × {{ $item->quantity }}
            </li>
        @endforeach
    </ul>

    <p>We’ll notify you when your items are on the way.</p>
</body>
</html>
