<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Premium Ecommerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Banner.css') }}">
</head>
<body>
    <!-- Hero Banner -->
<div class="luxury-container">
    <div class="decorative-line"></div>
    <div class="collection-header">SUMMER COLLECTION</div>
    <h2 class="collection-title">
        Shop the trends you <br> love in <span id="current-year"></span>
    </h2>
    <p class="collection-subtitle">
        Enjoy unbeatable prices on handpicked collections, featuring the latest trends, all delivered right to your doorstep with ease
    </p>
    <a  href="#featured-products" class="shop-now-btn" style="border-bottom: 1px solid #000;">SHOP NOW</a>
</div>

<!-- Categories Grid -->
<section class="categories-section py-5">
    <div class="container">
        <h4 class="section-title text-center mb-5">Shop by Category</h4>
        <div class="row g-4" id="categories">
            <div class="col-md-4 col-6">
                <a href="{{ route('category.products', 'electronics') }}" class="category-card">
                    <div class="category-img">
                        <img loading="lazy" src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="Electronics" class="img-fluid">
                    </div>
                    <div class="category-overlay">
                        <h3>Electronics</h3>
                        <span>Shop Now <i class="fas fa-arrow-right ms-2"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-6">
                <a href="{{ route('category.products', 'home') }}" class="category-card">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Home & Kitchen" class="img-fluid">
                    </div>
                    <div class="category-overlay">
                        <h3>Home & Kitchen</h3>
                        <span>Shop Now <i class="fas fa-arrow-right ms-2"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-6">
                <a href="{{ route('category.products', 'men') }}" class="category-card text-decoration-none">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Men's Fashion" class="img-fluid">
                    </div>
                    <div class="category-overlay">
                        <h3>Men's Fashion</h3>
                        <span>Shop Now <i class="fas fa-arrow-right ms-2"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-6">
                <a href="{{ route('category.products', 'women') }}" class="category-card">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1581044777550-4cfa60707c03?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=686&q=80" alt="Women's Fashion" class="img-fluid">
                    </div>
                    <div class="category-overlay">
                        <h3>Women's Fashion</h3>
                        <span>Shop Now <i class="fas fa-arrow-right ms-2"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-6">
                <a href="{{ route('category.products', 'beauty') }}" class="category-card">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Beauty" class="img-fluid">
                    </div>
                    <div class="category-overlay">
                        <h3>Beauty</h3>
                        <span>Shop Now <i class="fas fa-arrow-right ms-2"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-6">
                <a href="{{ route('category.products', 'accessories') }}" class="category-card">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1571781926291-c477ebfd024b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80" alt="Accessories" class="img-fluid">
                    </div>
                    <div class="category-overlay">
                        <h3>Accessories</h3>
                        <span>Shop Now <i class="fas fa-arrow-right ms-2"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

    <script>
        document.getElementById("current-year").textContent = new Date().getFullYear();
    </script>

</script>
</body>
</html>