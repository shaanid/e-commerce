<!DOCTYPE html>
<html>
<head>
    <title>Your Order History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .order-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 30px;
        }
        .order-header {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="mb-4 text-center">🧾 Your Order History</h2>

    @if($orders->isEmpty())
        <p class="text-center">You haven't placed any orders yet.</p>
    @endif

    @foreach($orders as $order)
        <div class="order-card">
            <div class="order-header mb-2">
                Order ID: #{{ $order->id }} | Date: {{ $order->created_at->format('d M Y, h:i A') }} | Total: ₹{{ number_format($order->total_price, 2) }}
            </div>

            <table class="table table-sm table-bordered mt-2">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name ?? 'Product Deleted' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₹{{ number_format($item->price, 2) }}</td>
                            <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>

</body>
</html>
