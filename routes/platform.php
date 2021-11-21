<?php

declare(strict_types=1);

use App\Http\Requests\Contacts\ContactPhoneRequest;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/* Custom Orchid */
use App\Orchid\Screens\Products\ProductScreen;
use App\Orchid\Screens\Products\ProductEditScreen;
use App\Orchid\Screens\Category\CategoryScreen;
use App\Orchid\Screens\Category\SubcategoryScreen;
use App\Orchid\Screens\Reviews\ReviewScreen;
use App\Orchid\Screens\News\NewsScreen;
use App\Orchid\Screens\Contacts\ContactScreen;
use App\Orchid\Screens\Contacts\ContactPhoneScreen;
use App\Orchid\Screens\Contacts\ContactEmailScreen;
use App\Orchid\Screens\Contacts\ContactAddressScreen;
use App\Orchid\Screens\Promotions\PromotionScreen;
use App\Orchid\Screens\Certificates\CertificateScreen;
use App\Orchid\Screens\Settings\HeaderScreen;
use App\Orchid\Screens\Settings\FooterScreen;
use App\Orchid\Screens\Settings\SocialNetworksScreen;

use App\Orchid\Screens\Application\ApplicationScreen;
use App\Orchid\Screens\SEO\SEOScreen;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
// Route::screen('/main', PlatformScreen::class)
//     ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit');

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{roles}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });

/* Catalog */
Route::screen('category', CategoryScreen::class)->name('platform.category')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.category'), route('platform.category'));
});

Route::screen('subcategory', SubcategoryScreen::class)->name('platform.subcategory')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.subcategory'), route('platform.subcategory'));
});

/* Products */
Route::screen('products', ProductScreen::class)->name('platform.products')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('platform.products'), route('platform.products'));
});

Route::screen('products/create', ProductEditScreen::class)->name('product.create')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.products')
        ->push(__('platform.products_create'), route('product.create'));
});

Route::screen('products/{product}/edit', ProductEditScreen::class)->name('product.edit')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.products')
        ->push(__('platform.products_edit'), route('product.create'));
});

Route::screen('applications', ApplicationScreen::class)->name('platform.applications')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('platform.applications'), route('platform.applications'));
});

/* Review */
Route::screen('reviews', ReviewScreen::class)->name('platform.reviews')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.subcategory'), route('platform.reviews'));
});


/* News */
Route::screen('news', NewsScreen::class)->name('platform.news')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.news'), route('platform.news'));
});

/* Contacts */
Route::screen('contacts', ContactScreen::class)->name('platform.contacts')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.contacts'), route('platform.contacts'));
});

Route::screen('contact/phones', ContactPhoneScreen::class)->name('platform.phone')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.contacts_phone'), route('platform.phone'));
});

Route::screen('contact/email', ContactEmailScreen::class)->name('platform.email')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.contacts_email'), route('platform.email'));
});

Route::screen('contact/address', ContactAddressScreen::class)->name('platform.address')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.contacts_address'), route('platform.address'));
});

/* Promotions */
Route::screen('promotions', PromotionScreen::class)->name('platform.promotions')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.promotions'), route('platform.promotions'));
});

/* Certificates */
Route::screen('certificates', CertificateScreen::class)->name('platform.certificates')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.certificates'), route('platform.certificates'));
});

/* SEO */
Route::screen('seo', SEOScreen::class)->name('platform.seo')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('platform.seo'), route('platform.seo'));
});

/* Header */
Route::screen('header', HeaderScreen::class)->name('platform.header')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.header'), route('platform.header'));
});

/* Footer */
Route::screen('footer', FooterScreen::class)->name('platform.footer')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.footer'), route('platform.footer'));
});

/* Social Networks */
Route::screen('social', SocialNetworksScreen::class)->name('platform.social_networks')
->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push(__('platform.social_networks'), route('platform.social_networks'));
});
