<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Elegant Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/Signin.css')}}">
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
                            <h4>Welcome</h4>
                            <p>Sign in to access your account</p>
                        </div>
                        <div class="auth-body">
                            <form action="{{route('signin')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="email" class="shadow-none form-control" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="shadow-none form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="forgot-password">
                                    <a href="#">Forgot password?</a>
                                </div>
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-sign-in-alt me-2"></i> Login
                                </button>
                            </form>

                                <div class="divider">or continue with</div>
                                <div class="social-login">
                                    <a href="{{ url('auth/google') }}" class="social-btn google">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </div>

                            <div class="auth-footer">
                                <p>Don't have an account? <a href="{{route('signup')}}">Create one</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>