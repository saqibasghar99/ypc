<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÉTERNE | Collections</title>
    <link rel="stylesheet" href="https://use.typekit.net/xxxxxxx.css"> <!-- Replace with your Adobe Fonts link -->
    <style>
        :root {
            --text-primary: #1a1a1a;
            --text-secondary: #555;
            --border-color: #e0e0e0;
            --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        
        .luxury-container {
            width: 100%;
            padding: 5vw;
            position: relative;
            background: url('https://www.armitagephoto.com/wp-content/uploads/2021/05/product-photo-scaled.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }


        
        .collection-header {
            font-size: 0.9rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            margin-bottom: 2.5rem;
            font-weight: 400;
            color: var(--text-secondary);
            opacity: 0;
            animation: fadeIn 0.8s 0.3s forwards;
        }
        
        .collection-title {
            font-size: 2.3rem;
            font-weight: 300;
            margin-bottom: 2.5rem;
            line-height: 1.1;
            letter-spacing: -0.02em;
            opacity: 0;
            animation: fadeIn 0.8s 0.5s forwards;
        }
        
        .collection-subtitle {
            font-size: 1.1rem;
            max-width: 36rem;
            margin-bottom: 3.5rem;
            font-weight: 300;
            opacity: 0;
            animation: fadeIn 0.8s 0.7s forwards;
        }
        
        .shop-now-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.8rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--text-primary);
            text-decoration: none;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition);
            opacity: 0;
            animation: fadeIn 0.8s 0.9s forwards;
        }
        
        .shop-now-btn:hover {
            border-color: var(--text-primary);
            padding-right: 0.5rem;
        }
        
        .shop-now-btn::after {
            content: "→";
            font-size: 1.1rem;
            transition: var(--transition);
        }
        
        .shop-now-btn:hover::after {
            transform: translateX(0.25rem);
        }
        
        .decorative-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 1px;
            height: 100px;
            background-color: var(--border-color);
            opacity: 0;
            animation: fadeIn 0.8s 1.1s forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 768px) {
            body {
                padding: 0 8vw;
            }
            
            .luxury-container {
                padding: 15vw 0;
            }
            
            .collection-header {
                margin-bottom: 1.5rem;
            }
            
            .collection-title {
                margin-bottom: 1.5rem;
            }
            
            .collection-subtitle {
                margin-bottom: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="luxury-container">
        <div class="decorative-line"></div>
        <div class="collection-header">SUMMER COLLECTION</div>
        <h2 class="collection-title">Fall - Winter<br>Collections 2030</h2>
        <p class="collection-subtitle">
            A specialist label creating luxury essentials. Ethically crafted with an unwavering commitment to exceptional quality.
        </p>
        <a href="#" class="shop-now-btn">SHOP NOW</a>
    </div>
</body>
</html>