<!doctype html>
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
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="./admin/assets/images/logos/logo-light.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
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
            <li class="sidebar-item">
              <a class="sidebar-link rounded-1 p-2" href="{{ route('profit_calculate.admin') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Revenue</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
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
      <!--  Header End -->

      <!--  Main Content -->
      <div class="container-fluid">
        <div class="row">
          <!-- Quick Stats -->
          <div class="col-lg-3 col-md-6 mb-0">
            <div class="card shadow">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icons fas fa-shopping-cart card-icon"></i>
                    <h5 class="card-title mt-3">Total Orders</h5>
                    <p class="card-value">{{ number_format($total_orders, 2) ?? "N/A" }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-0">
            <div class="card shadow">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icons fas fa-dollar-sign card-icon"></i>
                    <h5 class="card-title mt-3">Total Revenue</h5>
                    <p class="card-value">PKR {{ number_format($totalProfit, 2) ?? "N/A" }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-0">
            <div class="card shadow">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icons fas fa-users card-icon"></i>
                    <h5 class="card-title mt-3">Total Customers</h5>
                    <p class="card-value">{{ $total_customers ?? "N/A" }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-0">
            <div class="card shadow">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icons fas fa-chart-line card-icon"></i>
                    <h5 class="card-title mt-3">Items Sold</h5>
                    <p class="card-value">{{ number_format($selled_products, 2) ?? "N/A" }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 offset-md-2">
              <div class="card shadow-sm ">
                  <div class="card-body">
                      <table class="table table-bordered table-hover text-center">
                          <thead class="table-black text-white">
                              <tr>
                                  <th>Current Month Sales</th>
                                  <th>Previous Month Sales</th>
                                  <th>Sales Growth</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>PKR {{ number_format($currentMonthSales, 2) }}</td>
                                  <td>PKR {{ number_format($previousMonthSales, 2) }}</td>
                                  <td>
                                      <span class="{{ $salesGrowth >= 0 ? 'text-success' : 'text-danger' }}">
                                          {{ number_format($salesGrowth, 2) }}%
                                      </span>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>


        <div class="row mt-4">
            <h5 class="text-left mb-4">Today's Orders</h5>

            @if($todayOrders->count() > 0)
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todayOrders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->billing_first_name }}&nbsp{{ $order->billing_last_name }}</td>
                        <td>PKR {{ number_format($order->total_amount, 2) ?? 'N/A' }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at->format('d-M-Y h:i A') ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info text-center">No orders found for today.</div>
            @endif
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
</html>