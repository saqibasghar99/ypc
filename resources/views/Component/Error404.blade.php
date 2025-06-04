<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | Your Ecommerce Brand</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #95a5a6;
            --hover-color: #3498db;
        }
        
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .error-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            background-color: white;
        }
        
        .error-icon {
            font-size: 5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }
        
        .error-title {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .error-subtitle {
            font-size: 1.2rem;
            color: var(--secondary-color);
            margin-bottom: 30px;
        }
        
        .btn-primary-custom {
            background-color: var(--primary-color);
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            background-color: var(--hover-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .search-box {
            max-width: 500px;
            margin: 30px auto;
        }
        
        .search-input {
            border-radius: 30px;
            padding: 15px 20px;
            border: 1px solid #e0e0e0;
            box-shadow: none;
        }
        
        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(44, 62, 80, 0.1);
        }
        
        .quick-links {
            margin-top: 30px;
        }
        
        .quick-links a {
            color: var(--secondary-color);
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s;
        }
        
        .quick-links a:hover {
            color: var(--hover-color);
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-20px);}
            60% {transform: translateY(-10px);}
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-container">
            <div class="error-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <h1 class="error-title">404</h1>
            <h2 class="error-subtitle">Oops! Page Not Found</h2>
            <p class="text-muted">The page you're looking for doesn't exist or has been moved.</p>
            
            <a href="/" class="text-muted btn border-dark">
                <i class="fas fa-home me-2"></i>Return to Homepage
            </a>
            
        </div>
    </div>
    

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>