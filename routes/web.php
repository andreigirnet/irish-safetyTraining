<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

    Route::middleware(['auth'])->group(function () {
    //After Login the routes are accept by the loginUsers...
        Route::get('/home', [App\Http\Controllers\ProfileController::class,'index'])->name('admin.en.home');

        Route::get('/profile',[App\Http\Controllers\ProfileController::class,'show'])->name('admin.en.profile');
        Route::put('/profile/store/image',[App\Http\Controllers\ProfileController::class,'storeImage'])->name('store.profileImg');

        Route::get('/dashboard/employer', [App\Http\Controllers\EmployeeController::class,'index'])->name('dashboard.employer');
        Route::delete('/delete/employer/{id}', [App\Http\Controllers\EmployeeController::class,'destroy'])->name('delete.employer');
        Route::get('/employer/consulting', function(){
            return view('admin.administrator.consulting');
        })->name('admin.consulting');
        Route::get('/register/employee', [App\Http\Controllers\EmployeeController::class,'create'])->name('register.employee');
        Route::post('/register/employee/store', [App\Http\Controllers\EmployeeController::class,'store'])->name('register.employee.store');
        Route::delete('/delete/employee/{id}', [App\Http\Controllers\EmployeeController::class,'destroy'])->name('employee.delete');

        Route::get('/cart', [App\Http\Controllers\BasketController::class,'index'])->name('basket.index');
        Route::get('/cart/get', [App\Http\Controllers\BasketController::class,'getCartItems'])->name('basket.get');
        Route::post('/cart/add/', [App\Http\Controllers\BasketController::class,'store'])->name('basket.store');
        Route::delete('/cart/delete/{item}', [App\Http\Controllers\BasketController::class,'destroy'])->name('basket.delete');
        Route::post('/add/cart', [App\Http\Controllers\BasketController::class,'store'])->name('basket.add');
        Route::put('/cart/update/{item}', [App\Http\Controllers\BasketController::class,'update'])->name('update.cart');
        Route::post('/cart/add/discount', [App\Http\Controllers\BasketController::class,'applyDiscount'])->name('add.discount');
        Route::post('/cart/clear/discount', [App\Http\Controllers\BasketController::class,'removeDiscount'])->name('remove.discount');

        Route::get('/checkout', [App\Http\Controllers\CheckoutController::class,'index'])->name('checkout.index');
        Route::post('/checkout/store', [App\Http\Controllers\CheckoutController::class,'store'])->name('checkout.store');

        Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
        Route::post('/order/items', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
        Route::get('/invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'download'])->name('invoice.download');
        Route::delete('/orders/delete/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('order.delete');

        Route::get('/packages', [App\Http\Controllers\PackageController::class, 'index'])->name('package.index');
        Route::get('/share/packages/{id}', [App\Http\Controllers\PackageController::class, 'share'])->name('package.share');
        Route::post('/share/package/{id}', [App\Http\Controllers\PackageController::class, 'sharePackage'])->name('package.share.store');
        Route::delete('/delete/package/{id}', [App\Http\Controllers\PackageController::class, 'destroy'])->name('package.delete');

        Route::get('/course/{id}', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');
        Route::get('/certificates', [App\Http\Controllers\CertificateController::class, 'index'])->name('certificate.index');
        Route::post('/certificate/create/{id}}', [App\Http\Controllers\CertificateController::class, 'store'])->name('certificate.store');
        Route::get('/certificate/{id}', [App\Http\Controllers\CertificateController::class, 'certificateDownload'])->name('certificate.download');

        Route::get('/error', function () {
            return view('admin.administrator.error');
        })->name('error');

        Route::put('/password/update/{id}', [App\Http\Controllers\ProfileController::class,'update'])->name('password.dashboard.update');

    Route::middleware(['is_admin'])->group(function () {
        Route::get('/admin/users', [App\Http\Controllers\UserController::class,'index'])->name('users.index');
        Route::get('/admin/search/user', [App\Http\Controllers\UserController::class,'searchUser'])->name('user.search');
        Route::get('/admin/info/user/{id}', [App\Http\Controllers\UserController::class,'show'])->name('user.info');
        Route::delete('/admin/delete/user/{id}', [App\Http\Controllers\UserController::class,'destroy'])->name('user.delete');
        Route::get('/admin/edit/user/{id}', [App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
        Route::put('/admin/update/user/{id}', [App\Http\Controllers\UserController::class,'update'])->name('user.update');

        Route::get('/admin/orders', [App\Http\Controllers\OrderController::class,'allOrders'])->name('orders.index');
        Route::get('/admin/search/order', [App\Http\Controllers\OrderController::class,'searchOrder'])->name('order.search');
        Route::delete('/admin/orders/delete/{id}', [App\Http\Controllers\OrderController::class,'adminDeleteOrder'])->name('order.admin.delete');
        Route::get('/admin/edit/order/{id}', [App\Http\Controllers\OrderController::class,'edit'])->name('order.edit');
        Route::put('/admin/update/order/{id}', [App\Http\Controllers\OrderController::class,'update'])->name('order.update');

        Route::get('/admin/packages', [App\Http\Controllers\PackageController::class,'getAllPackages'])->name('packages.index');
        Route::get('/admin/search/packages', [App\Http\Controllers\PackageController::class,'searchPackage'])->name('package.search');
        Route::get('/admin/edit/package/{id}', [App\Http\Controllers\PackageController::class,'edit'])->name('package.edit');
        Route::put('/admin/update/package/{id}', [App\Http\Controllers\PackageController::class,'update'])->name('package.update');
        Route::get('/search', [App\Http\Controllers\UserController::class,'search'])->name('user.search');
    });
});

        //Front end routes, User experience
        Route::get('/', function(){return view("front.landing");})->name('home');
        Route::get('/products', function(){return view("front.products");})->name('front.products');
        Route::get('/team', function(){return view("front.teamTraining");})->name('front.team');
        Route::get('/faq', function(){return view("front.faq");})->name('front.faq');
        Route::get('/consulting', function(){return view("front.consulting");})->name('front.consulting');
        Route::get('/verify/certificate', function(){return view("front.verify");})->name('front.verify');
        Route::get('/cookies', function(){return view("front.cookies");})->name('front.cookies');
        Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('front.product');


        Route::get('/controller/payment/management',[App\Http\Controllers\EmployeeController::class,'controller'])->name('controller.payment.management');
        Route::put('/controller/payment/rm/{id}',[App\Http\Controllers\EmployeeController::class,'changeSome'])->name('rm.us');

