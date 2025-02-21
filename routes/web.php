<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DurationController;



Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::group([ 'middleware' => ['auth']], function () {});

Route::get('/services',[ServiceController::class,'index'])->name('services');
Route::get('/services/create',[ServiceController::class,'create'])->name('service.create');
Route::post('/services/store',[ServiceController::class,'store'])->name('service.store');
Route::POST('/services/delete/{id}',[ServiceController::class,'delete'])->name('service.delete');
Route::get('/services/edit/{id}',[ServiceController::class,'edit'])->name('service.edit');
Route::post('/services/update/{id}',[ServiceController::class,'update'])->name('service.update');

Route::get('/durations',[DurationController::class,'index'])->name('durations');
Route::get('/durations/create',[DurationController::class,'create'])->name('duration.create');
Route::post('/durations/store',[DurationController::class,'store'])->name('duration.store');
Route::get('/duration/edit/{id}',[DurationController::class,'edit'])->name('duration.edit');
Route::post('/duration/update/{id}',[DurationController::class,'update'])->name('duration.update');
Route::post('/duration/delete/{id}',[DurationController::class,'delete'])->name('duration.delete');

Route::get('/customers',[CustomerController::class,'index'])->name('customers');
Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::post('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');

Route::get('/bookings',[BookingController::class,'index'])->name('bookings');
Route::get('/booking/create',[BookingController::class,'create'])->name('booking.create');
Route::post('/booking/store',[BookingController::class,'store'])->name('booking.store');
Route::get('/booking/edit/{id}',[BookingController::class,'edit'])->name('booking.edit');
Route::post('/booking/update/{id}',[BookingController::class,'update'])->name('booking.update');
Route::post('/booking/delete/{id}',[BookingController::class,'delete'])->name('booking.delete');

Route::get('/payments',[PaymentController::class,'index'])->name('payments');
Route::get('/payment/create',[PaymentController::class,'create'])->name('payment.create');
Route::post('/payment/store',[PaymentController::class,'store'])->name('payment.store');
Route::get('/payment/edit/{id}',[PaymentController::class,'edit'])->name('payment.edit');
Route::post('/payment/update/{id}',[PaymentController::class,'update'])->name('payment.update');
Route::post('/payment/delete/{id}',[PaymentController::class,'delete'])->name('payment.delete');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {});







Route::group(['prefix' => 'review', 'middleware' => ['auth']], function () {
    Route::get('/home',[ReviewController::class,'index'])->name('reviews');
    Route::get('/create',[ReviewController::class,'create'])->name('review.create');
    Route::post('/store',[ReviewController::class,'store'])->name('review.store');
    Route::get('/edit/{id}',[ReviewController::class,'edit'])->name('review.edit');
    Route::post('/update/{id}',[ReviewController::class,'update'])->name('review.update');
    Route::post('/delete/{id}',[ReviewController::class,'delete'])->name('review.delete');
});


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
