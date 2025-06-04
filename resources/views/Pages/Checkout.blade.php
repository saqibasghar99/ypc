<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/Checkout.css">
</head>
<body>

<div>
    @include('component.header')
</div>

<div class="container billing-form-container p-4">
    <div class="row">
        <!-- Cart Section -->
        <div class="col-md-4 order-md-2 mb-4">
            <ul class="list-group mb-3 sticky-top">
            <!-- In your cart section where calculations happen -->
            @php
                $totalprice = 0;
                $totalDiscount = 0;
                $item_shipping_fee = 0;
                $item_tax_fee = 0;
                
                // Initialize these with 0
                $total_shipp_and_tax_fee = 0;
                $grand_total = 0;
                
                // We'll track if we've added shipping/tax yet
                $shipping_tax_added = false;
            @endphp

            @foreach ($cartItems as $cartItem)
                @php
                    $itemDiscountPercent = $cartItem->product->discount ?? 0;
                    $itemPriceAfterDiscount = $cartItem->product->totalprice * (1 - $itemDiscountPercent / 100);
                    $Itemtotalprice = $itemPriceAfterDiscount * $cartItem->quantity;
                    $totalprice += $Itemtotalprice;
                    $totalDiscount += ($cartItem->product->totalprice * ($itemDiscountPercent / 100)) * $cartItem->quantity;

                    // Only add shipping and tax once for the entire order
                    if (!$shipping_tax_added) {
                        $item_shipping_fee = $cartItem->product->shipping_cost;
                        $item_tax_fee = $cartItem->product->tax_price;
                        $total_shipp_and_tax_fee = $item_shipping_fee + $item_tax_fee;
                        $shipping_tax_added = true;
                    }

                    $grand_total = $totalprice + $total_shipp_and_tax_fee;
                @endphp

                <li class="list-group-item mt-md-4 p-4 d-flex justify-content-between lh-condensed">
                    <div class="d-flex flex-row">
                        <img class="img-fluid" height="50" width="50" src="{{ Storage::url($cartItem->product->image) }}" alt="{{ $cartItem->product->productname }}" style="object-fit:cover">
                        <div class="mx-2">
                            <h6 class="my-0">{{$cartItem->product->productname}}</h6>
                            <small class="text-muted">{{$cartItem->product->size}}</small>
                        </div>
                    </div>
                    <span class="text-muted">Rs. {{ number_format($itemPriceAfterDiscount, 2) }}</span>
                </li>
                @endforeach

                @if($totalDiscount > 0)
                <li class="list-group-item mt-md-4 p-4 d-flex justify-content-between lh-condensed">
                    <div class="mx-2">
                        <h6 class="my-0">Discount</h6>
                    </div>
                    <span class="text-muted">Rs. -{{ number_format($totalDiscount, 2) }}</span>
                </li>
                @endif

                <li class="list-group-item mt-md-4 p-4 d-flex justify-content-between lh-condensed">
                    <div class="mx-2">
                        <h6 class="my-0">Shipping + Tax Fee</h6>
                    </div>
                    <span class="text-muted" name="total_amount" value="{{ number_format($total_shipp_and_tax_fee, 2) }}" >Rs. {{ number_format($total_shipp_and_tax_fee, 2) }}</span>
                </li>
                <li class="list-group-item mt-md-1 p-4 d-flex justify-content-between lh-condensed">
                    <div class="mx-2">
                        <h6 class="my-0">Grand Total</h6>
                    </div>
                    <input type="hidden" name="total_amount" value="{{ number_format($grand_total, 2) }}">
                    <span class="text-muted fw-bold" name="total_amount" value="{{ number_format($grand_total, 2) }}" >Rs. {{ number_format($grand_total, 2) }}</span>
                </li>

            </ul>
        </div>

        <!-- Billing Address Section -->
        <div class="col-md-8 order-md-1">
            <h4 class="mb-4 fw-bold billing-address-title">Billing Address</h4>
            <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="billing_first_name" style="padding: 10px" placeholder="First name" id="firstName" required>
                        <div class="invalid-feedback">Valid first name is required.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="billing_last_name" style="padding: 10px" placeholder="Last name" id="lastName" required>
                        <div class="invalid-feedback">Valid last name is required.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control form-control-order rounded-2 shadow-none" name="billing_email" style="padding: 10px" id="email" placeholder="Email">
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>

                <div class="mb-3">
                    <input type="hidden" name="total_amount" value="{{ $grand_total }}">
                    <input type="hidden" name="quantity" value="{{ $cartItem->quantity }}">
                    <input type="hidden" name="oid" value="{{ $cartItem->product->id }}">
                    <input type="hidden" name="tax_price" value="{{ number_format($item_tax_fee, 2) }}">
                    <input type="hidden" name="shipping_cost" value="{{ number_format($item_shipping_fee, 2) }}">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="billing_address" style="padding: 10px" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">Please enter your shipping address.</div>
                </div>
                
                <div class="mb-3">
                    <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="billing_city" style="padding: 10px" id="address2" placeholder='Your complete "City Name"'>
                </div>
                
                <div class="mb-3">
                    <input type="number" class="form-control form-control-order rounded-2 shadow-none" name="billing_phone" style="padding: 10px" id="phone" placeholder="Phone">
                    <div class="invalid-feedback">Please enter a valid phone number</div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <select class="custom-select d-block w-100 shadow-none" name="billing_country" id="country" required>
                            <option value="">Select Country</option>
                            <option>Pakistan</option>
                        </select>
                        <small>Currently available only in Pakistan!</small>
                        <div class="invalid-feedback">Please select a valid country.</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <select class="custom-select d-block w-100 shadow-none" name="billing_state" id="state" >
                            <option value="">Select Region</option>
                            <option>Punjab</option>
                            <option>Sindh</option>
                        </select>
                        <div class="invalid-feedback">Please provide a valid state.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="billing_zip" style="padding: 10px" id="zip" placeholder="Zip Code (Optional)">
                        <div class="invalid-feedback">Zip code required.</div>
                    </div>
                </div>

                <!-- Shipping Address Section -->
                <h4 class="mb-4 fw-bold mt-5 shipping-address-title">Shipping Address</h4>
                <div class="form-check mb-3 billing-checkbox">
                    <input type="checkbox" class="form-check-input shadow-none billing-checkbox" name="same_as_billing" id="sameAsBilling" value="checked" checked>
                    <label class="form-check-label" for="sameAsBilling">Shipping address same as billing address</label>
                </div>

                <div id="shippingAddress">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="shipping_first_name" style="padding: 10px" placeholder="First name" id="shippingFirstName" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="shipping_last_name" style="padding: 10px" placeholder="Last name" id="shippingLastName" >
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control form-control-order rounded-2 shadow-none" name="shipping_email" style="padding: 10px" id="shippingEmail" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="shipping_address" style="padding: 10px" id="shippingAddress1" placeholder="1234 Main St" >
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="shipping_city" style="padding: 10px" id="shippingAddress2" placeholder='Your complete "City Name"'>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control form-control-order rounded-2 shadow-none" name="shipping_phone" style="padding: 10px" id="shippingPhone" placeholder="Phone">
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <select class="custom-select d-block w-100 shadow-none" name="shipping_country" id="shippingCountry" >
                                <option value="">Select Country</option>
                                <option>Pakistan</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <select class="custom-select d-block w-100 shadow-none" name="shipping_state" id="shippingState">
                                <option value="">Select Region</option>
                                <option>Punjab</option>
                                <option>Sindh</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" class="form-control form-control-order rounded-2 shadow-none" name="shipping_zip" style="padding: 10px" id="shippingZip" placeholder="Zip Code (Optional)">
                        </div>
                    </div>
                </div>

                <hr class="mb-1" hidden>                

                <hr class="mb-4" hidden>

                <button class="btn btn-place-order btn-block w-100 btn-order text-white" type="submit" style="padding: 10px 25px;">Place Order</button>
            </form>
        </div>
    </div>

</div>

@include('component.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery for form switching -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Toggle shipping address based on checkbox status
        $('#sameAsBilling').change(function() {
            if (this.checked) {
                $('#shippingAddress').hide();
                $('#statusChecked').val('Checked');
            } else {
                $('#shippingAddress').show();
                $('#statusChecked').val('Unchecked');
            }
        });

        // Trigger change to apply initial state
        $('#sameAsBilling').trigger('change');
    });
</script>

</body>
</html>