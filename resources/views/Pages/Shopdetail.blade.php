<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JuttBrand Product-Detail</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/ShopDetail.css') }}">
</head>
<body>
    <div>
        @include('component.header')
    </div>

    <div class="container">
        <div class="product-card">
            <div class="container-fliud">
                <div class="wrapper d-flex flex-sm-row flex-col row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane main-img-preview active" id="pic-1"><img src="{{ Storage::url($products->image) }}" alt="{{$products->productname}}" /></div>
                            <div class="tab-pane" id="pic-2"><img src="{{ Storage::url($products->preview_image1) }}"  alt="{{$products->productname}}" /></div>
                            <div class="tab-pane" id="pic-3"><img src="{{ Storage::url($products->preview_image2) }}" alt="{{$products->productname}}" /></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active"><a href="#pic-1" data-bs-toggle="tab"><img src="{{ Storage::url($products->image) }}" onclick="mainImage()" alt="{{$products->productname}}" /></a></li>
                            <li><a href="#pic-2" data-bs-toggle="tab"><img src="{{ Storage::url($products->preview_image1) }}" onclick="mainImagePreview()" alt="{{$products->productname}}" /></a></li>
                            <li><a href="#pic-3" data-bs-toggle="tab"><img src="{{ Storage::url($products->preview_image2) }}" onclick="mainImagePreview()" alt="{{$products->productname}}" /></a></li>
                        </ul>
                    </div>

                    <div class="details col-md-6">
                        <h3 class="product-title">{{$products->productname}}</h3>
                        @php
                            $averageRating = round(rand(30, 50) / 10, 1); // Generates between 3.0 and 5.0
                        @endphp

                        <div class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($averageRating >= $i)
                                    <span class="fa fa-star checked"></span>
                                @elseif ($averageRating >= $i - 0.5)
                                    <span class="fa fa-star-half checked"></span>
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endfor
                            <span class="ms-2">({{ number_format($averageRating, 1) }})</span>&nbsp
                            <span class="review-no">{{ rand(25, 100) }} reviews</span>
                        </div>


                        
                        <p class="product-description">{{$products->productdescription}}</p>
                        <div class="d-flex flex-row">
                            @if($products->discount > 0)
                                @php
                                    $dicountprice = $products->totalprice - ($products->totalprice * $products->discount / 100);
                                @endphp
                                <h4 class="price"><span>Rs. {{ number_format($dicountprice, 2) }}</span></h4>
                                <p class="mx-2 after-price"><span class="" style="text-decoration: line-through;">Rs.{{ number_format($products->totalprice, 2) }}</span></p>
                                @else
                                <h4 class="price"><span>Rs. {{ number_format($products->totalprice, 2) }}</span></h4>
                            @endif
                        </div>
                        <h5 class="sizes fw-bold">Size: 
                            <button class="size btn-sm size-btn size-option" data-size="small(S)" data-bs-toggle="tooltip" title="small" onclick="selectSize('small(S)', event)">S</button>
                            <button class="size btn-sm size-btn size-option" data-size="medium(M)" data-bs-toggle="tooltip" title="medium" onclick="selectSize('medium(M)', event)" style="background-color: #09191F; color: white;">M</button>
                            <button class="size btn-sm size-btn size-option" data-size="large(L)" data-bs-toggle="tooltip" title="large" onclick="selectSize('large(L)', event)">L</button>
                            <button class="size btn-sm size-btn size-option" data-size="Extra-large(XL)" data-bs-toggle="tooltip" title="extra large" onclick="selectSize('Extra-large(XL)', event)">XL</button>
                        </h5>
                        <p class="fw-bold text-muted">*Please select a size only if applicable.</p>

                        <input type="hidden" id="selectedSize" name="size">

                        <h5 class="quantity d-flex flex-row align-items-center">
                            <span class="me-3 fw-bold">QTY:</span>
                            <div class="quantity-input">
                                <button class="quantity-btn" id="decrementBtn" onclick="qntyDecreaser()">-</button>
                                <input type="number" id="quantity" name="quantity" readonly value="1" min="1" step="1">
                                <button class="quantity-btn" id="incrementBtn" onclick="qntyIncreaser()">+</button>
                            </div>
                        </h5>

                        <small class="quantity d-flex flex-row align-items-center">
                            <span class="mb-2">In Stock: {{ $products->stockquantity }} </span>
                        </small>

                        <p><strong>Delivery:</strong> 
                        - Within Lahore: 2-3 working days <br>
                        - Other Cities: 3-5 working days
                        </p>

                        <p>Delivery charges and timelines are subject to change for locations outside Lahore.</p>

                        <div class="action m-auto">
                            <form class="" id="buyNowForm-{{ $products->id }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $products->id }}">
                                <input type="hidden" name="name" value="{{ $products->productname }}">
                                <input type="hidden" name="price" value="{{ $products->totalprice }}">
                                <input type="hidden" name="image" value="{{ Storage::url($products->image) }}">
                                <input type="hidden" name="quantity" id="buyNowQuantity" value="1">
                                <input type="hidden" name="size" id="buyNowSize" value="">
                                <button type="button" id="buy-now-btn" class="buy-cart-btn btn btn-block text-white bg-dark buy-now-button" data-id="{{ $products->id }}">
                                    </i>Buy Now
                                </button>
                            </form>
                            <form class="" id="addToCartForm-{{ $products->id }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $products->id }}">
                                <input type="hidden" name="name" value="{{ $products->productname }}">
                                <input type="hidden" name="price" value="{{ $products->totalprice }}">
                                <input type="hidden" name="image" value="{{ Storage::url($products->image) }}">
                                <input type="hidden" name="quantity" id="formQuantity" value="">
                                <input type="hidden" name="size" id="formSize" value="">
                                <button type="button" id="add-to-cart-btn" class="shadow-none border-0 d-flex text-white m-auto text-center flex-row btn btn-block add-to-cart-button add-cart-btn" data-id="{{ $products->id }}" >
                                    <span class="material-icons text-white mx-1">shopping_cart</span>
                                    Bag It
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($products->specifications)
<div class="specs-section my-5">
    <h4 class="specs-title text-center mb-4 position-relative">
        <span class="px-3 bg-white position-relative">Specifications</span>
        <span class="title-border"></span>
    </h4>
    
    <div class="specs-container">
        <div class="specs-grid">
            <!-- Column 1 -->
            <div class="specs-group">
                @if($products->specifications->brand)
                <div class="spec-item">
                    <div class="spec-label">Brand</div>
                    <div class="spec-value">{{ $products->specifications->brand }}</div>
                </div>
                @endif
                
                @if($products->specifications->model)
                <div class="spec-item">
                    <div class="spec-label">Model</div>
                    <div class="spec-value">{{ $products->specifications->model }}</div>
                </div>
                @endif
                
                @if($products->specifications->display)
                <div class="spec-item">
                    <div class="spec-label">Display</div>
                    <div class="spec-value">{{ $products->specifications->display }}</div>
                </div>
                @endif
                
                @if($products->specifications->processor)
                <div class="spec-item">
                    <div class="spec-label">Processor</div>
                    <div class="spec-value">{{ $products->specifications->processor }}</div>
                </div>
                @endif
            </div>
            
            <!-- Column 2 -->
            <div class="specs-group">
                @if($products->specifications->ram)
                <div class="spec-item">
                    <div class="spec-label">RAM</div>
                    <div class="spec-value">{{ $products->specifications->ram }}</div>
                </div>
                @endif
                
                @if($products->specifications->storage)
                <div class="spec-item">
                    <div class="spec-label">Storage</div>
                    <div class="spec-value">{{ $products->specifications->storage }}</div>
                </div>
                @endif
                
                @if($products->specifications->battery)
                <div class="spec-item">
                    <div class="spec-label">Battery</div>
                    <div class="spec-value">{{ $products->specifications->battery }}</div>
                </div>
                @endif
                
                @if($products->specifications->os)
                <div class="spec-item">
                    <div class="spec-label">OS</div>
                    <div class="spec-value">{{ $products->specifications->os }}</div>
                </div>
                @endif
            </div>
            
            <!-- Column 3 -->
            <div class="specs-group">
                @if($products->specifications->camera)
                <div class="spec-item">
                    <div class="spec-label">Camera</div>
                    <div class="spec-value">{{ $products->specifications->camera }}</div>
                </div>
                @endif
                
                @if($products->specifications->connectivity)
                <div class="spec-item">
                    <div class="spec-label">Connectivity</div>
                    <div class="spec-value">{{ $products->specifications->connectivity }}</div>
                </div>
                @endif
                
                @if($products->specifications->dimensions)
                <div class="spec-item">
                    <div class="spec-label">Dimensions</div>
                    <div class="spec-value">{{ $products->specifications->dimensions }}</div>
                </div>
                @endif
                
                @if($products->specifications->weight)
                <div class="spec-item">
                    <div class="spec-label">Weight</div>
                    <div class="spec-value">{{ $products->specifications->weight }}</div>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Full width items -->
        <div class="full-width-specs">
            @if($products->specifications->warranty)
            <div class="spec-item">
                <div class="spec-label">Warranty</div>
                <div class="spec-value">{{ $products->specifications->warranty }}</div>
            </div>
            @endif
            
            @if($products->specifications->included_items)
            <div class="spec-item">
                <div class="spec-label">Included Items</div>
                <div class="spec-value">{{ $products->specifications->included_items }}</div>
            </div>
            @endif
        </div>
    </div>
</div>
@endif

        <!-- Explore More Products Section -->
<div class="explore-more-section">
    <div class="section-title">
        <h3>More {{ $products->category }} Products</h3>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-5">
        @foreach ($relatedProducts as $relatedProduct)
            <div class="col more-explore-col exp-products">
                <div class="product-item shadow h-100 d-flex flex-column justify-content-between">
                    @if($relatedProduct->discount > 0)
                        <span class="product-badge">-{{ $relatedProduct->discount }}% OFF</span>
                    @endif

                    <a href="{{ route('product.detail', $relatedProduct->id) }}">
                        <div class="product-img-container">
                            <img src="{{ Storage::url($relatedProduct->image) }}" alt="{{ $relatedProduct->productname }}" class="product-img img-fluid">
                        </div>
                    </a>

                    <div class="product-info mt-2">
                        <a href="{{ route('product.detail', $relatedProduct->id) }}" class="text-decoration-none product-name d-block">{{ $relatedProduct->productname }}</a>

                        @if($relatedProduct->discount > 0)
                            @php
                                $dicountprice = $relatedProduct->totalprice - ($relatedProduct->totalprice * $relatedProduct->discount / 100);
                            @endphp
                            <div class="d-flex flex-row justify-content-between">
                                <div class="current-price product-price after-off">Rs. {{ number_format($dicountprice, 2) }}</div>
                                <small class="before-off text-muted" style="text-decoration: line-through;">Rs. {{ number_format($relatedProduct->totalprice, 2) }}</small>
                            </div>
                        @else
                            <div><span class="current-price product-price before-off">Rs. {{ number_format($relatedProduct->totalprice, 2) }}</span></div>
                        @endif

                        <div class="product-actions mt-3 d-flex justify-content-between">
                            <a href="{{ route('product.detail', $relatedProduct->id) }}" class="text-decoration-none border btn-view">
                                <i class="fas fa-eye"></i> View
                            </a>

                            <form class="add-to-cart-form" id="addToCartForm-{{ $relatedProduct->id }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $relatedProduct->id }}">
                                <input type="hidden" name="name" value="{{ $relatedProduct->productname }}">
                                <input type="hidden" name="price" value="{{ $relatedProduct->totalprice }}">
                                <input type="hidden" name="image" value="{{ Storage::url($relatedProduct->image) }}">
                                <button type="button" class="btn-cart add-to-cart-button" data-id="{{ $relatedProduct->id }}">
                                    <span class="material-icons">shopping_cart</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    </div>

    <div>
        @include('component.footer')
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Set initial active size when the page loads (Default selection: medium(M))
        selectSize('medium(M)');
    });

    // Function to handle size selection
    function selectSize(size, event) {
        // Update the hidden input value with the selected size
        document.getElementById("selectedSize").value = size;
        
        // Remove active class and background color from all buttons
        document.querySelectorAll('.size').forEach(function(button) {
            button.classList.remove('active');
            button.style.backgroundColor = ''; // Reset background color
            button.style.color = ''; // Reset text color
        });
        
        // Add active class and background color to the clicked button
        event.target.classList.add('active');
        event.target.style.backgroundColor = '#09191F'; // Change background color for active size
        event.target.style.color = 'white'; // Change text color for active size
    }


    function qntyIncreaser(){
        let qnty_value = parseInt(document.getElementById('quantity').value);
        if(qnty_value < stockQuantity) {
            qnty_value += 1;
            document.getElementById('quantity').value = qnty_value;
            document.getElementById('formQuantity').value = qnty_value;
            document.getElementById('buyNowQuantity').value = qnty_value;
        } else {
            Swal.fire({
                toast: true,
                position: 'top-start',
                icon: 'warning',
                title: 'Only ' + stockQuantity + ' item(s) in stock',
                showConfirmButton: false,
                timer: 1500
            });
        }
    }


    function qntyDecreaser(){
        let qnty_value = parseInt(document.getElementById('quantity').value);
        if(qnty_value > 1) {
            qnty_value = qnty_value - 1;
            document.getElementById('quantity').value = qnty_value;
            document.getElementById('formQuantity').value = qnty_value;
            document.getElementById('buyNowQuantity').value = qnty_value;
        }
    }

    $(document).ready(function () {
        // Add to cart functionality
        $('.add-to-cart-button').click(function (e) {
            e.preventDefault();
            
            // Validate stock
            if (stockQuantity <= 0) {
                Swal.fire({
                    toast: true,
                    position: 'top-end', // ← this puts it in the top-left corner
                    icon: 'warning',
                    title: 'Sorry, this product is currently out of stock.',
                    showConfirmButton: false,
                    timer: 1500
                });
                return;
            }

            // Validate size selection
            if (!$('#selectedSize').val()) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Please select a size first',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true
                });
                return;
            }
            
            var button = $(this);
            var productId = button.data('id');
            var form = $('#addToCartForm-' + productId);
            
            // Update form fields with current values
            $('#formQuantity').val($('#quantity').val());
            $('#formSize').val($('#selectedSize').val());
            
            var formData = form.serialize();
            
            // Save original button HTML
            var originalButtonHtml = button.html();
            
            // Add loading state
            button.html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Adding...
            `);
            button.prop('disabled', true);
            
            // Add pulse animation to product card
            form.closest('.product-card').addClass('adding-to-cart');

            $.ajax({
                url: "{{ route('cart.add') }}",
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                        return;
                    }

                    if (response.status === 'success') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message || 'Added to cart!',
                            showConfirmButton: false,
                            timer: 1500,
                            toast: true,
                            background: 'var(--success)',
                            iconColor: '#fff',
                            color: '#fff'
                        });
                        
                        if (response.cart) {
                            updateCart(response.cart);
                        }
                        
                        button.html(`
                            <i class="fas fa-check-circle text-success bg-white rounded-circle"></i>

                        `);
                        button.removeClass('btn-primary').addClass('btn-success');
                        
                        setTimeout(function() {
                            button.html(originalButtonHtml);
                            button.prop('disabled', false);
                            button.removeClass('btn-success').addClass('btn-primary');
                        }, 2000);
                        
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: response.message || 'Failed to add to cart',
                            showConfirmButton: false,
                            timer: 2000,
                            toast: true
                        });
                        
                        button.html(originalButtonHtml);
                        button.prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Status:', status);
                    console.error('Error:', error);
                    console.error('Response:', xhr.responseText);
                    
                    let errorMsg = 'An error occurred. Please try again.';

                    
                    // setTimeout(() => {
                    //     window.location.href = '/signin';
                    // }, 2000);

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        try {
                            const response = JSON.parse(xhr.responseText);
                            errorMsg = response.message || errorMsg;
                        } catch (e) {
                            errorMsg = xhr.responseText || errorMsg;
                        }
                    }
                    
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: errorMsg,
                        showConfirmButton: false,
                        timer: 2000,
                        toast: true
                    });
                    
                    button.html(originalButtonHtml);
                    button.prop('disabled', false);
                },
                complete: function() {
                    form.closest('.product-card').removeClass('adding-to-cart');
                }
            });
        });
 

            // Buy Now functionality
        $('.buy-now-button').click(function (e) {
            e.preventDefault();
            
            // Validate size selection
            if (!$('#selectedSize').val()) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Please select a size first',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true
                });
                return;
            }
            
            var button = $(this);
            var productId = button.data('id');
            var form = $('#buyNowForm-' + productId);
            
            // Update form fields with current values
            $('#buyNowQuantity').val($('#quantity').val());
            $('#buyNowSize').val($('#selectedSize').val());
            
            var formData = form.serialize();
            
            // Save original button HTML
            var originalButtonHtml = button.html();
            
            // Add loading state
            button.html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Processing...
            `);
            button.prop('disabled', true);
            
            // Add pulse animation to product card
            form.closest('.product-card').addClass('adding-to-cart');

            $.ajax({
                url: "{{ route('cart.buyNow') }}", // New route for Buy Now
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                        return;
                    }

                    if (response.status === 'success') {
                        // Redirect to checkout page
                        window.location.href = "{{ route('cart-checkout.view') }}";
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: response.message || 'Failed to process your order',
                            showConfirmButton: false,
                            timer: 2000,
                            toast: true
                        });
                        
                        button.html(originalButtonHtml);
                        button.prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Status:', status);
                    console.error('Error:', error);
                    console.error('Response:', xhr.responseText);
                    
                    let errorMsg = 'An error occurred. Please try again.';

                    setTimeout(() => {
                        window.location.href = '/signin';
                    }, 2000);

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        try {
                            const response = JSON.parse(xhr.responseText);
                            errorMsg = response.message || errorMsg;
                        } catch (e) {
                            errorMsg = xhr.responseText || errorMsg;
                        }
                    }
                    
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: errorMsg,
                        showConfirmButton: false,
                        timer: 2000,
                        toast: true
                    });
                    
                    button.html(originalButtonHtml);
                    button.prop('disabled', false);
                },
                complete: function() {
                    form.closest('.product-card').removeClass('adding-to-cart');
                }
            });
        });
    });

    function updateCart(cartData) {
        const cartCount = $('#cart-count');
        const cartIcon = $('#cart-icon');
        
        cartCount.fadeOut(200, function() {
            $(this).text(cartData.count).fadeIn(200);
        });
        
        cartIcon.addClass('animate__animated animate__bounce');
        setTimeout(() => {
            cartIcon.removeClass('animate__animated animate__bounce');
        }, 1000);
    }

    function mainImagePreview(){
        document.getElementById('pic-1').style.display = 'none';
    }

        
    function mainImage(){
        document.getElementById('pic-1').style.display = 'block';
    }

    const stockQuantity = {{ $products->stockquantity }};
    const buy_now_btn = document.getElementById("buy-now-btn");

    if(stockQuantity <= 0){
        buy_now_btn.disabled = true;
        buy_now_btn.innerText = 'Out of Stock';
    }

    </script>
</body>
</html>