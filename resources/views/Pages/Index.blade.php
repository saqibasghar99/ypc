<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Premium Products</title>
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Index.css')}}">
</head>
<body>

<!-- Header -->
@include('component.header')

<!-- Hero Banner -->

@include('component.landingbanner')

<section class="product-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Featured Products</h2>
            <p class="section-subtitle text-dark">Discover our carefully curated collection of premium products</p>
        </div>
        
        <div class="row" id="featured-products">
            @foreach ($products as $product)
                @if ($product->category == "Featured" && $product->status == 'active')
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
                        <div class="product-card shadow-sm">
                            @if($product->discount > 0)
                                <span class="product-badge">-{{ $product->discount }}% OFF</span>
                            @endif
                            
                            <div class="product-image-container">
                                <a href="{{ route('product.detail', $product->id) }}">
                                    <img loading="lazy" src="{{ Storage::url($product->image) }}" alt="{{ $product->productname }}">
                                </a>
                            </div>
                            
                            <div class="product-body">
                                <span class="product-category  mt-2 text-muted">{{ $product->category }}</span>
                                <a class="product-title" href="{{ route('product.detail', $product->id) }}">
                                    {{ $product->productname }}
                                </a>
                                
                                <div class="product-price d-flex flex-sm-row flex-column align-items-start">
                                    @if($product->discount > 0)
                                        @php
                                            $discountprice = $product->totalprice - ($product->totalprice * $product->discount / 100);
                                        @endphp
                                        <span class="current-price after-off">
                                            Rs. {{ number_format($discountprice, 2) }}
                                        </span>
                                        <sup class="before-off ms-2">
                                            <span class="text-muted" style="text-decoration: line-through;">
                                                Rs. {{ number_format($product->totalprice, 2) }}
                                            </span>
                                        </sup>
                                    @else
                                        <span class="current-price ">
                                            Rs. {{ number_format($product->totalprice, 2) }}
                                        </span>
                                    @endif
                                </div>


                                <form class="add-to-cart-form" id="addToCartForm-{{ $product->id }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->productname }}">
                                    <input type="hidden" name="price" value="{{ $product->totalprice }}">
                                    <input type="hidden" name="image" value="{{ Storage::url($product->image) }}">
                                    <div class="cart-buttons d-flex justify-content-between gap-md-2 gap-1">
                                        <a href="{{ route('product.detail', $product->id) }}" class="border text-center text-decoration-none btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <button type="button" class="btn add-to-cart-button shadow-none btn-outline-light" data-id="{{ $product->id }}">
                                            <span class="material-icons text-white m-auto">shopping_cart</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="#categories" class="view-all-btn">
                View All Categories
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
@include('component.footer')
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        // Wishlist toggle
        $('.product-wishlist').click(function(e) {
            e.preventDefault();
            $(this).find('i').toggleClass('far fas');
            $(this).toggleClass('active');
            
            if ($(this).hasClass('active')) {
                $(this).css({
                    'background': 'var(--accent)',
                    'color': 'white'
                });
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Added to wishlist!',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true
                });
            } else {
                $(this).css({
                    'background': 'rgba(255, 255, 255, 0.9)',
                    'color': 'inherit'
                });
            }
        });
        
        // Add to cart functionality
        $('.add-to-cart-button').click(function (e) {
            e.preventDefault();
            
            var button = $(this);
            var productId = button.data('id');
            var form = $('#addToCartForm-' + productId);
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
                            <span class="material-icons">check</span>
                            Added!
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
                    console.error('Error:', error);

                    setTimeout(function() {
                        window.location.href = '/signin'; 
                    }, 2000);
                    
                    let errorMsg = 'An error occurred. Please try again.';
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
</script>

</body>
</html>