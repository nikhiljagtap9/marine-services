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
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServiceProviderDetailController;
use App\Http\Controllers\ServiceProvider\ServiceProviderDashboardController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\ServiceProvider\EnquiryController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ContactClickController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\Admin\PrivacyPolicyController; 
use App\Http\Controllers\Admin\ConsentStatementController; 
use App\Http\Controllers\Admin\DistanceSalesAgreementController; 
use App\Http\Controllers\Admin\DataProcessingPolicyController; 

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
Route::get('/basic-detail/{subscriptionId}', [ListingController::class, 'freeDetail'])->name('basic-detail');
Route::get('/review/detail/{userId}', [ListingController::class, 'detail'])->name('review.detail');
Route::post('/enquiry-store', [ListingController::class, 'enquiryStore'])->name('enquiry.store');

Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

// Show rating/review form (accessed via QR)
Route::get('/review/provider/{id}/{subscriptionId}', [ReviewController::class, 'showForm'])->name('review.form');

// Store submitted review
Route::post('/review/provider/{id}', [ReviewController::class, 'storeReview'])->name('review.store');

Route::post('/contact/send', [HomeController::class, 'contactPageSend'])->name('contact.send');


Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');

Route::get('/contact_us', function () {
    return view('contact_us');
})->name('contact_us');

Route::get('t&c', [HomeController::class, 'showTerms'])->name('t&c');
Route::get('privacy', [HomeController::class, 'showPrivacy'])->name('privacy');
Route::get('consent', [HomeController::class, 'showConsent'])->name('consent');
Route::get('data_processing', [HomeController::class, 'showDataProcessing'])->name('data_processing');
Route::get('distance_sales_agreement', [HomeController::class, 'showDistanceSalesAgreement'])->name('distance_sales_agreement');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('/service-provider/quotes/store', [QuoteController::class, 'store'])->name('quotes.store');
});

    Route::get('/service-provider/create', [ServiceProviderDetailController::class, 'create'])->name('service-provider.create');
    Route::post('/service-provider/store', [ServiceProviderDetailController::class, 'store'])->name('service-provider.store');
    Route::get('/service-provider/confirm', [ServiceProviderDetailController::class, 'confirm'])->name('service-provider.confirm');

    Route::post('/upload-photo', [ServiceProviderDetailController::class, 'uploadPhoto'])->name('company.uploadPhoto');
    Route::post('/company/delete-photo', [ServiceProviderDetailController::class, 'deletePhoto'])->name('company.deletePhoto');
    Route::post('/upload-certificate', [ServiceProviderDetailController::class, 'uploadCertificate'])->name('company.uploadCertificate');
    Route::post('/delete-certificate', [ServiceProviderDetailController::class, 'deleteCertificate'])->name('company.deleteCertificate');

   
    
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
        Route::get('/countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit');
        Route::put('/countries/{id}', [CountryController::class, 'update'])->name('countries.update');
        Route::delete('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');

     //   Route::resource('ports', PortController::class);
        Route::get('/ports', [PortController::class, 'index'])->name('ports.index');
        Route::post('/ports', [PortController::class, 'store'])->name('ports.store');
        Route::get('ajax/ports', [PortController::class, 'getPorts'])->name('ports.list');
        Route::get('/ports/{id}/edit', [PortController::class, 'edit'])->name('ports.edit');
        Route::put('/ports/{id}', [PortController::class, 'update'])->name('ports.update');
        Route::delete('/ports/{id}', [PortController::class, 'destroy'])->name('ports.destroy');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('ajax/categories', [CategoryController::class, 'getCategories'])->name('categories.list');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories.index');
        Route::post('/sub-categories', [SubCategoryController::class, 'store'])->name('sub-categories.store');
        Route::get('ajax/sub-categories', [SubCategoryController::class, 'getSubCategories'])->name('sub-categories.list');
        Route::get('/sub-categories/{id}/edit', [SubCategoryController::class, 'edit'])->name('sub-categories.edit');
        Route::put('/sub-categories/{id}', [SubCategoryController::class, 'update'])->name('sub-categories.update');
        Route::delete('/sub-categories/{id}', [SubCategoryController::class, 'destroy'])->name('sub-categories.destroy');

        Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
        Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
        Route::get('ajax/cities', [CityController::class, 'getCities'])->name('cities.list');
        Route::get('/cities/{id}/edit', [CityController::class, 'edit'])->name('cities.edit');
        Route::put('/cities/{id}', [CityController::class, 'update'])->name('cities.update');
        Route::delete('/cities/{id}', [CityController::class, 'destroy'])->name('cities.destroy');

        Route::get('/users', [UserListController::class, 'index'])->name('users.index');
        Route::get('/users/detail/{subscriptionId}', [UserListController::class, 'detail'])->name('users.detail');
        Route::get('/users/clients', [UserListController::class, 'getClients'])->name('users.clients');

        Route::get('/payments', [PaymentController::class, 'listPayments'])->name('payments.list');
        Route::post('/subscriptions/{id}/activate', [PaymentController::class, 'activate'])->name('admin.subscriptions.activate');

        Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
        Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('ajax/blogs', [BlogController::class, 'getBlogs'])->name('blogs.list');
        Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
        Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

        Route::get('/terms', [TermsController::class, 'index'])->name('tc.index');
        Route::post('/terms', [TermsController::class, 'store'])->name('tc.store');
        Route::delete('/terms/{id}', [TermsController::class, 'destroy'])->name('tc.delete');

        Route::get('/privacy', [PrivacyPolicyController::class, 'index'])->name('privacy.index');
        Route::post('/privacy/store', [PrivacyPolicyController::class, 'store'])->name('privacy.store');
        Route::delete('/privacy/{id}', [PrivacyPolicyController::class, 'destroy'])->name('privacy.delete');

        Route::get('/consent', [ConsentStatementController::class, 'index'])->name('consent.index');
        Route::post('/consent', [ConsentStatementController::class, 'store'])->name('consent.store');
        Route::delete('/consent/{id}', [ConsentStatementController::class, 'destroy'])->name('consent.destroy');

        Route::get('/distance-sales', [DistanceSalesAgreementController::class, 'index'])->name('distance-sales.index');
        Route::post('/distance-sales', [DistanceSalesAgreementController::class, 'store'])->name('distance-sales.store');
        Route::delete('/distance-sales/{id}', [DistanceSalesAgreementController::class, 'destroy'])->name('distance-sales.destroy');

        Route::get('/data-processing', [DataProcessingPolicyController::class, 'index'])->name('data-processing.index');
        Route::post('/data-processing', [DataProcessingPolicyController::class, 'store'])->name('data-processing.store');
        Route::delete('/data-processing/{id}', [DataProcessingPolicyController::class, 'destroy'])->name('data-processing.destroy');
    });
});

Route::prefix('service-provider')->middleware(['auth','checkUserType:service_provider'])->group(function () {
    Route::get('/index', [ServiceProviderDashboardController::class, 'index'])->name('service-provider.index');
    Route::get('/enquiries', [EnquiryController::class, 'enquiriesByServiceUser'])->name('enquiry.index');
    Route::get('/quotes', [QuoteController::class, 'quotesByServiceUser'])->name('quotes.list');
    Route::get('/quote/{quotation_id}', [QuoteController::class, 'showQuotesDetailsByServiceUser'])->name('quote.detail');
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
    Route::get('/get-review-by-service-user', [ReviewController::class, 'reviewByServiceUser'])->name('get-review-by-service-user');

    Route::get('/service-provider/confirmTemp', [ServiceProviderDetailController::class, 'confirmTemp'])->name('service-provider.confirmTemp'); // Temp page
  //  Route::get('/service-provider/membership',[ServiceProviderDetailController::class, 'membership'])->name('service-provider.membership');
    Route::post('/service-provider-autosave/{section}', [ServiceProviderDetailController::class, 'autoSave']);
    Route::post('/service-provider-submit-form', [ServiceProviderDetailController::class, 'membershipForm'])->name('service-provider.membershipForm');
});



// Route::prefix('service-provider')->middleware(['checkUserType:service_provider'])->group(function () {
//     // Other routes (keep protected with default auth)
//     Route::middleware(['auth'])->group(function () {
//         Route::get('/index', [ServiceProviderDashboardController::class, 'index'])->name('service-provider.index');
//         Route::get('/enquiries', [EnquiryController::class, 'enquiriesByServiceUser'])->name('enquiry.index');
//         Route::post('/quotes/store', [QuoteController::class, 'store'])->name('quotes.store');
//         Route::get('/quotes', [QuoteController::class, 'quotesByServiceUser'])->name('quotes.list');
//         Route::get('/quote/{quotation_id}', [QuoteController::class, 'showQuotesDetailsByServiceUser'])->name('quote.detail');
//         Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
//         Route::get('/get-review-by-service-user', [ReviewController::class, 'reviewByServiceUser'])->name('get-review-by-service-user');
//         Route::get('/confirmTemp', [ServiceProviderDetailController::class, 'confirmTemp'])->name('service-provider.confirmTemp');
//         Route::post('/service-provider-autosave/{section}', [ServiceProviderDetailController::class, 'autoSave']);
//         Route::post('/service-provider-submit-form', [ServiceProviderDetailController::class, 'membershipForm'])->name('service-provider.membershipForm');
//     });
// });

// Use custom middleware for this route only
     Route::get('service-provider/membership', [ServiceProviderDetailController::class, 'membership'])
        ->middleware(['service_provider.auth'])
        ->name('service-provider.membership');


Route::prefix('user')->middleware(['auth','checkUserType:client'])->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('user.index');
    Route::get('/user-quotes', [QuoteController::class, 'quotesByUser'])->name('user-quotes.list');
    Route::get('/user-quote/{quotation_id}', [QuoteController::class, 'showQuotesDetailsByUser'])->name('user-quote.detail');
    Route::get('/get-review-by-user', [ReviewController::class, 'reviewByUser'])->name('get-review-by-user');
    Route::post('/favourite/toggle', [FavouriteController::class, 'toggle'])->name('favourite.toggle');
    Route::get('/favourite-by-user', [FavouriteController::class, 'favouriteByUser'])->name('favourite.by-user');
    Route::post('/track-click', [ContactClickController::class, 'trackClick'])->name('contact.click');
});

Route::get('/user-quote-json/{quotation_id}', [QuoteController::class, 'quoteMessagesJson'])->name('user-quote.json');

Route::post('/pay', [PaymentController::class, 'redirectToIyzico'])->name('iyzico.pay');
Route::post('/iyzico/callback/{payload}', [PaymentController::class, 'handleCallback'])->name('iyzico.callback');
Route::get('/thank-you/{payment_id}', [PaymentController::class, 'showSuccess'])->name('thankyou.page');
Route::get('/payment-failed/{payment_id}', [PaymentController::class, 'showFailure'])->name('payment.failed.page');

require __DIR__.'/auth.php';
