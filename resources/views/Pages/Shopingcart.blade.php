<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ShopingCart.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div>
    @include('component.header')
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mx-auto text-center my-md-4 mb-3">
            @if(session('message'))
                <small id="alertMessage" class="small-alert bg-white text-warning w-100">
                    {{ session('message') }}
                </small>
            @endif

            @if(session('success'))
                <small id="alertMessage" class="small-alert bg-white text-success w-100">
                    {{ session('success') }}
                </small>
            @endif

            @if(session('error'))
                <small id="alertMessage" class="small-alert bg-white text-danger w-100">
                    {{ session('error') }}
                </small>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4 class="shopping-cart-heading" style="color: #343434">Shopping Cart</h4></div>
                    <div class="col items-text align-self-center fs-5 text-right text-muted">{{ $cartItems->count() }} items</div>
                </div>
            </div>    
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr class="border-top border-bottom" id="cart-item-{{ $item->id }}">
                            <td class="col-2">
                                <img class="img-fluid" src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->productname }}">
                            </td>
                            <td>
                                <div class="row product-name text-muted fw-bold mx-1">{{ $item->product->productname }}</div>
                            </td>
                            <td>
                                <div class="quantity-input-main shadow-none border rounded-1">
                                    <button class="quantity-btn qty-1 border-0" data-id="{{ $item->id }}" id="decrementBtn-{{ $item->id }}">-</button>
                                    <input class="shadow-none border-0 quantity-input" type="number" id="quantity-{{ $item->id }}" name="quantity" disabled readonly value="{{ $item->quantity }}" min="1" max="5" step="1" data-price="{{ $item->product->totalprice }}" data-discount="{{ $item->product->discount ?? 0 }}">
                                    <button class="quantity-btn qty-2 border-0" data-id="{{ $item->id }}" id="incrementBtn-{{ $item->id }}">+</button>
                                </div>
                            </td>
                            <td class="total-price" id="total-price-{{ $item->id }}">Rs. {{ number_format(($item->product->totalprice * (1 - ($item->product->discount ?? 0) / 100)) * $item->quantity, 2) }}</td>
                            <td><a href="{{ route('cart.remove', ['itemId' => $item->id]) }}" class="remove-btn text-decoration-none border"><span class="close">✕</span></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class=""><a class="back-to-shop bg-white text-dark border-black" href="/">←</a><span class="text-muted">Back to shop</span></div>
        </div>

        <div class="col-md-4 summary p-4 shadow">
            <h4 class="text-center my-4 fw-bold" style="color: #343434">Bill Summary</h4>
            <div class="summary-card p-3 rounded">
                <table class="table table-responsive table-borderless mb-0">
                    <tbody>
                        @php
                            $subtotal = 0;
                            $totalDiscount = 0;
                            $item_shipping_fee = 0;
                            $item_tax_fee = 0;
                            $total_shipp_and_tax_fee = 0;
                            $grand_total = 0;
                        @endphp
                        @foreach($cartItems as $item)
                        @php
                            $itemDiscountPercent = $item->product->discount ?? 0;
                            $itemPriceAfterDiscount = $item->product->totalprice * (1 - $itemDiscountPercent / 100);
                            $itemTotalPrice = $itemPriceAfterDiscount * $item->quantity;
                            $subtotal += $itemTotalPrice;
                            $totalDiscount += ($item->product->totalprice * ($itemDiscountPercent / 100)) * $item->quantity;
                            $item_shipping_fee = $item->product->shipping_cost;
                            $item_tax_fee = $item->product->tax_price;
                            $total_shipp_and_tax_fee = $item_shipping_fee + $item_tax_fee;
                            $grand_total = $subtotal + $total_shipp_and_tax_fee;
                        @endphp
                        <tr>
                            <td>{{ $item->product->productname }}</td>
                            <td class="text-end" id="summary-price-{{ $item->id }}">Rs. {{ number_format($itemTotalPrice, 2) }}</td>
                        </tr>
                        @endforeach
                        @if($totalDiscount > 0)
                        <tr>
                            <td>Discount</td>
                            <td class="text-end">Rs. -{{ number_format($totalDiscount, 2) }}</td>
                        </tr>
                        @endif
                        <tr class="border-top-1">
                            <hr>
                            <td class="pt-3"><strong>Shipping Fee</strong></td>
                            <td class="text-end pt-3" id="total-shipping-tax"><strong>Rs. {{ number_format($total_shipp_and_tax_fee, 2) }}</strong></td>
                        </tr>
                        <tr class="border-top-1">
                            <td class="pt-3"><strong>Grand Total</strong></td>
                            <td class="text-end pt-3" id="total-grand"><strong>Rs. {{ number_format($grand_total, 2) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button onclick="checkStock(event)" id="checkout-btn" class="btn btn-sm checkout-btn rounded-0 text-white border-0 shadow-none w-100 mt-4 py-2 btn-dark">
                CHECKOUT
            </button>
        </div>
    </div>
</div>

@include('component.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quantity button handlers
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const quantityInput = document.getElementById(`quantity-${id}`);
            let quantity = parseInt(quantityInput.value);

            if (this.id.includes('decrement')) {
                if (quantity > 1) {
                    quantity--;
                }
            } else if (this.id.includes('increment')) {
                if (quantity < 5) {
                    quantity++;
                }
            }

            quantityInput.value = quantity;

            const pricePerUnit = parseFloat(quantityInput.getAttribute('data-price'));
            const discountPercent = parseFloat(quantityInput.getAttribute('data-discount')) || 0;
            const priceAfterDiscount = pricePerUnit * (1 - discountPercent / 100);
            const totalPrice = priceAfterDiscount * quantity;

            // Update item total price display
            document.getElementById(`total-price-${id}`).textContent = `$${totalPrice.toFixed(2)}`;
            document.getElementById(`summary-price-${id}`).textContent = `$${totalPrice.toFixed(2)}`;

            // Update the summary totals
            updateSummaryTotals();

            // Send update to server
            updateCartQuantity(id, quantity);
        });
    });

    function updateSummaryTotals() {
        let subtotal = 0;
        let totalDiscount = 0;
        let shippingTax = 0;

        // Calculate subtotal and discount from all items
        document.querySelectorAll('.total-price').forEach(item => {
            const priceText = item.textContent.trim();
            const price = parseFloat(priceText.replace('$', '').replace(',', '').trim());
            if (!isNaN(price)) {
                subtotal += price;
            }
        });

        // Calculate total discount
        document.querySelectorAll('.quantity-input').forEach(input => {
            const quantity = parseInt(input.value);
            const pricePerUnit = parseFloat(input.getAttribute('data-price'));
            const discountPercent = parseFloat(input.getAttribute('data-discount')) || 0;
            const discountPerUnit = pricePerUnit * (discountPercent / 100);
            totalDiscount += discountPerUnit * quantity;
        });

        // Use the PHP-calculated shipping and tax
        shippingTax = {{ $total_shipp_and_tax_fee }};

        const grandTotal = subtotal + shippingTax;

        // Update summary rows
        const summaryRows = document.querySelectorAll('.summary-card tbody tr');
        let discountRowIndex = -1;

        // Find if discount row exists
        summaryRows.forEach((row, index) => {
            if (row.querySelector('td:first-child')?.textContent === 'Discount') {
                discountRowIndex = index;
            }
        });

        // Update or create discount row
        if (totalDiscount > 0) {
            if (discountRowIndex === -1) {
                // Create new discount row before shipping
                const newRow = document.createElement('tr');
                newRow.innerHTML = `<td>Discount</td><td class="text-end">-\$${totalDiscount.toFixed(2)}</td>`;
                summaryRows[summaryRows.length - 2].parentNode.insertBefore(newRow, summaryRows[summaryRows.length - 2]);
            } else {
                // Update existing discount row
                summaryRows[discountRowIndex].querySelector('td:last-child').textContent = `-\$${totalDiscount.toFixed(2)}`;
            }
        } else if (discountRowIndex !== -1) {
            // Remove discount row if no discount
            summaryRows[discountRowIndex].remove();
        }

        // Update shipping and tax
        summaryRows[summaryRows.length - 2].querySelector('td:last-child').textContent = `$${shippingTax.toFixed(2)}`;

        // Update grand total
        summaryRows[summaryRows.length - 1].querySelector('td:last-child').textContent = `$${grandTotal.toFixed(2)}`;
    }

    function updateCartQuantity(itemId, quantity) {
        fetch(`/update-cart/${itemId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                console.error('Error updating cart');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Remove alert after 3 seconds
    setTimeout(function() {
        const alertMessage = document.getElementById('alertMessage');
        if (alertMessage) {
            alertMessage.style.transition = 'opacity 0.5s';
            alertMessage.style.opacity = '0';
            setTimeout(() => {
                alertMessage.remove();
            }, 500);
        }
    }, 3000);
});

const cartItems = @json($cartItems);

function checkStock(event) {
    event.preventDefault();
    for (const item of cartItems) {
        const stockQuantity = item.product.stockquantity;
        const quantityInput = document.getElementById(`quantity-${item.id}`);
        const selectedQuantity = parseInt(quantityInput.value);

        if (selectedQuantity > stockQuantity) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'warning',
                title: `Only ${stockQuantity} item(s) in stock for ${item.product.productname}. Please update your cart!`,
                showConfirmButton: false,
                timer: 3000
            });
            return false;
        }
    }
    window.location.href = "{{ route('order.store') }}";
    return true;
}

const carted_items = {{ $cartItems->count() }};
const checkout_btn = document.getElementById("checkout-btn");

if (carted_items === 0 || carted_items === '') {
    checkout_btn.disabled = true;
}


</script>

</html>