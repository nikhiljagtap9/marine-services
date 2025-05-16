<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\PortController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ServiceProviderDetailController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/product_listing', function () {
    return view('product_listing');
})->name('product_listing');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 Route::get('/service-provider/create', [ServiceProviderDetailController::class, 'create'])->name('service-provider.create');
    Route::post('/service-provider/store', [ServiceProviderDetailController::class, 'store'])->name('service-provider.store');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin login route
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Admin dashboard route (accessible only for authenticated admins)
    Route::middleware(['auth:admin', 'admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        // Route::resource('countries',CountryController::class);
        Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
        Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');
        Route::get('/countries/list', [CountryController::class, 'getCountries'])->name('countries.list');

     //   Route::resource('ports', PortController::class);
        Route::get('/ports', [PortController::class, 'index'])->name('ports.index');
        Route::post('/ports', [PortController::class, 'store'])->name('ports.store');
        Route::get('ajax/ports', [PortController::class, 'getPorts'])->name('ports.list');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('ajax/categories', [CategoryController::class, 'getCategories'])->name('categories.list');

        Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories.index');
        Route::post('/sub-categories', [SubCategoryController::class, 'store'])->name('sub-categories.store');
        Route::get('ajax/sub-categories', [SubCategoryController::class, 'getSubCategories'])->name('sub-categories.list');
    });
});


require __DIR__.'/auth.php';
