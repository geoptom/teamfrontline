<?php

use App\Http\Controllers\Frontend\FrontendCategoryController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\SolutionController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProductTrackController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserMessageController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserVendorReqeustController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Models\Solution;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CareerController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';


Route::get('change-product-list-view', [FrontendProductController::class, 'chageListView'])->name('change-product-list-view');

Route::get('/products', [FrontendProductController::class, 'index'])->name('products.index');
Route::get('/products/filter', [FrontendProductController::class, 'filter'])->name('products.filter'); // AJAX
Route::get('/products/from/category', [FrontendProductController::class, 'getProductsFromCategory'])->name('products.from.category');



/** Newsletter routes */

Route::post('newsletter-request', [NewsletterController::class, 'newsLetterRequset'])->name('newsletter-request');
Route::get('newsletter-verify/{token}', [NewsletterController::class, 'newsLetterEmailVarify'])->name('newsletter-verify');


/** about page route */
Route::get('about', [PageController::class, 'about'])->name('about');
/** terms and conditions page route */
Route::get('terms-and-conditions', [PageController::class, 'termsAndCondition'])->name('terms-and-conditions');
/** contact route */
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::post('contact', [PageController::class, 'handleContactForm'])->name('handle-contact-form');



/** blog routes */
Route::get('blog', [BlogController::class, 'blog'])->name('blog');


Route::get('/solutions', [SolutionController::class, 'index'])->name('solutions.index');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Careers
Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('careers.show');
Route::post('/careers/{id}/apply', [CareerController::class, 'apply'])->name('careers.apply');

Route::middleware(['slug.redirect'])->group(function () {
    Route::get('/products/{slug}', [FrontendProductController::class, 'show'])->name('products.show');
    Route::get('/category/{slug}', [FrontendCategoryController::class, 'show'])->name('category.show');
    Route::get('/blog-details/{slug}', [BlogController::class, 'blogDetails'])->name('blog-details');
    Route::get('/solutions/{slug}', [SolutionController::class, 'show'])->name('solutions.show');
    Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/pages/{slug}', [PageController::class, 'show'])->name('pages.show');
});
