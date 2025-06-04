<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Product | JuttBrand Admin</title>
  <link rel="shortcut icon" type="image/png" href="./admin/assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/Productlisting.css') }}" />
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

     <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="/admin/assets/images/logos/logo-light.svg" alt="" />
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
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-black">Update Product</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Product Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="productname" class="form-control" value="{{ $products->productname }}" >
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Description</label>
                  <div class="col-sm-9">
                    <textarea name="productdescription" class="form-control" rows="4">{{ $products->productdescription }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Stock Quantity</label>
                  <div class="col-sm-9">
                    <input type="number" name="stockquantity" class="form-control" value="{{ $products->stockquantity }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Cost Price</label>
                  <div class="col-sm-9">
                    <input type="number" name="costprice" class="form-control" step="0.01" value="{{ $products->costprice }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Selling Price</label>
                  <div class="col-sm-9">
                    <input type="number" name="totalprice" class="form-control" step="0.01" value="{{ $products->totalprice }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">% Discount</label>
                  <div class="col-sm-9">
                    <input type="number" name="discount" class="form-control" value="{{ $products->discount }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Category</label>
                  <div class="col-sm-9">
                  <select name="category" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{ $category->name }}" {{ $products->category == $category->name ? 'selected' : '' }}>
                        {{ $category->name }}
                        </option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Size</label>
                    <div class="col-sm-9">
                        <select name="size" class="form-select">
                        <option value="Small (S)" {{ $products->size == 'Small (S)' ? 'selected' : '' }}>Small (S)</option>
                        <option value="Medium (M)" {{ $products->size == 'Medium (M)' ? 'selected' : '' }}>Medium (M)</option>
                        <option value="Large (L)" {{ $products->size == 'Large (L)' ? 'selected' : '' }}>Large (L)</option>
                        <option value="Extra Large (XL)" {{ $products->size == 'Extra Large (XL)' ? 'selected' : '' }}>Extra Large (XL)</option>
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Status</label>
                  <div class="col-sm-9">
                    <select name="status" class="form-select">
                      <option value="active" {{ $products->status == 'active' ? 'selected' : '' }}>Active</option>
                      <option value="inactive" {{ $products->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-4 d-flex flex-row">
                    <div class="col-sm-9">
                      <label class="col-sm-3 col-form-label">Product Image</label>
                        <input type="file" name="image" class="form-control mb-2">
                        @if ($products->image)
                        <img src="{{ Storage::url($products->image) }}" class="img-thumbnail" width="150" height="150">
                        @endif
                    </div>
                </div>

                <div class="row mb-4 d-flex flex-row">
                    <div class="col-sm-4">
                      <label class="col-sm-3 col-form-label">Preview_#01</label>
                        <input type="file" name="preview_image1" class="form-control mb-2">
                        @if ($products->preview_image1)
                        <img src="{{ Storage::url($products->preview_image1) }}" class="img-thumbnail" width="150" height="150">
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <label class="col-sm-3 col-form-label">Preview_#02</label>
                        <input type="file" name="preview_image2" class="form-control mb-2">
                        @if ($products->preview_image2)
                        <img src="{{ Storage::url($products->preview_image2) }}" class="img-thumbnail" width="150" height="150">
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <label class="col-sm-3 col-form-label">Preview_#03</label>
                        <input type="file" name="preview_image3" class="form-control mb-2">
                        @if ($products->preview_image3)
                        <img src="{{ Storage::url($products->preview_image3) }}" class="img-thumbnail" width="150" height="150">
                        @endif
                    </div>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn rounded-0 text-white" style="background-color: #232323">Update Product</button>
                  <a href="{{ route('showall_product.admin') }}" class="my-2 btn btn-outline-dark rounded-2 text-center border border-dark">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<script src="{{ asset('admin/assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="./admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./admin/assets/js/sidebarmenu.js"></script>
  <script src="./admin/assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
