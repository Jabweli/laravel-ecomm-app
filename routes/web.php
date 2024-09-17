<?php

use Illuminate\Support\Facades\Auth;
use App\Livewire\Frontend\Singlepost;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
use App\Livewire\Frontend\Postsbycategory;
use App\Livewire\Admin\Product\Editproduct;
use App\Livewire\Frontend\ProductComponent;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\User\UserController;
use App\Livewire\Admin\Product\OrderView;
use App\Livewire\Frontend\Productsbycategory;
use App\Livewire\User\EditAddress;
use App\Livewire\User\RateProduct;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(App\Http\Controllers\FrontendController::class)->group(function () {
  Route::get('/', 'index')->name('index');
  Route::get('/about', 'about')->name('about');
  Route::get('/contact', 'contact')->name('contact');
  Route::get('/shop', 'shop')->name('shop');
  Route::get('/cart', 'cart')->name('product.cart');
  Route::get('/product', 'singleProduct')->name('single-product');
  Route::get('/blog', 'blog')->name('blog');
  Route::get('/post', 'blogDetail')->name('blog_detail');
  Route::get('/terms-&-conditions', 'terms');
  Route::get('/privacy-policy', 'privacy');
  Route::get('/faqs', 'faqs');
  Route::get('/wishlist', 'wishlist')->name('wishlist');
  Route::get('/hot-deals', 'hotDeals')->name('hot-deals');

  Route::post('/upload', 'upload')->name('ckeditor.upload');
  Route::get('/search', 'search')->name('product.search');
  Route::get('/thank-you', 'thankyou')->name('thank-you')->middleware('auth');
  Route::get('/payment/cancelled', 'cancelled')->name('payment.cancelled')->middleware('auth');
  Route::get('/payment/failed', 'failed')->name('payment.failed')->middleware('auth');
});

// checkout route
Route::group(['middleware' => 'auth.checkout'], function () {
  Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
});

// payment routes
Route::get('payment/paypal', [PayPalController::class, 'paypal'])->middleware('auth');
Route::post('payment/pay', [PayPalController::class, 'pay'])->name('payment.pay');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');
Route::get('payment/cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');

Route::get('product/{slug}', ProductComponent::class);
Route::get('products/category/{slug}', Productsbycategory::class);
Route::get('post/{slug}', Singlepost::class);
Route::get('posts/category/{slug}', Postsbycategory::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// user dashboard
Route::get('my-account', [UserController::class, 'index'])->middleware('auth');
Route::get('recently-viewed', [UserController::class, 'recentViews'])->name('user.recent-views')->middleware('auth');
Route::prefix('my-account')->middleware(['auth'])->group(function () {
  Route::controller(App\Http\Controllers\User\UserController::class)->group(function () {
    Route::get('dashboard', 'dashboard')->name('user.dashboard');
    Route::get('orders', 'orders')->name('user.orders');
    Route::get('order/{id}', 'orderDetail')->name('user.order.detail');
    Route::get('inbox', 'inbox')->name('user.inbox');
    Route::get('reviews', 'reviews')->name('user.reviews');
    Route::get('saved-items', 'savedItems')->name('user.saved-items');
    Route::get('track-order', 'trackOrder')->name('user.track-order');
    Route::get('address-book', 'addressBook')->name('user.address-book');
    Route::get('address/add', 'addressAdd')->name('user.address.add');
    Route::get('account-details', 'accountDetail')->name('user.account-detail');
  });
  Route::get('address/edit/{id}', EditAddress::class);
  Route::get('rate/{id}', RateProduct::class);
});


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {


  Route::controller(App\Http\Controllers\Admin\AdminController::class)->group(function () {

    //dashboard
    Route::get('dashboard', 'index')->name('admin.dashboard');


    // products
    Route::get('product/categories', 'productCat');
    Route::get('products', 'products')->name('admin.products');
    Route::get('product/add', 'productAdd');
    Route::get('orders', 'orders');

    // coupon routes
    Route::get('coupons', 'coupons');

    // post category routes
    Route::get('post/categories', 'category');

    //homeslider route
    Route::get('/sliders', 'sliders');

    //blog post routes
    Route::get('posts', 'posts');

    Route::get('post/comments', 'comments');

    Route::get('create/post', 'addpost');

    Route::get('edit/post/{id}', 'editpost');

    Route::post('update/{id}', 'updatepost');

    Route::get('settings', 'settings');

    Route::get('messages', 'messages');

    Route::get('testimonials', 'testimonials');

    Route::get('newsletters', 'newsletters');

    Route::get('faqs', 'faqs');

    Route::get('privacy-policy', 'privacy');

    Route::get('terms-&-conditions', 'terms');
  });

  Route::get('product/edit/{id}', Editproduct::class);

  Route::get('order/view/{id}', OrderView::class);
});


// Route::middleware('isAdmin')->group(function(){
//    Route::get('product/edit/{id}', Editproduct::class);
// });