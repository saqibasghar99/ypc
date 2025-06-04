<?php

// use App\Models\User;
// use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\AdminMiddleware;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CartController;
// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\GoogleController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\ProductSpecificationController;



// Route::fallback(function () {
//     return response()->view('component.Error404', [], 404);
// });

// Route::get('/', function(){
//     return view('Pages.Index');
// });


// Route::post('/signup', [AuthController::class, 'Signup'])->name('signup');
// Route::post('/signin', [AuthController::class, 'Signin'])->name('signin');

// Route::post('/add-category', [ProductController::class, 'AddCategory'])->name('add-category');
// Route::delete('/delete-category/{id}', [ProductController::class, 'deleteCategory'])->name('category.destroy');

// Route::get('/', [ProductController::class, 'ShowProducts'])->name('index.page');
// Route::get('/add-product', [ProductController::class, 'ShowCategories']);
// Route::post('/add-product', [ProductController::class, 'ListProduct'])->name('add-product');

// Route::get('/product/{id}', [ProductController::class, 'ShowProductdetail'])->name('product.detail');
// Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');

// Route::get('/category/{category}', [ProductController::class, 'showCategoryProducts'])->name('category.products');
// Route::get('/product/{id}', [ProductController::class, 'showProductDetail'])->name('product.detail');

// Route::get('/all_users', [AuthController::class, 'getallUsers'])->name('users.all');
// Route::post('/user/{id}/delete_user', [AuthController::class, 'delete_user'])->name('user.delete');

// Route::get('/shipping-label/view/{orderId}', [OrderController::class, 'showShippingLabel'])->name('shipping.label.view');


// Route::get('/signup', function(){
//     return view('Auth.Signup');
// });

// Route::get('/signin', function(){
//     return view('Auth.Signin');
// })->name('signin');

// Route::get('/add-category', function(){
//     return view('Admin.Addcategory');
// });


// Route::get('/cart-products', [CartController::class, 'viewCart'])->name('cart.view');
// Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
// Route::post('/update-cart/{itemId}', [CartController::class, 'updateQuantity']);

// Route::post('/remove-cart-item/{itemId}', [CartController::class, 'removeCartItem'])->name('cart.remove');
// Route::get('/remove-cart-item/{itemId}', [CartController::class, 'removeCartItem'])->name('cart.remove');

// Route::post('/checkout', [OrderController::class, 'storeOrders'])->name('order.store');
// Route::get('/checkout', [OrderController::class, 'SeeCartProducts'])->name('cart-checkout.view');

// Route::post('/cart/buy-now', [CartController::class, 'buyNow'])->name('cart.buyNow');

// Route::get('/purchase-history', [OrderController::class, 'Purchase_history'])->name('purchase.history');

// Route::get('/all_orders', [OrderController::class, 'all_orders'])->name('update.order.status');
// Route::post('/all_orders/{id}/update-status', [OrderController::class, 'update_order_status'])->name('orders.updateStatus');

// Route::get('/update_fee_fixer', [OrderController::class, 'get_allFee'])->name('all.fee');
// Route::post('/update_fee_fixer/{id}/update-feefix', [OrderController::class, 'update_feefixer'])->name('feefixer.update');
// Route::delete('/delete-feefixer/{id}', [ProductController::class, 'deleteFeeFixer'])->name('feefixer.destroy');

// Route::post('/add_fee_fixer', [OrderController::class, 'add_feefixer'])->name('feefixer.add');

// Route::get('/all_products', [ProductController::class, 'ShowAllProductstoAdmin'])->name('showall_product.admin');
// Route::get('/products/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
// Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('product.update');
// Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('products.destroy');


// Route::get('/all_categories', [ProductController::class, 'ShowAllCategoriestoAdmin'])->name('showall_category.admin');
// Route::get('/most_order_items', [ProductController::class, 'ShowMostOrderItemstoAdmin'])->name('showall_mostOrderItems.admin');

// Route::get('/profit_clc', [OrderController::class, 'ProductProfitCalc'])->name('profit_calculate.admin');

// Route::get('/brand-admin', [DashboardController::class, 'totalOrders'])->middleware('admin')->name('admin.dashboard');



// Route::get('/profile', function(){
//     return view("Pages.Profile");
// })->name('profile.show');


// Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
// Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

// Route::get('/live-search', [ProductController::class, 'liveSearch'])->name('products.liveSearch');


// Route::prefix('admin')->middleware('admin')->group(function() {
//     Route::get('/test-admin', function () {
//         return 'Admin middleware works here now!';
//     });
// });


// Route::get('/add_fee_fixer', function(){
//     return view('Admin.NewFeeFixer');
// });

// Route::get('/shop-detail', function(){
//     return view('Pages.Shopdetail');
// });

// Route::get('/edit-product', function(){
//     return view('Admin.UpdateProduct');
// });

// Route::get('/list-product', function(){
//     return view('Admin.Productlisting');
// });

// Route::get('/list-category', function(){
//     return view('Admin.Addcategory');
// });



// Route::get('product/{productId}/specifications/create', [ProductSpecificationController::class, 'create'])->name('product-specifications.create');
// Route::post('product/{productId}/specifications', [ProductSpecificationController::class, 'store'])->name('product-specifications.store');
// Route::get('product/{productId}/specifications/edit', [ProductSpecificationController::class, 'edit'])->name('product-specifications.edit');
// Route::put('product/{productId}/specifications', [ProductSpecificationController::class, 'update'])->name('product-specifications.update');


// Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route::get('/set-password/{user}', [GoogleController::class, 'showPasswordForm'])->name('setPassword');
// Route::post('/set-password/{user}', [GoogleController::class, 'updatePassword']);



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSpecificationController;

/*
|--------------------------------------------------------------------------
| Global Fallback Route
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return response()->view('component.Error404', [], 404);
});

Route::get('/not-found', function () {
    return response()->view('component.Error404', [], 404);
})->name('404');

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [ProductController::class, 'ShowProducts'])->name('index.page');
Route::get('/shop-detail', fn() => view('Pages.Shopdetail'));

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::view('/signup', 'Auth.Signup');
Route::view('/signin', 'Auth.Signin')->name('signin');
Route::post('/signup', [AuthController::class, 'Signup'])->name('signup');
Route::post('/signin', [AuthController::class, 'Signin'])->name('signin');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');

/*
|--------------------------------------------------------------------------
| Google Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/set-password/{user}', [GoogleController::class, 'showPasswordForm'])->name('setPassword');
Route::post('/set-password/{user}', [GoogleController::class, 'updatePassword']);

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

/*
|--------------------------------------------------------------------------
| Product & Category Routes
|--------------------------------------------------------------------------
*/
Route::get('/add-product', [ProductController::class, 'ShowCategories'])->middleware('admin');
Route::post('/add-product', [ProductController::class, 'ListProduct'])->middleware('admin')->name('add-product');

Route::get('/product/{id}', [ProductController::class, 'ShowProductdetail'])->name('product.detail');
Route::get('/category/{category}', [ProductController::class, 'showCategoryProducts'])->name('category.products');

Route::post('/add-category', [ProductController::class, 'AddCategory'])->middleware('admin')->name('add-category');
Route::delete('/delete-category/{id}', [ProductController::class, 'deleteCategory'])->middleware('admin')->name('category.destroy');

Route::get('/all_products', [ProductController::class, 'ShowAllProductstoAdmin'])->middleware('admin')->name('showall_product.admin');
Route::get('/products/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->middleware('admin')->name('product.update');
Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->middleware('admin')->name('products.destroy');

Route::get('/all_categories', [ProductController::class, 'ShowAllCategoriestoAdmin'])->middleware('admin')->name('showall_category.admin');
Route::get('/most_order_items', [ProductController::class, 'ShowMostOrderItemstoAdmin'])->middleware('admin')->name('showall_mostOrderItems.admin');

Route::get('/live-search', [ProductController::class, 'liveSearch'])->name('products.liveSearch');

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/
Route::get('/cart-products', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/update-cart/{itemId}', [CartController::class, 'updateQuantity']);
Route::match(['get', 'post'], '/remove-cart-item/{itemId}', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::post('/cart/buy-now', [CartController::class, 'buyNow'])->name('cart.buyNow');

/*
|--------------------------------------------------------------------------
| Checkout & Order Routes
|--------------------------------------------------------------------------
*/
Route::get('/checkout', [OrderController::class, 'SeeCartProducts'])->name('cart-checkout.view');
Route::post('/checkout', [OrderController::class, 'storeOrders'])->name('order.store');
Route::get('/purchase-history', [OrderController::class, 'Purchase_history'])->name('purchase.history');

Route::get('/all_orders', [OrderController::class, 'all_orders'])->middleware('admin')->name('update.order.status');
Route::post('/all_orders/{id}/update-status', [OrderController::class, 'update_order_status'])->middleware('admin')->name('orders.updateStatus');

Route::get('/shipping-label/view/{orderId}', [OrderController::class, 'showShippingLabel'])->middleware('admin')->name('shipping.label.view');
Route::get('/order/details/{order_number}', [OrderController::class, 'showOrderByNumber']);


/*
|--------------------------------------------------------------------------
| Fee Fixer Routes
|--------------------------------------------------------------------------
*/
Route::get('/update_fee_fixer', [OrderController::class, 'get_allFee'])->middleware('admin')->name('all.fee');
Route::post('/add_fee_fixer', [OrderController::class, 'add_feefixer'])->middleware('admin')->name('feefixer.add');
Route::post('/update_fee_fixer/{id}/update-feefix', [OrderController::class, 'update_feefixer'])->middleware('admin')->name('feefixer.update');
Route::delete('/delete-feefixer/{id}', [ProductController::class, 'deleteFeeFixer'])->middleware('admin')->name('feefixer.destroy');

/*
|--------------------------------------------------------------------------
| Admin Dashboard (Middleware Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('admin')->group(function () {
    Route::get('/brand-admin', [DashboardController::class, 'totalOrders'])->name('admin.dashboard');
    
    // Admin test route under prefix
    Route::prefix('admin')->group(function () {
        Route::get('/test-admin', fn() => 'Admin middleware works here now!');
    });
});

/*
|--------------------------------------------------------------------------
| User Management Routes
|--------------------------------------------------------------------------
*/
Route::get('/all_users', [AuthController::class, 'getallUsers'])->middleware('admin')->name('users.all');
Route::post('/user/{id}/delete_user', [AuthController::class, 'delete_user'])->middleware('admin')->name('user.delete');

/*
|--------------------------------------------------------------------------
| Profit Calculation
|--------------------------------------------------------------------------
*/
Route::get('/profit_clc', [OrderController::class, 'ProductProfitCalc'])->middleware('admin')->name('profit_calculate.admin');

/*
|--------------------------------------------------------------------------
| Product Specification Routes
|--------------------------------------------------------------------------
*/
Route::prefix('product/{productId}/specifications')->group(function () {
    Route::get('/create', [ProductSpecificationController::class, 'create'])->middleware('admin')->name('product-specifications.create');
    Route::post('/', [ProductSpecificationController::class, 'store'])->middleware('admin')->name('product-specifications.store');
    Route::get('/edit', [ProductSpecificationController::class, 'edit'])->middleware('admin')->name('product-specifications.edit');
    Route::put('/', [ProductSpecificationController::class, 'update'])->middleware('admin')->name('product-specifications.update');
});

/*
|--------------------------------------------------------------------------
| Blade View Routes (For Admin)
|--------------------------------------------------------------------------
*/
Route::view('/add-category', 'Admin.Addcategory')->middleware('admin');
Route::view('/add_fee_fixer', 'Admin.NewFeeFixer')->middleware('admin');
Route::view('/edit-product', 'Admin.UpdateProduct')->middleware('admin');
Route::view('/list-product', 'Admin.Productlisting')->middleware('admin');
Route::view('/list-category', 'Admin.Addcategory')->middleware('admin');


// dummy admin creation routes

Route::get('/admin-to-admin', function() {
    return view('Auth.AdminSignup');
})->name('admin-to-admin');
Route::post('/admin-to-admin', [AuthController::class, 'AdminSignup'])->name('admin-to-admin');
