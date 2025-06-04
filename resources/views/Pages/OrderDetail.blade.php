<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Segoe+UI&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
    <h2 class="mb-4">Order Details - #{{ $order->order_number }}</h2>

    {{-- Billing Information --}}
    <div class="card mb-4">
        <div class="card-header fw-bold">Billing Information</div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->billing_first_name }} {{ $order->billing_last_name }}</p>
            <p><strong>Email:</strong> {{ $order->billing_email }}</p>
            <p><strong>Phone:</strong> {{ $order->billing_phone }}</p>
            <p><strong>Address:</strong> {{ $order->billing_address }}, {{ $order->billing_city }}, {{ $order->billing_state }} - {{ $order->billing_zip }}, {{ $order->billing_country }}</p>
        </div>
    </div>

    {{-- Order Summary --}}
    <div class="card mb-4">
        <div class="card-header fw-bold">Order Summary</div>
        <div class="card-body">
            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
            <p><strong>Ordered At:</strong> {{ $order->ordered_at }}</p>
            <p><strong>Delivered At:</strong> {{ $order->delivered_at ?? 'Not Delivered Yet' }}</p>
            <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
            <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>
            <p><strong>Order Status:</strong> {{ ucfirst($order->status) }}</p>
        </div>
    </div>

    {{-- Order Items --}}
    @if($order->items && $order->items->count())
    <div class="card mb-4">
        <div class="card-header fw-bold">Order Items</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Specifications</th>
                        <th>Price (Rs.)</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name ?? 'N/A' }}</td>
                            <td>
                                @if($item->product && $item->product->specifications)
                                    @foreach($item->product->specifications as $spec)
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    {{-- Payment Summary --}}
    <div class="card mb-4">
        <div class="card-header fw-bold">Payment Summary</div>
        <div class="card-body">
            <p><strong>Tax Price:</strong> Rs. {{ $order->tax_price }}</p>
            <p><strong>Shipping Cost:</strong> Rs. {{ $order->shipping_cost }}</p>
            <p><strong>Total Amount:</strong> <strong>Rs. {{ $order->total_amount }}</strong></p>
        </div>
    </div>
</div>
</body>
</html>