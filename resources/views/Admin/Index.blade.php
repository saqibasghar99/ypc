<!-- <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JuttBrand admin</title>
  <link rel="shortcut icon" type="image/png" href="./admin/assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="./css/styles.min.css" />
  <link rel="stylesheet" href="./css/Productlisting.css" />
</head>
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="./admin/assets/images/logos/logo-light.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="/brand-admin" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="{{ route('add-product') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">List Product</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="{{route('add-category')}}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Add Category</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="{{route('users.all')}}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Customers</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="{{ route('update.order.status') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Orders</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="{{ route('feefixer.add') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Fee Fixer</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="/update_fee_fixer" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">FeeFixer Status</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="{{ route('showall_product.admin') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Products</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="{{ route('showall_category.admin') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Categories</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="{{ route('showall_mostOrderItems.admin') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Top Picks</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="#" target="_blank"
                class="btn btn-primary me-2"><span class="d-none d-md-block">Orders</span> <span class="d-block d-md-none">Pro</span></a>
              <a href="#" target="_blank"
                class="btn btn-success"><span class="d-none d-md-block">Generate Sale</span> <span class="d-block d-md-none">Free</span></a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="./admin/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icons fas fa-shopping-cart card-icon"></i>
                    <h5 class="card-title mt-3">Total Orders</h5>
                    <p class="card-value">{{ $total_orders ?? "N/A"}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icons fas fa-dollar-sign card-icon"></i>
                    <h5 class="card-title mt-3">Total Revenue</h5>
                    <p class="card-value">$12,345</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icons fas fa-users card-icon"></i>
                    <h5 class="card-title mt-3">Total Customers</h5>
                    <p class="card-value">5,678</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icons fas fa-chart-line card-icon"></i>
                    <h5 class="card-title mt-3">Sales Growth</h5>
                    <p class="card-value">+12.5%</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./admin/assets/js/sidebarmenu.js"></script>
  <script src="./admin/assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html> -->