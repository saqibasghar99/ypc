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
    <link rel="stylesheet" href="{{ asset('css/Header.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- Main Header -->
    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
                    <img src="https://via.placeholder.com/180x45?text=ShopEase" alt="ShopEase" class="logo-img">
                </a>

                <!-- Category Toggle Button -->
                <button class="category-toggle" id="categoryToggle">
                    <i class="fas fa-bars"></i>
                    <span class="mb-sm-1">Categories</span>
                </button>

                <!-- Premium Search Bar -->
                <div class="search-container">
                    <form class="search-form" action="#">
                        <input type="text" id="searchInput" class="form-control shadow-none search-input" autocomplete="off" placeholder="Search products...">
                        <ul class="rounded-2" id="searchResults"></ul>
                        <button class="btn search-btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Right Side Icons -->
                <div class="header-icons">
                    <!-- User Account Dropdown -->
                    <div class="dropdown user-dropdown">
                        <a class="dropdown-toggle header-icon " href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                            <span class="label">Account</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            @if(session()->has('id') || session()->has('google_user_id'))
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="fas fa-user me-2"></i>My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('purchase.history') }}"><i class="fas fa-box me-2"></i>My Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            @else
                            <li><a class="dropdown-item" href="{{ route('signin') }}"><i class="fas fa-user me-2"></i>Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('purchase.history') }}"><i class="fas fa-box me-2"></i>My Orders</a></li>
                            @endif
                        </ul>
                    </div>
                    
                    <!-- Cart -->
                    @if(session()->has('id') || session()->has('google_user_id'))
                    <a href="{{ route('cart.view') }}" class="header-icon" title="Cart">
                        <!-- <i class="fas fa-shopping-bag"></i> -->
                        <span class="material-symbols-outlined shopping-cart-icon fs-3">shopping_cart</span>
                        <small><span class="badge cart-count px-0" id="cart-count">{{ session('cart_quantity', 0) }}</span></small>
                    </a>
                    @else
                    <a href="{{ route('signin') }}" class="header-icon" title="Cart">
                         <span class="material-symbols-outlined shopping-cart-icon fs-3">shopping_cart</span>
                        <span class="badge cart-count px-0" id="cart-count">0</span>
                    </a>
                    @endif
                </div>
            </nav>
        </div>

        <!-- Category Navigation -->
        <div class="category-nav d-sm-block d-none">
            <div class="container">
                <div class="nav">
                    <a class="nav-link active" href="{{ route('category.products', 'arrivals') }}">New Arrivals</a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="womenDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Electronics
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="womenDropdown">
                            <li><a class="dropdown-item" href="{{ route('category.products', 'toys') }}">Toys</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.products', 'watches') }}">Watches</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.products', 'headphones') }}">Headphones</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.products', 'gifts') }}">Gift</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.products', 'accessories') }}">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Clothing
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menDropdown">
                            <li><a class="dropdown-item" href="{{ route('category.products', 'men') }}">Mens</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.products', 'women') }}">Womens</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.products', 'beauty') }}">Jewellery</a></li>
                        </ul>
                    </div>
                    <a class="nav-link" href="{{ route('category.products', 'electronics') }}">Electronics</a>
                    <a class="nav-link" href="{{ route('category.products', 'home') }}">Home & Kitchen</a>
                    <a class="nav-link" href="{{ route('category.products', 'beauty') }}">Beauty</a>
                    <a class="nav-link" href="{{ route('category.products', 'gifts') }}">Gift</a>
                    <a class="nav-link" href="{{ route('category.products', 'watches') }}">Watches</a>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Category Sidebar -->
    <div class="category-sidebar" id="categorySidebar">
        <div class="sidebar-header">
            <h3>Shop Categories</h3>
            <button class="close-sidebar" id="closeSidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <ul class="sidebar-categories">
            <li><a href="{{ route('category.products', 'arrivals') }}"><i class="fas fa-star"></i> New Arrivals</a></li>
            <li><a href="{{ route('category.products', 'women') }}"><i class="fas fa-tshirt"></i> Women's Fashion</a></li>
            <li><a href="{{ route('category.products', 'men') }}"><i class="fas fa-male"></i> Men's Fashion</a></li>
            <li><a href="{{ route('category.products', 'electronics') }}"><i class="fas fa-mobile-alt"></i> Electronics</a></li>
            <li><a href="{{ route('category.products', 'accessories') }}"><i class="fas fa-hat-cowboy"></i> Accessories</a></li>
            <li><a href="{{ route('category.products', 'home') }}"><i class="fas fa-home"></i> Home & Kitchen</a></li>
            <li><a href="{{ route('category.products', 'watches') }}"><i class="fas fa-clock"></i> Watches</a></li>
            <li><a href="{{ route('category.products', 'beauty') }}"><i class="fas fa-spa"></i> Beauty & Health</a></li>
            <li><a href="{{ route('category.products', 'toys') }}"><i class="fas fa-gamepad"></i> Toys & Games</a></li>
            <li><a href="{{ route('category.products', 'wedding') }}"><i class="fas fa-glass-cheers"></i> Weddings</a></li>
            <li><a href="{{ route('category.products', 'shoes') }}"><i class="fas fa-shoe-prints"></i> Shoes</a></li>
            <li><a href="{{ route('category.products', 'books') }}"><i class="fas fa-book"></i> Books & Films</a></li>
            <li><a href="{{ route('category.products', 'bags') }}"><i class="fas fa-dumbbell"></i> Bags & Purses</a></li>
            <li><a href="{{ route('category.products', 'headphones') }}"><i class="fas fa-headphones"></i> Headphones</a></li>
            <li><a href="{{ route('category.products', 'pets') }}"><i class="fas fa-paw"></i> Pets</a></li>
            <li><a href="{{ route('category.products', 'beauty') }}"><i class="fas fa-gem"></i> Jewllery</a></li>
        </ul>
        
        <div class="sidebar-footer">
            <a href="#categories">
                View All Categories
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    
    <script>

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const resultsList = document.getElementById('searchResults');

    searchInput.addEventListener('input', function () {
        let query = this.value;

        if (query.length > 1) {
            fetch(`/live-search?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    resultsList.innerHTML = '';
                    resultsList.style.display = 'block';

                    if (data.length > 0) {
                        data.forEach(product => {
                            resultsList.innerHTML += `<li>
                                <a href="/product/${product.id}">
                                    <div style="display: flex; align-items: center;">
                                        <img src="/storage/${product.image}" alt="${product.productname}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 5px; margin-right: 10px;">
                                        <span>${product.productname}</span>
                                        <span class="mx-2 border-start border-1 border-secondary px-2">${product.tags}</span>
                                        <span class="mx-2 border-start border-1 border-secondary px-2"> Rs.${product.totalprice}</span>
                                    </div>
                                </a>
                            </li>`;
                        });
                    } else {
                        resultsList.innerHTML = '<li style="background-color: #fff; padding: 8px;">No products found</li>';
                    }
                });
        } else {
            resultsList.innerHTML = '';
            resultsList.style.display = 'none';
        }
    });

    // Hide results when clicking outside
    document.addEventListener('click', function (e) {
        if (!searchInput.contains(e.target) && !resultsList.contains(e.target)) {
            resultsList.style.display = 'none';
        }
    });
});

        // Category Sidebar Toggle
        const categoryToggle = document.getElementById('categoryToggle');
        const categorySidebar = document.getElementById('categorySidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        categoryToggle.addEventListener('click', () => {
            categorySidebar.classList.add('active');
            sidebarOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
        
        closeSidebar.addEventListener('click', () => {
            categorySidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
        
        sidebarOverlay.addEventListener('click', () => {
            categorySidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
        
        // Add animation to dropdown items
        document.querySelectorAll('.dropdown-item').forEach((item, index) => {
            item.style.animationDelay = `${index * 0.05}s`;
        });
        
        // Search input focus effect
        const searchInput = document.querySelector('.search-input');
        const searchSuggestions = document.querySelector('.search-suggestions');
        
        searchInput.addEventListener('focus', () => {
            searchSuggestions.style.display = 'block';
        });
        
        searchInput.addEventListener('blur', () => {
            setTimeout(() => {
                searchSuggestions.style.display = 'none';
            }, 200);
        });
    </script>
</body>
</html>