<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::get('/',function(){
    
    return redirect('/admin/login'); 
});


//Blogs
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/products/{id}', [App\Http\Controllers\HomeController::class, 'product']);

Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop']);
Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart']);

Route::post('/cart/add_to_cart', [App\Http\Controllers\HomeController::class, 'add_to_cart']);
Route::get('/cart/remove/{id}', [App\Http\Controllers\HomeController::class, 'cart_remove']);
Route::get('/combination_maker', [App\Http\Controllers\HomeController::class, 'combination_maker']);
Route::get('/blogs/categories/{id}', [App\Http\Controllers\HomeController::class, 'blog_categories']);




//Admin
Route::get('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');
Route::post('/admin/login_submit', [App\Http\Controllers\Admin\AuthController::class, 'login_submit']);

Route::middleware(['web', 'auth'])->group(function () {

    
Route::get('/admin/update_file_url', [App\Http\Controllers\Admin\DashboardController::class, 'update_file_url']);

Route::get('/admin/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout']);
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
Route::get('/admin/changepassword', [App\Http\Controllers\Admin\DashboardController::class, 'changepassword']);
Route::post('/admin/changepassword_submit', [App\Http\Controllers\Admin\DashboardController::class, 'changepassword_submit']);

Route::get('/admin/status', [App\Http\Controllers\Admin\DashboardController::class, 'status']);


//Users
Route::get('/admin/users/index', [App\Http\Controllers\Admin\UserController::class, 'index']);
Route::get('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create']);
Route::post('/admin/users/store', [App\Http\Controllers\Admin\UserController::class, 'store']);
Route::get('/admin/users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
Route::post('/admin/users/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
Route::get('/admin/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete']);

//Roles
Route::get('/admin/roles/index', [App\Http\Controllers\Admin\RoleController::class, 'index']);
Route::get('/admin/roles/create', [App\Http\Controllers\Admin\RoleController::class, 'create']);
Route::post('/admin/roles/store', [App\Http\Controllers\Admin\RoleController::class, 'store']);
Route::get('/admin/roles/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit']);
Route::post('/admin/roles/update/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update']);
Route::get('/admin/roles/delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'delete']);


//products
    Route::get('/admin/products/index', [App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('/admin/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create']);
    Route::post('/admin/products/store', [App\Http\Controllers\Admin\ProductController::class, 'store']);
    Route::get('/admin/products/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::post('/admin/products/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::get('/admin/products/remove-image/{id}', [App\Http\Controllers\Admin\ProductController::class, 'remove_image']);
    Route::get('/admin/products/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete']);


//Sliders
    Route::get('/admin/sliders/index', [App\Http\Controllers\Admin\SliderController::class, 'index']);
    Route::get('/admin/sliders/create', [App\Http\Controllers\Admin\SliderController::class, 'create']);
    Route::post('/admin/sliders/store', [App\Http\Controllers\Admin\SliderController::class, 'store']);
    Route::get('/admin/sliders/edit/{id}', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
    Route::post('/admin/sliders/update/{id}', [App\Http\Controllers\Admin\SliderController::class, 'update']);
    Route::get('/admin/sliders/delete/{id}', [App\Http\Controllers\Admin\SliderController::class, 'delete']);
    Route::post('/admin/products/variations/{id}', [App\Http\Controllers\Admin\ProductController::class, 'variations']);
    Route::get('/admin/products/remove-variation/{id}', [App\Http\Controllers\Admin\ProductController::class, 'remove_variation']);



 //products category
    Route::get('/admin/categories/index', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/admin/categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/admin/categories/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('/admin/categories/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('/admin/categories/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);




 //filemanager
    Route::get('admin/filemanager',[App\Http\Controllers\Admin\FilemanagerController::class,'index']);
    Route::get('admin/filemanager/create',[App\Http\Controllers\Admin\FilemanagerController::class,'create']);
    Route::post('admin/filemanager/store',[App\Http\Controllers\Admin\FilemanagerController::class,'store']);
    Route::get('admin/filemanager/edit/{id}',[App\Http\Controllers\Admin\FilemanagerController::class,'edit']);
    Route::post('admin/filemanager/update/{id}',[App\Http\Controllers\Admin\FilemanagerController::class,'update']);
    Route::get('admin/filemanager/delete/{id}',[App\Http\Controllers\Admin\FilemanagerController::class,'delete']);

    //Settings
    Route::get('admin/settings/edit', [App\Http\Controllers\Admin\SettingController::class, 'edit']);
    Route::post('admin/settings/update', [App\Http\Controllers\Admin\SettingController::class, 'update']);



});

// Auth::routes();

Route::fallback(function () {
    return redirect('/'); 
});