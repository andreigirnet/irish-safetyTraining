<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    Route::get('/buy/products', [App\Http\Controllers\ProductController::class,'index'])->name('admin.products');

    Route::get('/profile',[App\Http\Controllers\ProfileController::class,'show'])->name('admin.en.profile');
    Route::put('/profile/store/image',[App\Http\Controllers\ProfileController::class,'storeImage'])->name('store.profileImg');

    Route::get('/dashboard/employer', [App\Http\Controllers\EmployeeController::class,'index'])->name('dashboard.employer');
    Route::get('/info/employer/employee/{id}', [App\Http\Controllers\EmployeeController::class,'showEmployee'])->name('employer.employee');
    Route::get('/info/employer/{id}', [App\Http\Controllers\EmployeeController::class,'show'])->name('employer.info');
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
    Route::get('/checkout/index', [App\Http\Controllers\CheckoutController::class,'indexS'])->name('checkout.index.secret');

    Route::post('/payment', [App\Http\Controllers\CheckoutController::class,'setPayment']);
    Route::get('/payment/success', function(){
        return view('admin.administrator.payment');
    })->name('success.payment');

    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
    Route::post('/order/items', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::get('/invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'download'])->name('invoice.download');
    Route::delete('/orders/delete/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('order.delete');

    Route::get('/packages', [App\Http\Controllers\PackageController::class, 'index'])->name('package.index');
    Route::get('/share/packages/{id}', [App\Http\Controllers\PackageController::class, 'share'])->name('package.share');
    Route::post('/share/package/{id}', [App\Http\Controllers\PackageController::class, 'sharePackage'])->name('package.share.store');
    Route::put('/status/package/{id}', [App\Http\Controllers\PackageController::class, 'changeStatus'])->name('package.status');
    Route::delete('/delete/package/{id}', [App\Http\Controllers\PackageController::class, 'destroy'])->name('package.delete');

    Route::get('/course/{id}', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');
    Route::get('/certificates', [App\Http\Controllers\CertificateController::class, 'index'])->name('certificate.index');
    Route::post('/certificate/create/{id}', [App\Http\Controllers\CertificateController::class, 'store'])->name('certificate.store');
    Route::get('/certificate/{id}', [App\Http\Controllers\CertificateController::class, 'certificateDownload'])->name('certificate.download');
    Route::get('/certificate/practice/{id}', [App\Http\Controllers\CertificateController::class, 'certificateDownloadPractice'])->name('certificate.download.practice');

    Route::get('/error', function () {
        return view('admin.administrator.error');
    })->name('error');

    Route::put('/password/update/{id}', [App\Http\Controllers\ProfileController::class,'update'])->name('password.dashboard.update');
    Route::get('/search/employees', [App\Http\Controllers\UserController::class,'searchEmployees'])->name('user.search.employees');


    Route::middleware(['is_admin'])->group(function () {
        Route::get('/search/all/employees', [App\Http\Controllers\UserController::class,'searchAllEmployees'])->name('user.search.all.employees');
        Route::get('/admin/users', [App\Http\Controllers\UserController::class,'index'])->name('users.index');
        Route::get('/admin/search/user', [App\Http\Controllers\UserController::class,'searchUser'])->name('user.search');
        Route::get('/admin/info/user/{id}', [App\Http\Controllers\UserController::class,'show'])->name('user.info');
        Route::delete('/admin/delete/user/{id}', [App\Http\Controllers\UserController::class,'destroy'])->name('user.delete');
        Route::get('/admin/edit/user/{id}', [App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
        Route::put('/admin/update/user/{id}', [App\Http\Controllers\UserController::class,'update'])->name('user.update');
        Route::get('/search/user', [App\Http\Controllers\UserController::class,'searchUser'])->name('user.admin.search');
        Route::post('/admin/existing/employee', [App\Http\Controllers\UserController::class,'addExistingEmployee'])->name('user.admin.exist');

        Route::get('/admin/orders', [App\Http\Controllers\OrderController::class,'allOrders'])->name('orders.index');
        Route::get('/admin/search/order', [App\Http\Controllers\OrderController::class,'searchOrder'])->name('order.search');
        Route::delete('/admin/orders/delete/{id}', [App\Http\Controllers\OrderController::class,'adminDeleteOrder'])->name('order.admin.delete');
        Route::get('/admin/edit/order/{id}', [App\Http\Controllers\OrderController::class,'edit'])->name('order.edit');
        Route::put('/admin/update/order/{id}', [App\Http\Controllers\OrderController::class,'update'])->name('order.update');

        Route::get('/admin/packages', [App\Http\Controllers\PackageController::class,'getAllPackages'])->name('packages.admin.index');
        Route::delete('/admin/packages/delete/{id}', [App\Http\Controllers\PackageController::class,'destroy'])->name('packages.admin.delete');
        Route::post('/admin/add/packages', [App\Http\Controllers\PackageController::class,'store'])->name('packages.admin.add');
        Route::get('/admin/search/packages', [App\Http\Controllers\PackageController::class,'searchPackage'])->name('packages.admin.search');
        Route::get('/admin/bulk/edit/packages', [App\Http\Controllers\PackageController::class,'editBulk'])->name('packages.admin.edit.bulk');
        Route::get('/admin/from/to/edit/packages', [App\Http\Controllers\PackageController::class,'editFromTo'])->name('packages.admin.edit.from.to');
        Route::put('/admin/from/to/update/packages', [App\Http\Controllers\PackageController::class,'updateFromTo'])->name('packages.admin.update.from.to');
        Route::get('/admin/edit/package/{id}', [App\Http\Controllers\PackageController::class,'edit'])->name('packages.admin.edit');
        Route::get('/admin/edit/packageOwner/{id}', [App\Http\Controllers\PackageController::class,'editOwner'])->name('packages.admin.owner');
        Route::put('/admin/update/package/{id}', [App\Http\Controllers\PackageController::class,'update'])->name('packages.admin.update');
        Route::put('/admin/updateOwner/package/{id}', [App\Http\Controllers\PackageController::class,'updateOwner'])->name('packages.admin.updateOwner');

        Route::get('/admin/certificates', [App\Http\Controllers\CertificateController::class,'getAllCertificates'])->name('certificates.admin.index');
        Route::delete('/admin/certificate/delete/{id}', [App\Http\Controllers\CertificateController::class,'destroy'])->name('certificates.admin.delete');
        Route::get('/admin/search/certificate', [App\Http\Controllers\CertificateController::class,'searchCertificate'])->name('certificates.admin.search');

        Route::get('/search', [App\Http\Controllers\UserController::class,'search'])->name('user.search');

        Route::get('/add/product', [App\Http\Controllers\ProductController::class,'create'])->name('admin.create.product');
        Route::post('/add/product', [App\Http\Controllers\ProductController::class,'store'])->name('admin.add.product');
        Route::get('/edit/product/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('admin.edit.product');
        Route::post('/update/product/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.update.product');
    });

    Route::middleware(['is_trainer'])->group(function () {
//            Route::get('/search/all/employees', [App\Http\Controllers\UserController::class,'searchAllEmployees'])->name('user.search.all.employees');
//            Route::get('/admin/users', [App\Http\Controllers\UserController::class,'index'])->name('users.index');
//            Route::get('/admin/search/user', [App\Http\Controllers\UserController::class,'searchUser'])->name('user.search');
//            Route::get('/admin/info/user/{id}', [App\Http\Controllers\UserController::class,'show'])->name('user.info');
//            Route::delete('/admin/delete/user/{id}', [App\Http\Controllers\UserController::class,'destroy'])->name('user.delete');
//            Route::get('/admin/edit/user/{id}', [App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
//            Route::put('/admin/update/user/{id}', [App\Http\Controllers\UserController::class,'update'])->name('user.update');
//            Route::get('/search/user', [App\Http\Controllers\UserController::class,'searchUser'])->name('user.admin.search');
//            Route::post('/admin/existing/employee', [App\Http\Controllers\UserController::class,'addExistingEmployee'])->name('user.admin.exist');
//
        Route::get('/trainer/orders', [App\Http\Controllers\OrderController::class,'trainerOrders'])->name('orders.trainer');
//            Route::get('/admin/search/order', [App\Http\Controllers\OrderController::class,'searchOrder'])->name('order.search');
//            Route::delete('/admin/orders/delete/{id}', [App\Http\Controllers\OrderController::class,'adminDeleteOrder'])->name('order.admin.delete');
//            Route::get('/admin/edit/order/{id}', [App\Http\Controllers\OrderController::class,'edit'])->name('order.edit');
//            Route::put('/admin/update/order/{id}', [App\Http\Controllers\OrderController::class,'update'])->name('order.update');
//
        Route::get('/trainer/packages', [App\Http\Controllers\PackageController::class,'getAllPackagesTrainer'])->name('packages.trainer.index');
//            Route::delete('/admin/packages/delete/{id}', [App\Http\Controllers\PackageController::class,'destroy'])->name('packages.admin.delete');
//            Route::post('/admin/add/packages', [App\Http\Controllers\PackageController::class,'store'])->name('packages.admin.add');
        Route::get('/trainer/search/packages', [App\Http\Controllers\PackageController::class,'searchPackageTrainer'])->name('packages.trainer.search');
        Route::get('/trainer/edit/package/{id}', [App\Http\Controllers\PackageController::class,'trainerEdit'])->name('packages.trainer.edit');
//            Route::get('/admin/edit/packageOwner/{id}', [App\Http\Controllers\PackageController::class,'editOwner'])->name('packages.admin.owner');
        Route::put('/trainer/update/package/{id}', [App\Http\Controllers\PackageController::class,'trainerUpdate'])->name('packages.trainer.update');
//            Route::put('/admin/updateOwner/package/{id}', [App\Http\Controllers\PackageController::class,'updateOwner'])->name('packages.admin.updateOwner');
//
        Route::get('/trainer/certificates', [App\Http\Controllers\CertificateController::class,'getAllCertificatesTrainer'])->name('certificates.trainer.index');
//            Route::delete('/admin/certificate/delete/{id}', [App\Http\Controllers\CertificateController::class,'destroy'])->name('certificates.admin.delete');
        Route::get('/trainer/search/certificate', [App\Http\Controllers\CertificateController::class,'searchCertificate'])->name('certificates.trainer.search');
//
//            Route::get('/search', [App\Http\Controllers\UserController::class,'search'])->name('user.search');
//
//            Route::get('/add/product', [App\Http\Controllers\ProductController::class,'create'])->name('admin.create.product');
//            Route::post('/add/product', [App\Http\Controllers\ProductController::class,'store'])->name('admin.add.product');
    });
});

//Front end routes, User experience
Route::get('/', function(){
    $products = Product::orderBy('id', 'asc')->get();
    return view("front.landing", compact('products'));})->name('home');
Route::get('/info/about/admin', [App\Http\Controllers\ProductController::class, 'info'])->name('infoAdmin');
Route::get('/products', function(){return view("front.products");})->name('front.products');
Route::get('/team', function(){return view("front.teamTraining");})->name('front.team');
Route::get('/contact', function(){return view("front.contact");})->name('front.contact');
Route::get('/faq', function(){return view("front.faq");})->name('front.faq');
Route::get('/consulting', function(){return view("front.consulting");})->name('front.consulting');
Route::get('/verify/certificate', function(){return view("front.verify");})->name('front.verify');
Route::get('/cookies', function(){return view("front.cookies");})->name('front.cookies');
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('front.product');
Route::get('/infoPdf', function(){
    $path = "pdf/info.pdf";
    return response()->download($path, 'info.pdf');
})->name('infoPdf');


Route::get('/controller/payment/management',[App\Http\Controllers\EmployeeController::class,'controller'])->name('controller.payment.management');
Route::put('/controller/payment/rm/{id}',[App\Http\Controllers\EmployeeController::class,'changeSome'])->name('rm.us');
