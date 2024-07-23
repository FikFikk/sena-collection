<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="../dist/css/tiny-slider.css" rel="stylesheet">
  <link href="../dist/css/style.css" rel="stylesheet">
  <title>Shop | Sena Collection</title>

  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  @include('layout.usernav')

  <div class="untree_co-section before-footer-section">
    <div class="container">
      <div class="row mb-5">
        @if(session('status') == 'success')
          <script>
            Swal.fire({
              icon: 'success',
              title: '{{ session('message') }}',
              toast: true,
              position: 'top-center',
              showConfirmButton: false,
              timer: 3000
            });
          </script>
        @endif

        <form class="col-md-12" method="post" action="{{ route('cart.updateQuantity') }}">
          @csrf
          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartItems as $cartItem)
                <tr>
                  <td class="product-thumbnail">
                    <img src="{{ asset($cartItem->product->images) }}" alt="Image" class="img-fluid">
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black">{{ $cartItem->product->title }}</h2>
                  </td>
                  <td>${{ $cartItem->product->price }}</td>
                  <td>
                  <form action="{{ route('cart.updateQuantity') }}" method="POST" class="update-quantity-form d-flex align-items-center justify-content-center">
                  @csrf
                  <input type="hidden" name="id" value="{{ $cartItem->id }}">
                    <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-black decrease" type="submit" name="decrease" value="{{ $cartItem->id }}" data-id="{{ $cartItem->id }}">&minus;</button>
                      </div>
                      <input type="text" class="form-control text-center quantity-amount" name="quantity[{{ $cartItem->id }}]" value="{{ $cartItem->quantity }}" readonly>
                      <div class="input-group-append">
                        <button class="btn btn-outline-black increase" type="submit" name="increase" value="{{ $cartItem->id }}" data-id="{{ $cartItem->id }}">&plus;</button>
                      </div>
                    </div>
                  </form>
                  </td>
                  <td>${{ $cartItem->product->price * $cartItem->quantity }}</td>
                  <td>
                    <form action="{{ route('cart.removeItem') }}" method="POST">
                      @csrf
                      <input type="hidden" name="cart_id" value="{{ $cartItem->id }}">
                      <button type="submit" class="btn btn-black btn-sm">X</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
              <button class="btn btn-black btn-sm btn-block">Update Cart</button>
            </div>
            <div class="col-md-6">
              <a class="btn btn-outline-black btn-sm btn-block" href="{{ route('dashboard.checkout') }}">Continue Shopping</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="text-black h4" for="coupon">Coupon</label>
              <p>Enter your coupon code if you have one.</p>
            </div>
            <div class="col-md-8 mb-3 mb-md-0">
              <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
            </div>
            <div class="col-md-4">
              <button class="btn btn-black">Apply Coupon</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Subtotal</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">${{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}</strong>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">${{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}</strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <a class="btn btn-black btn-lg py-3 btn-block" href ="{{ route('dashboard.checkout') }}">Proceed To Checkout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
