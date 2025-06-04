<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Premium Profile | LuxeCart</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2a2a2a;
            --secondary: #d4af37;
            --accent: #e8e6e1;
            --light: #f9f9f7;
            --dark: #1a1a1a;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            --border-radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light);
            color: var(--primary);
            line-height: 1.6;
        }

        .ecommerce-profile {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Premium Header */
        .profile-hero {
            height: 380px;
            background: linear-gradient(135deg, #2a2a2a 0%, #1a1a1a 100%);
            position: relative;
            border-radius: var(--border-radius);
            overflow: hidden;
            margin-bottom: 40px;
            box-shadow: var(--shadow);
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1472&q=80') center/cover no-repeat;
            opacity: 0.15;
        }

        .profile-identity {
            position: relative;
            z-index: 2;
            padding: 60px 0;
            display: flex;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .avatar-container {
            position: relative;
            margin-right: 40px;
        }

        .premium-avatar {
            width: 160px;
            height: 160px;
            background: linear-gradient(135deg, var(--secondary) 0%, #f4d03f 100%);
            color: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4.5rem;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 5px solid rgba(255, 255, 255, 0.1);
        }

        .verified-badge {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 36px;
            height: 36px;
            background-color: var(--secondary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            border: 3px solid var(--light);
        }

        .user-info {
            color: var(--light);
        }

        .user-name {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .user-title {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .user-stats {
            display: flex;
            gap: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: var(--secondary);
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Profile Content */
        .profile-content {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
            margin-bottom: 60px;
        }

        /* Main Content */
        .profile-main {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--secondary);
        }

        /* Personal Info */
        .personal-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-group {
            margin-bottom: 20px;
        }

        .info-label {
            font-size: 0.9rem;
            color: var(--primary);
            opacity: 0.7;
            margin-bottom: 5px;
            display: block;
        }

        .info-value {
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Order History */
        .order-card {
            background: var(--light);
            border-radius: var(--border-radius);
            padding: 20px;
            margin-bottom: 15px;
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .order-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .order-id {
            font-weight: 600;
        }

        .order-date {
            color: var(--primary);
            opacity: 0.7;
        }

        .order-status {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-completed {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }

        .status-processing {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning);
        }

        .order-details {
            display: flex;
            gap: 15px;
        }

        .order-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }

        .order-info {
            flex: 1;
        }

        .order-product {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .order-price {
            color: var(--secondary);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .order-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .btn-outline:hover {
            background: rgba(0, 0, 0, 0.02);
        }

        .btn-primary {
            background: var(--secondary);
            color: white;
        }

        .btn-primary:hover {
            background: #c9a227;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        /* Sidebar */
        .profile-sidebar {
            position: sticky;
            top: 20px;
        }

        .sidebar-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: var(--shadow);
        }

        .wallet-balance {
            text-align: center;
            margin-bottom: 25px;
        }

        .balance-amount {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--secondary);
            margin: 15px 0;
        }

        .wallet-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        /* Wishlist */
        .wishlist-item {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .wishlist-image {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            object-fit: cover;
        }

        .wishlist-info {
            flex: 1;
        }

        .wishlist-title {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .wishlist-price {
            color: var(--secondary);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .wishlist-remove {
            color: var(--danger);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
        }

        /* Account Settings */
        .settings-form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .profile-content {
                grid-template-columns: 1fr 300px;
            }
        }

        @media (max-width: 992px) {
            .profile-content {
                grid-template-columns: 1fr;
            }

            .profile-sidebar {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }

            .sidebar-card {
                margin-bottom: 0;
            }
        }

        @media (max-width: 768px) {
            .profile-identity {
                flex-direction: column;
                text-align: center;
                padding: 40px 0;
            }

            .avatar-container {
                margin-right: 0;
                margin-bottom: 25px;
            }

            .user-stats {
                justify-content: center;
            }

            .personal-info-grid {
                grid-template-columns: 1fr;
            }

            .profile-sidebar {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .profile-hero {
                height: auto;
                padding-bottom: 40px;
            }

            .premium-avatar {
                width: 120px;
                height: 120px;
                font-size: 3.5rem;
            }

            .user-name {
                font-size: 2rem;
            }

            .user-stats {
                flex-direction: column;
                gap: 15px;
            }

            .wallet-actions {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="ecommerce-profile">
        <!-- Premium Profile Header -->
        <div class="profile-hero">
            <div class="hero-overlay"></div>
            <div class="profile-identity">
                <div class="avatar-container">
                    <div class="premium-avatar">M</div>
                    <div class="verified-badge">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
                <div class="user-info">
                    <h1 class="user-name">Michael Anderson</h1>
                    <p class="user-title">Premium Member Since 2020</p>
                    <div class="user-stats">
                        <div class="stat-item">
                            <span class="stat-value">4.9</span>
                            <span class="stat-label">Member Rating</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">127</span>
                            <span class="stat-label">Orders</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">$24,850</span>
                            <span class="stat-label">Total Spent</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="profile-content">
            <!-- Main Content -->
            <div class="profile-main">
                <h2 class="section-title">Personal Information</h2>
                <div class="personal-info-grid">
                    <div class="info-group">
                        <span class="info-label">Full Name</span>
                        <p class="info-value">Michael Anderson</p>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Email Address</span>
                        <p class="info-value">michael@example.com</p>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Phone Number</span>
                        <p class="info-value">+1 (555) 123-4567</p>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Member Since</span>
                        <p class="info-value">June 12, 2020</p>
                    </div>
                </div>

                <h2 class="section-title">Recent Orders</h2>
                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <span class="order-id">Order #LX-4892</span>
                            <span class="order-date"> - May 15, 2023</span>
                        </div>
                        <span class="order-status status-completed">Completed</span>
                    </div>
                    <div class="order-details">
                        <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="Product" class="order-image">
                        <div class="order-info">
                            <h3 class="order-product">Luxury Chronograph Watch</h3>
                            <p class="order-price">$1,250.00</p>
                            <div class="order-actions">
                                <button class="btn btn-outline">
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button class="btn btn-outline">
                                    <i class="fas fa-redo"></i> Reorder
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <span class="order-id">Order #LX-4876</span>
                            <span class="order-date"> - May 5, 2023</span>
                        </div>
                        <span class="order-status status-processing">Processing</span>
                    </div>
                    <div class="order-details">
                        <img src="https://images.unsplash.com/photo-1592878904946-b3cd8ae243d0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Product" class="order-image">
                        <div class="order-info">
                            <h3 class="order-product">Premium Leather Wallet</h3>
                            <p class="order-price">$295.00</p>
                            <div class="order-actions">
                                <button class="btn btn-outline">
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button class="btn btn-outline">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="section-title">Account Settings</h2>
                <form class="settings-form">
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" class="form-control" value="michael@example.com">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" id="phone" class="form-control" value="+1 (555) 123-4567">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Change Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm-password" class="form-control" placeholder="Confirm new password">
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-outline">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>

            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="sidebar-card">
                    <h3 class="section-title">Wallet Balance</h3>
                    <div class="wallet-balance">
                        <i class="fas fa-wallet" style="font-size: 2rem; color: var(--secondary);"></i>
                        <div class="balance-amount">$1,250</div>
                        <p>Available for purchases and refunds</p>
                    </div>
                    <div class="wallet-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-plus"></i> Add Funds
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-bag"></i> Shop Now
                        </button>
                    </div>
                </div>

                <div class="sidebar-card">
                    <h3 class="section-title">Wishlist</h3>
                    <div class="wishlist-item">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1399&q=80" alt="Product" class="wishlist-image">
                        <div class="wishlist-info">
                            <h4 class="wishlist-title">Designer Sunglasses</h4>
                            <p class="wishlist-price">$350.00</p>
                        </div>
                        <button class="wishlist-remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="wishlist-item">
                        <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1412&q=80" alt="Product" class="wishlist-image">
                        <div class="wishlist-info">
                            <h4 class="wishlist-title">Running Shoes</h4>
                            <p class="wishlist-price">$220.00</p>
                        </div>
                        <button class="wishlist-remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <button class="btn btn-outline" style="width: 100%; margin-top: 10px;">
                        <i class="fas fa-heart"></i> View All (12)
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to avatar on load
            const avatar = document.querySelector('.premium-avatar');
            setTimeout(() => {
                avatar.style.transform = 'scale(1.05)';
                setTimeout(() => {
                    avatar.style.transform = 'scale(1)';
                }, 300);
            }, 500);

            // Form submission
            const form = document.querySelector('.settings-form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Your changes have been saved successfully!');
            });

            // Remove wishlist items
            const removeButtons = document.querySelectorAll('.wishlist-remove');
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.wishlist-item').style.opacity = '0';
                    setTimeout(() => {
                        this.closest('.wishlist-item').remove();
                    }, 300);
                });
            });
        });
    </script>
</body>
</html>