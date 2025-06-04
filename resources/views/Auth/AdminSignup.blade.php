<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Elegant Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/Signup.css')}}">

</head>
<body>
    <div class="auth-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="auth-card">
                        <div class="auth-header">
                            <div class="decorative-circle circle-1"></div>
                            <div class="decorative-circle circle-2"></div>
                            <h4>Create Your Account</h4>
                            <p>Join us today and get started</p>
                        </div>
                        <div class="auth-body">
                            <form action="{{route('admin-to-admin')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="shadow-none form-control" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="shadow-none form-control" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="shadow-none form-control" name="password" placeholder="Password" required id="password">
                                    <div class="password-strength">
                                        <div class="strength-meter">
                                            <div class="strength-fill" id="strength-fill"></div>
                                        </div>
                                        <div class="strength-text" id="strength-text">Password strength</div>
                                    </div>
                                </div>
                                
                                <div class="terms-agreement">
                                    By creating an account, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                                </div>
                                
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-user-plus me-2"></i> Sign Up
                                </button>
                            </form>

                            <div class="divider">or sign up with</div>

                            <div class="social-login">
                                <a href="{{ url('auth/google') }}" class="social-btn google">
                                    <i class="fab fa-google"></i>
                                </a>
                            </div>

                            <div class="auth-footer">
                                <p>Already have an account? <a href="{{route('signin')}}">Log in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthFill = document.getElementById('strength-fill');
            const strengthText = document.getElementById('strength-text');
            
            // Reset
            strengthFill.style.width = '0%';
            strengthFill.style.background = 'var(--accent-color)';
            strengthText.textContent = 'Password strength';
            
            if (password.length === 0) return;
            
            // Calculate strength
            let strength = 0;
            
            // Length check
            if (password.length > 7) strength += 25;
            if (password.length > 11) strength += 25;
            
            // Character type checks
            if (password.match(/[A-Z]/)) strength += 15;
            if (password.match(/[0-9]/)) strength += 15;
            if (password.match(/[^A-Za-z0-9]/)) strength += 20;
            
            // Update UI
            strengthFill.style.width = strength + '%';
            
            if (strength < 40) {
                strengthFill.style.background = '#e74c3c';
                strengthText.textContent = 'Weak password';
            } else if (strength < 70) {
                strengthFill.style.background = '#f39c12';
                strengthText.textContent = 'Moderate password';
            } else {
                strengthFill.style.background = '#2ecc71';
                strengthText.textContent = 'Strong password';
            }
        });
    </script>
</body>
</html>