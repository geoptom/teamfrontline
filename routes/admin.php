<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CareerApplicationController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RedirectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SolutionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return redirect()->route('admin.products.index');});

Route::resource('products', ProductController::class);
Route::post('products/{product}/toggle-active', [ProductController::class, 'toggleActive'])->name('products.toggleActive');
Route::post('products/{product}/toggle-featured', [ProductController::class, 'toggleFeatured'])->name('products.toggleFeatured');
Route::post('products/{product}/images', [ProductController::class, 'uploadImages'])->name('products.images');

Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('sliders', SliderController::class);
Route::resource('pages', PageController::class);
Route::post('pages/toggle-visible', [PageController::class, 'toggleVisible'])->name('pages.toggleVisible');

Route::delete('products/{product}/remove-image/{image}', [ProductController::class, 'removeImage'])
    ->name('products.remove-image');

Route::get('products/import', [ProductController::class, 'importForm'])->name('products.import.form');
Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
Route::get('products/download/sample-csv', [ProductController::class, 'downloadSampleCsv'])->name('products.sample.csv');
Route::post('products/import/preview', [ProductController::class, 'importPreview'])->name('products.import.preview');

Route::delete('categories/{category}/remove-image/{type}', [CategoryController::class, 'removeImage'])
    ->name('categories.remove-image');
Route::patch('categories/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])
    ->name('categories.toggle-status');
Route::patch('brands/toggle-status/{brand}', [BrandController::class, 'toggleStatus'])
    ->name('brands.toggle-status');

Route::resource('solutions', SolutionController::class);
Route::patch('solutions/{solution}/toggle-status', [SolutionController::class, 'toggleStatus'])
    ->name('solutions.toggle-status');

Route::resource('services', ServiceController::class);
Route::patch('services/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])
    ->name('services.toggle-status');

/** Admin Routes */

Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::resource('redirects', RedirectController::class)
    ->names('redirects');
Route::get('redirects/search/ajax', [RedirectController::class, 'ajaxSearch'])
    ->name('redirects.ajax.search');

// /** Blog routes */
Route::put('blog-category/status-change', [BlogCategoryController::class, 'changeStatus'])->name('blog-category.status-change');
Route::resource('blog-category', BlogCategoryController::class);

Route::put('blog/status-change', [BlogController::class, 'changeStatus'])->name('blog.status-change');
Route::resource('blog', BlogController::class);

// Careers
Route::resource('careers', CareerController::class);
// Career applications (per-career) and downloads
Route::get('careers/{career}/applications', [CareerApplicationController::class, 'index'])->name('careers.applications.index');
Route::get('careers/applications/{application}/download', [CareerApplicationController::class, 'download'])->name('careers.applications.download');
Route::delete('careers/applications/{application}', [CareerApplicationController::class, 'destroy'])->name('careers.applications.destroy');
Route::patch('careers/applications/{application}/status', [CareerApplicationController::class, 'toggleStatus'])->name('careers.applications.status');
Route::get('blog-comments', [BlogCommentController::class, 'index'])->name('blog-comments.index');
Route::delete('blog-comments/{id}/destory', [BlogCommentController::class, 'destory'])->name('blog-comments.destory');

Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::post('settings/{group?}', [SettingController::class, 'update'])->name('settings.update');

Route::post('/settings/test/smtp', [SettingController::class, 'testSmtp'])
    ->name('settings.test.smtp');

Route::post('/settings/test/recaptcha', [SettingController::class, 'testRecaptcha'])
    ->name('settings.test.recaptcha');

Route::post('/settings/test/smtp-advanced', [SettingController::class, 'testSmtpAdvanced'])
    ->name('settings.test.smtp.advanced');



Route::get('reports/product/imports', [ProductController::class, 'importLogs'])->name('reports.products.import');


Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
Route::get('/messages/{id}', [ContactMessageController::class, 'show'])->name('messages.show');
Route::post('/messages/{id}/read', [ContactMessageController::class, 'markRead'])->name('messages.read');
Route::delete('/messages/{id}', [ContactMessageController::class, 'destroy'])->name('messages.delete');
