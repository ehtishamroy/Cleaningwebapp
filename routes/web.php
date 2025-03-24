<?php

use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DurationController;
use App\Http\Controllers\Frontend\Frontendcontroller;
use App\Http\Controllers\Admin\StripePaymentController;
Route::redirect('/wp-login', '/login');
// Route::get('/home', function () {
//     if (session('status')) {
//         return redirect()->route('admin.home')->with('status', session('status'));
//     }

//     return redirect()->route('admin.home');
// });

//-----------------------------------------------------------
// frontend folder Route/controller
Route::get('/', [Frontendcontroller::class, 'index']);
Route::get('/about-us', [Frontendcontroller::class, 'about']);
Route::get('/contact', [Frontendcontroller::class, 'contact']);
Route::get('/kitchen-cleaning-service', [Frontendcontroller::class, 'kitclean']);
Route::get('/bedroom-cleaning-service', [Frontendcontroller::class, 'bedclean']);
Route::get('/book', [Frontendcontroller::class, 'book'])->name('booking.form');
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
//-----------------------------------------------------------
Route::post('/booking-submit',[BookingController::class,'booking'])->name('booking.submit');

Route::match(['get', 'post'], '/booking-payment', [BookingController::class, 'booking_payment'])
    ->name('frontend.payment.stripe');


Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    //Bookings
    Route::get('/bookings',[BookingController::class,'index'])->name('bookings');
    Route::get('/booking/create',[BookingController::class,'create'])->name('booking.create');
    Route::post('/booking/store',[BookingController::class,'store'])->name('booking.store');
    Route::get('/booking/edit/{id}',[BookingController::class,'edit'])->name('booking.edit');
    Route::post('/booking/update/{id}',[BookingController::class,'update'])->name('booking.update');
    Route::post('/booking/delete/{id}',[BookingController::class,'delete'])->name('booking.delete');
    Route::get('/booking/show/{id}',[BookingController::class,'show'])->name('booking.show');

    //Payments
    Route::get('/payments',[PaymentController::class,'index'])->name('payments');
    Route::get('/payment/create',[PaymentController::class,'create'])->name('payment.create');
    Route::post('/payment/store',[PaymentController::class,'store'])->name('payment.store');
    Route::get('/payment/edit/{id}',[PaymentController::class,'edit'])->name('payment.edit');
    Route::post('/payment/update/{id}',[PaymentController::class,'update'])->name('payment.update');
    Route::post('/payment/delete/{id}',[PaymentController::class,'delete'])->name('payment.delete');
    Route::get('/payment/show/{id}',[PaymentController::class,'show'])->name('payment.show');
    
    //Services
    Route::get('/services',[ServiceController::class,'index'])->name('services');
    Route::get('/services/create',[ServiceController::class,'create'])->name('service.create');
    Route::post('/services/store',[ServiceController::class,'store'])->name('service.store');
    Route::POST('/services/delete/{id}',[ServiceController::class,'delete'])->name('service.delete');
    Route::get('/services/edit/{id}',[ServiceController::class,'edit'])->name('service.edit');
    Route::post('/services/update/{id}',[ServiceController::class,'update'])->name('service.update');
    Route::get('/services/show/{id}',[ServiceController::class,'show'])->name('service.show');
    Route::post('/services/status/{id}',[ServiceController::class,'updatestatus']);

    //Review
    Route::get('/reviews',[ReviewController::class,'index'])->name('reviews');
    Route::get('/review/create',[ReviewController::class,'create'])->name('review.create');
    Route::post('/review/store',[ReviewController::class,'store'])->name('review.store');
    Route::get('/review/edit/{id}',[ReviewController::class,'edit'])->name('review.edit');
    Route::post('/review/update/{id}',[ReviewController::class,'update'])->name('review.update');
    Route::post('/review/delete/{id}',[ReviewController::class,'delete'])->name('review.delete');
    Route::get('/review/show/{id}',[ReviewController::class,'show'])->name('review.show');
    Route::post('/review/status/{id}',[ReviewController::class,'updatestatus']);

    //Customers
    Route::get('/customers',[CustomerController::class,'index'])->name('customers');
    Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
    Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');
    Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
    Route::post('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
    Route::get('/customer/show/{id}',[CustomerController::class,'show'])->name('customer.show');

    //Durations
    Route::get('/durations',[DurationController::class,'index'])->name('durations');
    Route::get('/durations/create',[DurationController::class,'create'])->name('duration.create');
    Route::post('/durations/store',[DurationController::class,'store'])->name('duration.store');
    Route::get('/duration/edit/{id}',[DurationController::class,'edit'])->name('duration.edit');
    Route::post('/duration/update/{id}',[DurationController::class,'update'])->name('duration.update');
    Route::post('/duration/delete/{id}',[DurationController::class,'delete'])->name('duration.delete');
    Route::get('/duration/show/{id}',[DurationController::class,'show'])->name('duration.show');
    Route::post('/duration/status/{id}',[DurationController::class,'updatestatus']);

    //Extra
    Route::get('/extra',[ExtraController::class,'index'])->name('extra');
    Route::get('/extra/create',[ExtraController::class,'create'])->name('extra.create');
    Route::post('/extra/store',[ExtraController::class,'store'])->name('extra.store');
    Route::get('/extra/edit/{id}',[ExtraController::class,'edit'])->name('extra.edit');
    Route::get('/extra/show/{id}',[ExtraController::class,'show'])->name('extra.show');
    Route::post('/extra/update/{id}',[ExtraController::class,'update'])->name('extra.update');
    Route::post('/extra/delete/{id}',[ExtraController::class,'delete'])->name('extra.delete');
    Route::post('/extra/status/{id}',[ExtraController::class,'updatestatus']);

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
