<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\PortController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServiceProviderDetailController;
use App\Http\Controllers\ServiceProvider\ServiceProviderDashboardController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\ServiceProvider\EnquiryController;
use App\Http\Controllers\ServiceProvider\QuoteController;
use App\Http\Controllers\ChatController;

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


// Block all other web routes
// Route::any('/', function () {
//     abort(403, 'Access Denied');
// })->where('any', '.*');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/product-listing', [ListingController::class, 'index'])->name('product_listing');
Route::get('/detail/{subscriptionId}', [ListingController::class, 'detail'])->name('detail');
Route::post('/enquiry-store', [ListingController::class, 'enquiryStore'])->name('enquiry.store');

Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/consent', function () {
    return view('consent');
})->name('consent');

Route::get('t&c', function () {
    return view('t&c');
})->name('t&c');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/service-provider/membership',[ServiceProviderDetailController::class, 'membership'])->name('service-provider.membership');
    Route::post('/service-provider-autosave/{section}', [ServiceProviderDetailController::class, 'autoSave']);
    Route::post('/service-provider-submit-form', [ServiceProviderDetailController::class, 'membershipForm'])->name('service-provider.membershipForm');

});

    Route::get('/service-provider/create', [ServiceProviderDetailController::class, 'create'])->name('service-provider.create');
    Route::post('/service-provider/store', [ServiceProviderDetailController::class, 'store'])->name('service-provider.store');
    Route::get('/service-provider/confirm', [ServiceProviderDetailController::class, 'confirm'])->name('service-provider.confirm');
   
    
    Route::get('/get-cities/{country_id}',[ServiceProviderDetailController::class, 'getCities'])->name('get-cities');
    Route::get('/get-ports/{country_id}',[ServiceProviderDetailController::class, 'getPorts'])->name('get-ports');
    Route::get('/get-sub-service/{service_id}',[ServiceProviderDetailController::class, 'getSubService'])->name('get-sub-service');
    
    
    

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

        Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
        Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
        Route::get('ajax/cities', [CityController::class, 'getCities'])->name('cities.list');

        Route::get('/users', [UserListController::class, 'index'])->name('usres.index');
        Route::get('/users/detail/{subscriptionId}', [UserListController::class, 'detail'])->name('users.detail');
        
    });
});

Route::prefix('service-provider')->middleware(['auth'])->group(function () {
    Route::get('/index', [ServiceProviderDashboardController::class, 'index'])->name('service-provider.index');
    Route::get('/enquiries', [EnquiryController::class, 'enquiriesByServiceUser'])->name('enquiry.index');
    Route::post('/quotes/store', [QuoteController::class, 'store'])->name('quotes.store');
    Route::get('/quotes', [QuoteController::class, 'quotesByServiceUser'])->name('quotes.list');
    
    Route::get('/quote/{id}', [QuoteController::class, 'show'])->name('quote.detail');
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');

    Route::get('/service-provider/confirmTemp', [ServiceProviderDetailController::class, 'confirmTemp'])->name('service-provider.confirmTemp'); // Temp page

    // Route::post('/chat/send', [ChatController::class, 'store'])->name('chat.send');
    // Route::get('/chat/{userId}', [ChatController::class, 'getChat'])->name('chat.view');
});


require __DIR__.'/auth.php';
