<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Purchase History</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/PurchaseHistory.css')}}">
</head>
<body>

<div>
@include('component.header')
</div>

<!-- Page Header -->
<header class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title">Your Purchase History</h4>
                <p class="page-subtitle">Review your past orders and track current shipments</p>
            </div>
            <div class="col-md-4 text-md-end">
                <span class="">
                    <i class="fas fa-box-open me-2"></i>
                    {{ count($previous_orders) }} Orders
                </span>
            </div>
        </div>
    </div>
</header>

<div class="container mb-5">

    @if(count($previous_orders) > 0)
        @foreach($previous_orders as $order)
            <!-- Order Card -->
            <div class="order-card">
                <div class="order-header">
                    <div>
                        <span class="order-id">Order #{{ $order->order_number }}</span>
                        <span class="order-date ms-2">• {{ $order->ordered_at }}</span>
                    </div>
                    @if($order->status == 'cancelled')
                        <p class="m-auto" style="color: red;">This order has been cancelled!</p>
                    @endif
                    <span class="status-badge status-{{ strtolower($order->status) }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                
                <div class="row g-0">
                    <!-- Products List -->
                    <div class="col-lg-8">
                        @foreach($order->items as $orderItem)
                            <div class="product-item">
                                <div class="product-image">
                                    <img src="{{ Storage::url($orderItem->product->image) }}" alt="{{ $orderItem->product->productname }}">
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name">{{ $orderItem->product->productname }}</h5>
                                    <div class="product-meta">
                                        <span class="me-3">Qty: {{ $orderItem->quantity }}</span>
                                        <span>SKU: {{ $orderItem->product->sku ?? 'N/A' }}</span>
                                    </div>

                                    @if($orderItem->product->discount > 0)
                                        @php
                                            $dicountprice = $orderItem->product->totalprice - ($orderItem->product->totalprice * $orderItem->product->discount / 100);
                                        @endphp
                                        <div class="product-price">PKR {{ number_format($dicountprice, 2) ?? " " }}</div>
                                        <div class="" style="text-decoration: line-through;">PKR {{ number_format($orderItem->total_price, 2) }}</div>
                                    @else
                                        <div class="">PKR {{ number_format($orderItem->total_price, 2) }}</div>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Order Summary -->
                    <div class="col-lg-4 border-start">
                        <div class="order-summary-card h-100">
                            <h5 class="summary-title">Order Summary</h5>

                            @php
                                $grand_total = 0;
                                $grand_total = $order->total_amount;
                            @endphp
                            
                            <div class="summary-item">
                                <span>Shipping</span>
                                <span>{{ number_format($order->shipping_cost, 2) }} PKR </span>
                            </div>
                            
                            <div class="summary-item">
                                <span>Tax</span>
                                <span>{{ number_format($order->tax_price, 2) }} PKR </span>
                            </div>
                            
                            <div class="summary-item summary-total">
                                <span>Total</span>
                                <span>{{ number_format($grand_total , 2) }} PKR </span>
                            </div>
                            
                            <!-- Payment Method -->
                            <div class="mt-4 pt-3 border-top">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-credit-card me-3 "></i>
                                    <div>
                                        <small class="text-muted d-block">Payment Method</small>
                                        <strong>{{ $order->payment_method }}</strong>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Delivery Timeline -->
                            <div class="mt-4 pt-3 border-top">
                                <h6 class="detail-title">
                                    <i class="fas fa-truck"></i>
                                    <span>Delivery Status</span>
                                </h6>
                                <div class="timeline">
                                    @if($order->status == 'pending')
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Order Placed</div>
                                        <div class="timeline-text">Your order has been received</div>
                                    </div>
                                    <div class="timeline-item ">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Processing</div>
                                        <div class="timeline-text">Preparing your order</div>
                                    </div>
                                    <div class="timeline-item ">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Shipped</div>
                                        <div class="timeline-text">On the way to you</div>
                                    </div>
                                    <div class="timeline-item  ">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Delivered</div>
                                        <div class="timeline-text">Order completed</div>
                                    </div>
                                    @elseif($order->status == 'processing')
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Order Placed</div>
                                        <div class="timeline-text">Your order has been received</div>
                                    </div>
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Processing</div>
                                        <div class="timeline-text">Preparing your order</div>
                                    </div>
                                    <div class="timeline-item ">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Shipped</div>
                                        <div class="timeline-text">On the way to you</div>
                                    </div>
                                    <div class="timeline-item  ">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Delivered</div>
                                        <div class="timeline-text">Order completed</div>
                                    </div>
                                    @elseif($order->status == 'shipped')
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Order Placed</div>
                                        <div class="timeline-text">Your order has been received</div>
                                    </div>
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Processing</div>
                                        <div class="timeline-text">Preparing your order</div>
                                    </div>
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Shipped</div>
                                        <div class="timeline-text">On the way to you</div>
                                    </div>
                                    <div class="timeline-item  ">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Delivered</div>
                                        <div class="timeline-text">Order completed</div>
                                    </div>
                                    @else
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Order Placed</div>
                                        <div class="timeline-text">Your order has been received</div>
                                    </div>
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Processing</div>
                                        <div class="timeline-text">Preparing your order</div>
                                    </div>
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Shipped</div>
                                        <div class="timeline-text">On the way to you</div>
                                    </div>
                                    <div class="timeline-item active">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-date">Delivered</div>
                                        <div class="timeline-text">Order completed</div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Actions -->
                <div class="order-actions">
                    <a href="#" class="btn-details" data-bs-toggle="collapse" data-bs-target="#orderDetails-{{ $order->id }}">
                        View Details <i class="fas fa-chevron-down"></i>
                    </a>
                </div>
                
                <!-- Order Details Collapse -->
                <div class="collapse order-details-collapse" id="orderDetails-{{ $order->id }}">
                    <div class="row">
                        <!-- Shipping Address -->
                        <div class="col-md-6 detail-section px-5">
                            <h6 class="detail-title">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Shipping Address</span>
                            </h6>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Location: </span> {{ $order->shipping_address }}</p>
                            </div>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Name: </span> {{ $order->shipping_first_name }} {{ $order->shipping_last_name }} </p>
                            </div>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Email: </span> {{ $order->shipping_email }}</p>
                            </div>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Phone: </span> {{ $order->shipping_phone }}</p>
                            </div>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Country: </span> {{ $order->shipping_country }}</p>
                            </div>
                        </div>
                        
                        <!-- Billing Address -->
                        <div class="col-md-6 detail-section">
                            <h6 class="detail-title">
                                <i class="fas fa-file-invoice-dollar"></i>
                                <span>Billing Address</span>
                            </h6>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Location: </span> {{ $order->billing_address }}</p>
                            </div>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Name: </span> {{ $order->billing_first_name }} {{ $order->billing_last_name }} </p>
                            </div>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Email: </span> {{ $order->billing_email }}</p>
                            </div>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Phone: </span> {{ $order->billing_phone }}</p>
                            </div>
                            <div class="detail-content d-flex flex-col">
                                <p><span class='fw-bold'>Country: </span> {{ $order->billing_country }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <h4 class="empty-title">No Orders Yet</h4>
            <p class="empty-text">You haven't placed any orders with us yet. Start shopping to discover amazing products!</p>
            <a href="/">
                <button class="btn-explore">
                    <i class="fas fa-shopping-bag me-2"></i>
                    Start Shopping
                </button>
            </a>
        </div>
    @endif
    
    
    <!-- Pagination links -->
    <div class="mt-4 text-dark">
        {{ $previous_orders->links('pagination::bootstrap-5') }}
    </div>

</div>

@include('component.footer')

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
