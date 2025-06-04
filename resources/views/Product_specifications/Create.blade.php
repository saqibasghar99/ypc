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

     <div class="container">
        <h1>Add Product Specifications for {{ $product->productname }}</h1>

        <form action="{{ route('product-specifications.store', $product->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" name="brand" class="form-control" id="brand" value="{{ old('brand') }}">
            </div>

            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" class="form-control" id="model" value="{{ old('model') }}">
            </div>

            <div class="form-group">
                <label for="display">Display</label>
                <input type="text" name="display" class="form-control" id="display" value="{{ old('display') }}">
            </div>

            <div class="form-group">
                <label for="processor">Processor</label>
                <input type="text" name="processor" class="form-control" id="processor" value="{{ old('processor') }}">
            </div>

            <div class="form-group">
                <label for="ram">RAM</label>
                <input type="text" name="ram" class="form-control" id="ram" value="{{ old('ram') }}">
            </div>

            <div class="form-group">
                <label for="storage">Storage</label>
                <input type="text" name="storage" class="form-control" id="storage" value="{{ old('storage') }}">
            </div>

            <div class="form-group">
                <label for="battery">Battery</label>
                <input type="text" name="battery" class="form-control" id="battery" value="{{ old('battery') }}">
            </div>

            <div class="form-group">
                <label for="os">Operating System</label>
                <input type="text" name="os" class="form-control" id="os" value="{{ old('os') }}">
            </div>

            <div class="form-group">
                <label for="camera">Camera</label>
                <input type="text" name="camera" class="form-control" id="camera" value="{{ old('camera') }}">
            </div>

            <div class="form-group">
                <label for="connectivity">Connectivity</label>
                <input type="text" name="connectivity" class="form-control" id="connectivity" value="{{ old('connectivity') }}">
            </div>

            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="text" name="weight" class="form-control" id="weight" value="{{ old('weight') }}">
            </div>

            <div class="form-group">
                <label for="dimensions">Dimensions</label>
                <input type="text" name="dimensions" class="form-control" id="dimensions" value="{{ old('dimensions') }}">
            </div>

            <div class="form-group">
                <label for="warranty">Warranty</label>
                <input type="text" name="warranty" class="form-control" id="warranty" value="{{ old('warranty') }}">
            </div>

            <div class="form-group">
                <label for="included_items">Included Items</label>
                <textarea name="included_items" class="form-control" id="included_items">{{ old('included_items') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Specifications</button>
        </form>
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