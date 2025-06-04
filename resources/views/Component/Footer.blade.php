

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engaging eCommerce Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Footer.css') }}">
</head>
<body>

<footer class="text-light pt-5 pb-3" style="background: linear-gradient(to right,rgb(66, 64, 87),rgb(51, 49, 78),rgb(65, 65, 87));">
    <div class="container">
        <div class="row">

            <!-- Brand Info -->
            <div class="col-md-3 mb-4">
                <h4 class="fw-bold" style="font-family: 'Poppins', sans-serif;">
                    ✂️ <span style="color: #fff;">ShopifyX</span>
                </h4>
                <p class=" small">
                    Subscribe Easy Tutorials Youtube channel to watch more videos on website development and press the bell icon to get immediate notification of latest videos.
                </p>
            </div>

            <!-- Office Info -->
            <div class="col-md-3 mb-4">
                <h6 class="text-uppercase fw-bold mb-3">Office</h6>
                <p class=" small mb-1">ITPL Road<br>Whitefield, Bangalore<br>Karnataka, PIN 560066<br>India</p>
                <p class=" small mb-1">
                    <a href="mailto:avinashdm@outlook.com" class="text-decoration-none text-light">avinashdm@outlook.com</a>
                </p>
                <p class=" small mb-0 fw-bold">+91 – 0123456789</p>
            </div>

            <!-- Links -->
            <div class="col-md-2 mb-4">
                <h6 class="text-uppercase fw-bold mb-3">Shop</h6>
                <ul class="list-unstyled  small">
                    <li><a href="#categories" class="text-decoration-none text-light">By Category</a></li>
                    <li><a href="{{ route('category.products', 'electronics') }}" class="text-decoration-none text-light">Electronics</a></li>
                    <li><a href="{{ route('category.products', 'gifts') }}" class="text-decoration-none text-light">Gifts</a></li>
                    <li><a href="{{ route('category.products', 'beauty') }}" class="text-decoration-none text-light">Beauty</a></li>
                    <li><a href="{{ route('category.products', 'watches') }}" class="text-decoration-none text-light">Watches</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="col-md-4 mb-4">
                <h6 class="text-uppercase fw-bold mb-3">Newsletter</h6>
                <form class="d-flex mb-3">
                    <input type="email" class="shadow-none form-control white-placeholder me-2 bg-transparent text-white border-bottom border-secondary" placeholder="Enter your email id" style="border-radius: 0; border-top: none; border-left: none; border-right: none;">
                    <button type="submit" class="btn btn-outline-light border-0"><i class="fas fa-arrow-right"></i></button>
                </form>
                <div class="d-flex gap-3">
                    <a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://wa.me/923471428593" target="_blank" class="text-light"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div>

        <!-- Bottom -->
        <div class="text-center border-top border-secondary pt-3 mt-4">
            <p class="mb-0  small">Easy Tutorials © 2025 – All Rights Reserved</p>
        </div>
    </div>
</footer>

</body>
</html>

