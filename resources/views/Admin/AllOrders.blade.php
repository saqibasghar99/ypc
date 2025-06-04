<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JuttBrand admin</title>
  <link rel="shortcut icon" type="image/png" href="./admin/assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="./css/styles.min.css" />
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

      <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
      <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-white" style="background-color: #232323">Order ID</th>
                                    <th class="text-white" style="background-color: #232323">Name</th>
                                    <th class="text-white" style="background-color: #232323">Email</th>
                                    <th class="text-white" style="background-color: #232323">Phone</th>
                                    <th class="text-white" style="background-color: #232323">Country</th>
                                    <th class="text-white" style="background-color: #232323">Quantity</th>
                                    <th class="text-white" style="background-color: #232323">Total_amount</th>
                                    <th class="text-white" style="background-color: #232323">Ordered_At</th>
                                    <th class="text-white" style="background-color: #232323">Payment_Status</th>
                                    <th class="text-white" style="background-color: #232323">Status</th>
                                    <th class="text-white" style="background-color: #232323">Update Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_orders as $orders)
                                <tr>
                                    <td class="fw-bold">#{{ $orders->order_number }}</td>
                                    <td>{{ $orders->billing_first_name }}&nbsp{{ $orders->billing_last_name }}</td>
                                    <td>{{ $orders->billing_email }}</td>
                                    <td>{{ $orders->billing_phone }}</td>
                                    <td>{{ $orders->billing_country }}</td>
                                    <td>{{ $orders->quantity }}</td>
                                    <td>Rs. {{ $orders->total_amount }}</td>
                                    <td>{{ $orders->created_at->format('d-M-Y h:i A') ?? 'N/A' }}</td>
                                    <td>
                                      @php
                                        $payment_status = ucfirst($orders->payment_status);
                                      @endphp

                                      @if($payment_status == "Paid")
                                        <span class="badge bg-success text-white">{{ $payment_status }}</span>
                                      @elseif($payment_status == "Unpaid")
                                        <span class="badge bg-warning text-white">{{ $payment_status }}</span>
                                      @else
                                        <span class="badge bg-danger text-white">{{ $payment_status }}</span>
                                      @endif
                                    </td>
                                    <td>
                                      @php
                                        $status = ucfirst($orders->status);
                                      @endphp

                                      @if($status == "Pending")
                                        <span class="badge bg-warning text-white">{{ $status }}</span>
                                      @elseif($status == "Processing")
                                        <span class="badge bg-primary text-white">{{ $status }}</span>
                                      @elseif($status == "Shipped")
                                        <span class="badge bg-info text-white">{{ $status }}</span>
                                      @elseif($status == "Delivered")
                                        <span class="badge bg-success text-white">{{ $status }}</span>
                                      @else
                                        <span class="badge bg-danger text-white">{{ $status }}</span>
                                      @endif
                                    </td>
                                    <td>
                                        <form class="d-flex flew-row" action="{{ route('orders.updateStatus', $orders->id) }}" method="POST">
                                            @csrf
                                            <select class="px-1 rounded-0" name="status" class="form-control" id="" required>
                                                <option value="">Order Status</option>
                                                <option value="pending" {{ $orders->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="processing" {{ $orders->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                                <option value="shipped" {{ $orders->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="delivered" {{ $orders->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                <option value="cancelled" {{ $orders->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                            <select class="px-1 mx-1 rounded-0" name="payment_status" class="form-control" id="" required>
                                                <option value="">Payment Status</option>
                                                <option value="paid" {{ $orders->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                                <option value="unpaid" {{ $orders->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                                <option value="refunded" {{ $orders->status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                                            </select>
                                            <button type="submit" class="btn btn-dark rounded-0 btn-sm my-auto mx-1 p-2">Update</button>
                                            <a href="{{ route('shipping.label.view', $orders->id) }}" target="blank" class="btn btn-sm btn-success" title="Shipping Label"><i class="fas fa-tag"></i> Label</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
  <script src="./admin/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="./admin/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="./admin/assets/js/sidebarmenu.js"></script>
  <script src="./admin/assets/js/app.min.js"></script>
  <script src="./admin/assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>