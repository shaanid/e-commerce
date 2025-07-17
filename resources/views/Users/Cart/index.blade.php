<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 10px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="mb-4 text-center">🛒 Your Cart</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    @if($cartItems->count())

    @if($cartItems->count())
    <form action="{{ route('cart.checkout') }}" method="POST" class="text-end mt-3">
        @csrf
        <button class="btn btn-success">Place Order</button>
    </form>
@endif

<br>

        <table class="table table-bordered bg-white">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th style="width: 150px;">Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cartItems as $item)
                    @php
                        $price = $item->product->price;
                        $subtotal = $price * $item->quantity;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>₹{{ number_format($price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center gap-1">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="100" class="form-control form-control-sm" style="width: 70px;">
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </form>
                        </td>
                        <td>₹{{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                @csrf
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="3" class="text-end">Total</td>
                    <td colspan="2">₹{{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="text-center mt-4">
            <p>Your cart is empty. Browse products and add to cart!</p>
            <a href="{{ route('user.home.index') }}" class="btn btn-primary">Go to Products</a>
        </div>
    @endif
</div>

</body>
</html>
