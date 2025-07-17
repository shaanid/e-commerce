<!DOCTYPE html>
<html>
<head>
    <title>Shop - Product Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .card-title {
            font-weight: bold;
        }
        .add-btn {
            background-color: #0d6efd;
            color: white;
        }
        .add-btn:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>

<div class="container py-5">

<div class="text-end">
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-outline-danger">Logout</button>
    </form>
</div>


    <h2 class="mb-4 text-center">🛒 Available Products</h2>
    <div class="mb-4">
        <form method="GET" action="{{ route('user.home.index') }}" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label for="min_price" class="form-label">Min Price</label>
                <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" class="form-control" placeholder="0">
            </div>

            <div class="col-md-3">
                <label for="max_price" class="form-label">Max Price</label>
                <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" class="form-control" placeholder="1000">
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
                <a href="{{ route('user.home.index') }}" class="btn btn-secondary w-100">Clear</a>
                <a href="{{ route('cart.view') }}" class="btn btn-info w-100">Cart</a>
                <a href="{{ route('orders.history') }}" class="btn btn-info w-100">Orders</a>
            </div>
        </form>
    </div>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <p><strong>Price:</strong> ₹{{ number_format($product->price, 2) }}</p>
                        <p><strong>Stock:</strong>
                            @if ($product->stock_quantity > 0)
                                <span class="text-success">{{ $product->stock_quantity }} in stock</span>
                            @else
                                <span class="text-danger">Out of Stock</span>
                            @endif
                        </p>
                        @if ($product->stock_quantity > 0)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-auto">
                                @csrf
                                <button type="submit" class="btn add-btn w-100">Add to Cart</button>
                            </form>
                        @else
                            <button class="btn btn-secondary w-100 mt-auto" disabled>Out of Stock</button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center mt-5">
                <h5>No products match your filter criteria.</h5>
            </div>
        @endforelse
    </div>
</div>

</body>
</html>
