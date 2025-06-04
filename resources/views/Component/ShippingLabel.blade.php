<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shipping Label - PriceGit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Segoe+UI&display=swap" rel="stylesheet">

  <style>
    body {
      padding: 40px;
      font-family: 'Segoe UI', sans-serif;
    }

    .shipping-label {
      width: 11in;
      /* height: 5.20in; */
      background: #ffffff;
      border-radius: 12px;
      padding: 30px 40px;
      border: 1px solid #ccc;
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
    }

    .company-name {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      font-weight: 600;
      color: #1a1a1a;
      letter-spacing: 2px;
    }

    .small-text {
      font-size: 13px;
      color: #777;
    }

    .section-title {
      font-size: 12px;
      font-weight: 700;
      color: #5a5a5a;
      text-transform: uppercase;
      margin-bottom: 4px;
      letter-spacing: 0.5px;
    }

    .border-box {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 12px;
      font-size: 12px;
      color: #333;
      background-color: #fafafa;
    }

    .barcode {
      width: 200px;
      height: auto;
    }

    .barcode svg {
      width: 100% !important;
      height: auto !important;
    }

    .order-items li {
      font-size: 13px;
      color: #444;
    }

    .mini-header{
      font-size: 13px;
    }

    .mini-header span{
      font-weight: 700;
      color: #5a5a5a;
    }

    .scissor-line {
      display: flex;
      align-items: center;
      position: relative;
      margin: 20px 0;
    }

    .scissor-line::before {
      content: "";
      flex-grow: 1;
      border-top: 2px dashed #999;
      margin-right: 10px;
    }

    .scissor-icon {
      font-size: 8px;
      white-space: nowrap;
      transform: rotate(-90deg); /* optional */
    }

    .scissor-line::after {
      content: "";
      flex-grow: 1;
      border-top: 2px dashed #999;
      margin-left: 10px;
    }

    @media print {
      .barcode {
        display: block !important;
        visibility: visible !important;
      }
    }



    @media print {
      body {
        margin: 0;
        background: #fff;
      }

      .shipping-label {
        border: none;
        box-shadow: none;
        width: 100%;
        height: auto;
        page-break-after: always;
      }
    }
  </style>
</head>
<body>

<div class="shipping-label container-fluid">
  <div class="border px-3 py-1 rounded-3">
    <div class="row mb-2">
    <div class="col-6">
      <div class="company-name">PRICEGIT</div>
      <div class="small-text">123 Business St, Lahore, Punjab 54000, Pakistan</div>
    </div>
    <div class="col-6 text-end mini-header">
      <div><span class="mx-1">Order #:</span>{{ $order->order_number }}</div>
      <div><span class="mx-1">Date:</span>{{ $order->created_at->format('d-M-Y h:i A') ?? 'N/A' }}</div>
      <div><span class="mx-1">Total:</span>Rs. {{ $order->total_amount }}</div>
      <div><span class="mx-1">Items:</span>{{ $order->quantity }}</div>
    </div>
  </div>

  <div class="row">
    <!-- SHIP TO -->
    <div class="col-5">
      <div class="section-title">Ship To</div>
      <div class="border-box">
        <strong>{{ $order->billing_first_name }}&nbsp{{ $order->billing_last_name }}</strong><br>
        {{ $order->billing_address }}<br>
        {{ $order->billing_country }}<br>
        Phone: {{ $order->billing_phone }}<br>
        Email: {{ $order->billing_email }}
      </div>

      <div class="section-title mt-2">Order Items</div>
        <ul class="border-box order-items ps-3" style="list-style: none;">
        @foreach($order->items as $item)
          <li>&#10022; {{ $item->quantity }} x {{ $item->product->productname ?? 'N/A' }}</li>
        @endforeach
        </ul>
    </div>

    <div class="col-3">
      <div class="section-title">Shipping From</div>
        <div class="border-box mb-3">
          <strong>PriceGit logo</strong><br>
        House #12, Model Town<br>
        Lahore, Punjab 54000<br>
        Pakistan<br>
        Email: pricegit@gmail.com
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
          <small class="my-2 d-none">{{ $order->order_number }}</small>
          <div id="qrcode"></div>
          <div class="small-text mt-1">SCAN TO TRACK</div>
        </div>
      </div>
      

    <!-- SHIPPING INFO -->
    <div class="col-4">
      <div class="section-title">Shipping Method</div>
      <div class="border-box mb-3">
        COD - Standard Delivery<br>
        Tracking #: {{ $order->order_number }}
      </div>

      <div class="section-title">Package</div>
      <div class="border-box">
        @foreach($order->items as $item)
        @if($item->product && $item->product->specifications)
          <ul class="d-flex flex-row justify-content-between" style="padding-left: 0;">
            <div>
              @if(!empty($item->product->specifications->brand))
              <li style="list-style: none;"><span class="fw-bold">Brand</span>: {{ $item->product->specifications->brand }}</li>
              @endif
              
              @if(!empty($item->product->specifications->model))
                <li style="list-style: none;"> <span class="fw-bold">Model</span>: {{ $item->product->specifications->model }}</li>
              @endif
              
              @if(!empty($item->product->specifications->display))
                <li style="list-style: none;"><span class="fw-bold">Display</span>: {{ $item->product->specifications->display }}</li>
              @endif
              
              @if(!empty($item->product->specifications->processor))
                <li style="list-style: none;"><span class="fw-bold">Processor</span>: {{ $item->product->specifications->processor }}</li>
              @endif
              
              @if(!empty($item->product->specifications->ram))
                <li style="list-style: none;"><span class="fw-bold">Ram</span>: {{ $item->product->specifications->ram }}</li>
              @endif
              
              @if(!empty($item->product->specifications->storage))
                <li style="list-style: none;"><span>Storage</span>: {{ $item->product->specifications->storage }}</li>
              @endif
              
              @if(!empty($item->product->specifications->battery))
                <li style="list-style: none;"><span class="fw-bold">Battery</span>: {{ $item->product->specifications->battery }}</li>
              @endif
            </div>
            
            <div class="">
              @if(!empty($item->product->specifications->os))
                <li style="list-style: none;"><span class="fw-bold">OS</span>: {{ $item->product->specifications->os }}</li>
              @endif
              
              @if(!empty($item->product->specifications->camera))
                <li style="list-style: none;"><span class="fw-bold">Camera</span> {{ $item->product->specifications->camera }}</li>
              @endif
            
               @if(!empty($item->product->specifications->connectivity))
              <li style="list-style: none;"><span class="fw-bold">Connectivity</span>: {{ $item->product->specifications->connectivity }}</li>
              @endif
              
              @if(!empty($item->product->specifications->weight))
                <li style="list-style: none;"><span class="fw-bold">Weight</span>: {{ $item->product->specifications->weight }}</li>
              @endif
              
              @if(!empty($item->product->specifications->dimensions))
                <li style="list-style: none;"><span class="fw-bold">Dimensions</span>: {{ $item->product->specifications->dimensions }}</li>
              @endif
              
              @if(!empty($item->product->specifications->warranty))
                <li style="list-style: none;"><span class="fw-bold">Warranty</span>: {{ $item->product->specifications->warranty }}</li>
              @endif
              
              @if(!empty($item->product->specifications->included_items))
                <li style="list-style: none;"><span class="fw-bold">Included Items</span>: {{ $item->product->specifications->included_items }}</li>
              @endif
            </div>

          </ul>
        @endif
      @endforeach

      </div>

    </div>
  </div>

</div>
<div class="row">
  <div class="col-6"></div>
  <div class="col-6 text-end small-text">
    Track your order: <strong>www.pricegit.com/track</strong>
  </div>
</div>
  <div class="scissor-line">
    <span class="scissor-icon">✂️</span>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>


<!-- <script>
    const orderNumber = @json($order->order_number);
    const baseUrl = "{{ url('/order/details') }}/" + orderNumber;

    // Generate QR code
    new QRCode(document.getElementById("qrcode"), {
        text: baseUrl,
        width: 90,
        height: 90,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H // High error correction
    });
</script> -->

<script>
    const userId =  @json(session('id'));;
    const purchaseHistoryUrl = "{{ url('/') }}" + "/purchase-history";

    new QRCode(document.getElementById("qrcode"), {
        text: purchaseHistoryUrl,
        width: 90,
        height: 90,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });
</script>


</body>
</html>
