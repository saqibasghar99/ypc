

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
    <link rel="stylesheet" href="{{ asset('css/Profile.css') }}">
</head>
<body>

<div>
    @include('component.header')
</div>

    <div class="ecommerce-profile">
        <!-- Premium Profile Header -->
        <div class="profile-hero">
            <div class="hero-overlay"></div>
            <div class="profile-identity">
                <div class="avatar-container">
                    <div class="premium-avatar">{{ substr($user->name, 0, 1) }}</div>
                    <div class="verified-badge">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
                <div class="user-info">
                    <h1 class="user-name">{{ $user->name }}</h1>
                    <p class="user-title">Premium Member Since {{ $member_since }}</p>
                    <div class="user-stats">
                        <div class="stat-item">
                            <span class="stat-value">{{ $stats['order_count'] }}</span>
                            <span class="stat-label">Orders</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">PKR {{ number_format($stats['total_spent'], 2) }}</span>
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
                        <p class="info-value">{{ $user->name }}</p>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Email Address</span>
                        <p class="info-value">{{ $user->email }}</p>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Member Since</span>
                        <p class="info-value">{{ $member_since }}</p>
                    </div>
                </div>

                <h2 class="section-title">Account Settings</h2>
                <form method="POST" action="{{ route('profile.update') }}" class="settings-form">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-outline border" onclick="resetForm()">Cancel</button>
                        <button type="submit" class="btn border text-white save-btn">Save Changes</button>
                    </div>
                </form>

                <h3 class="section-title" style="margin-top: 40px;">Change Password</h3>
                <form method="POST" action="{{ route('profile.password') }}" class="settings-form">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" id="current_password" name="current_password" 
                               class="form-control @error('current_password') is-invalid @enderror" required>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" id="password" name="password" 
                               class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" 
                               class="form-control" required>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-outline border" onclick="resetPasswordForm()">Cancel</button>
                        <button type="submit" class="btn border text-white save-btn">Change Password</button>
                    </div>
                </form>
            </div>

            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="sidebar-card">
                    <h3 class="section-title">Your Spendings</h3>
                    <div class="wallet-balance">
                        <i class="fas fa-wallet recent-icon" style="font-size: 1.5rem; color: var(--secondary);"></i>
                        <div class="balance-amount" style="font-size: 1.5rem;" >PKR {{ number_format($stats['total_spent'], 2) }}</div>
                        <p>Explore more for purchases!</p>
                    </div>
                    <div class="wallet-actions">
                        <a href="{{ route('purchase.history') }}" class="btn border">
                            <i class="fas fa-plus "></i> Recent Orders
                        </a>
                        <a href="/" class="btn border">
                            <i class="fas fa-shopping-bag"></i> Shop Now
                        </a>
                    </div>
                </div>

                <div class="sidebar-card">
                    <h3 class="section-title">Special Offers</h3>
                    <p>Check back soon for exclusive member offers!</p>
                    <button class="btn btn-outline border" style="width: 100%; margin-top: 10px;">
                        <i class="fas fa-gift"></i> View Offers
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert-success text-success shadow m-5">
        {{ session('success') }}
        <button class="close-alert">&times;</button>
    </div>
    @endif

<div>
    @include('component.footer')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        function resetForm() {
            document.querySelector('form[action="{{ route('profile.update') }}"]').reset();
        }

        function resetPasswordForm() {
            document.querySelector('form[action="{{ route('profile.password') }}"]').reset();
        }

        // Close alert
        document.querySelector('.close-alert')?.addEventListener('click', function() {
            this.parentElement.style.opacity = '0';
            setTimeout(() => {
                this.parentElement.remove();
            }, 300);
        });

        // Add animation to avatar on load
        const avatar = document.querySelector('.premium-avatar');
        setTimeout(() => {
            avatar.style.transform = 'scale(1.05)';
            setTimeout(() => {
                avatar.style.transform = 'scale(1)';
            }, 300);
        }, 500);
    </script>
</body>
</html>