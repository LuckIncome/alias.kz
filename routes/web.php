<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/* Main Page */
Route::get('/', [PagesController::class, 'index'])->name('main');

/* Catalogs and category */
Route::get('/catalogs', [PagesController::class, 'catalogs'])->name('catalogs');

/* Products */
Route::get('/products', [PagesController::class, 'products'])->name('products');
Route::get('/products/{categoty_id}', [PagesController::class, 'productsCategory'])->name('products.category');
Route::get('/products/{categoty_id}/{subcategoty_id}', [PagesController::class, 'productsSubcategory'])->name('products.subcategory');
Route::get('/product/{id}', [PagesController::class, 'productDetails'])->name('product.details');

/* Product Search */
Route::get('/search', [PagesController::class, 'search'])->name('search');

/* News and Promotions */
Route::get('/news', [PagesController::class, 'news'])->name('news');
Route::get('/news/{id}', [PagesController::class, 'newsDetails'])->name('news.details');

Route::get('/promotions', [PagesController::class, 'promotions'])->name('promotions');
Route::get('/promotions/{id}', [PagesController::class, 'promotionsDetails'])->name('promotions.details');

/* Pages */
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/branches', [PagesController::class, 'branches'])->name('branches');
Route::get('/reviews', [PagesController::class, 'reviews'])->name('reviews');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
Route::get('/certificates', [PagesController::class, 'certificates'])->name('certificates');

Route::post('/application', [PagesController::class, 'application'])->name('application');
