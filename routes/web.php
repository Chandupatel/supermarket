<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

// Admin Auth Route
Route::get('admin/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login', 'Auth\Admin\LoginController@login')->name('admin-login');
Route::get('admin/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::namespace ('Admin')->group(function () {
                //Dashboard Route
                Route::get('/', 'HomeController@index')->name('admin-home');
                Route::get('/dashboard', 'HomeController@index')->name('dashboard');
                // Change Password Route
                Route::get('/change-password', 'HomeController@change_password')->name('change-password');
                Route::post('/update-password', 'HomeController@update_password')->name('password.update');
                // Update Profile Route
                Route::get('/profile', 'HomeController@profile')->name('profile');
                Route::post('/update-profile', 'HomeController@updateProfile')->name('profile.update');
                // Resources Route
                Route::resources([
                    'brands' => 'BrandController',
                    'units' => 'UnitController',
                    'categories' => 'CategoriesController',
                    'products' => 'ProductController',
                    'purchases' => 'PurchaseController',
                    'sellers' => 'SellerController',
                    'account-types' => 'AccountTypeController',
                    'accounts' => 'AccountController',
                    
                ]);
                /* Settings Routes */
                Route::prefix('settings')->group(function () {
                    Route::name('settings.')->group(function () {
                        Route::get('/general-settings', 'SettingsController@showGeneralSettingsForm')->name('general-settings');
                        Route::post('/save-general-settings', 'SettingsController@saveGeneralSettings')->name('save-general-settings');
                    });
                });

                /*------------------------- Other Routs ----------------------------------------------------------*/
                /* get sub category */
                Route::post('/get-sub-category', 'CategoriesController@get_sub_category')->name('get-sub-category');
                Route::post('/products/sub-categories', 'CategoriesController@productsSubCategories')
                ->name('products.sub-categories');
                // Autocomplete Brand
                Route::get('/get-autocomplete-brands', 'BrandController@getAutocompleteBrands')->name('get-autocomplete-brands');
                //Products Gallery Image
                Route::post('/products/gallery-image/save', 'ProductController@productsGalleryImageSave')
                ->name('products.gallery-image.save');
                Route::post('/products/gallery-image/delete', 'ProductController@productsGalleryImageDelete')
                ->name('products.gallery-image.delete');
            });
        });
    });
});
