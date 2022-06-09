<?php

use App\Models\Banner;
use App\Models\Components;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

#АДМИН
Route::get('/adminLogin', function () {
    return view('login');
})->name('home');
Route::get('/register', function (){
    return view('registration');
})->name('reg_page');
Route::post('/registration',[\App\Http\Controllers\AdminController::class, 'save'])->name('register');
Route::post('/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::get('/logout', function (){
    Auth::logout();
    return redirect(route('home'));
})->name('logout');
Route::group(['middleware' => ['auth', 'isadmin']], function(){
        #Продукты админ
        Route::get('/products', [\App\Http\Controllers\ProductController::class, 'show'])->name('adminProducts_all');
        Route::post('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('adminProduct_create');
        Route::delete('product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('admin_product_delete');
        Route::get('/product/update/{id}', function (Product $id) {
            return view('admin_product_update', compact('id'));
        })->name('get_admin_product_update');
        Route::patch('/product/update/admin/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('admin_product_update');
        Route::get('/product/card/{id}', [\App\Http\Controllers\ProductController::class, 'card'])->name('admin_product_card');
        Route::post('/product/image/attach/{id}', [\App\Http\Controllers\ProductController::class, 'image_add'])->name('image_add');
        Route::delete('/product/image/delete/{id}', [\App\Http\Controllers\ProductController::class, 'image_delete'])->name('image_delete');

        #Прикрепление компонента к продукту
        Route::post('product/attach/component/{id}', [\App\Http\Controllers\ProductController::class, 'attach'])->name('product_attach_component');
        Route::post('product/detach/component/{id}', [\App\Http\Controllers\ProductController::class, 'detach'])->name('product_detach_component');

        #Компоненты админ
        Route::get('/components', [\App\Http\Controllers\ComponentController::class, 'show'])->name('admin_components_all');
        Route::post('/components/create', [\App\Http\Controllers\ComponentController::class, 'create'])->name('admin_components_create');
        Route::delete('/component/delete/{id}',[\App\Http\Controllers\ComponentController::class, 'delete'])->name('delete_component');
        Route::patch('/components/edit/{id}', [\App\Http\Controllers\ComponentController::class, 'edit'])->name('edit_component');

        #Рекламный слайдер
        Route::get('/slider', [\App\Http\Controllers\BannerController::class,'show'])->name('banners');
        Route::post('/slider/create', [\App\Http\Controllers\BannerController::class, 'create'])->name('create_banner');
        Route::patch('/slider/update/{id}', [\App\Http\Controllers\BannerController::class,'update'])->name('update_banner');
        Route::delete('/slider/delete/{id}',[\App\Http\Controllers\BannerController::class, 'delete'])->name('delete_banner');

        # ЗАКАЗЫ
        Route::get('/orders',[\App\Http\Controllers\OrderController::class, 'index'])
        ->name('orders');
        Route::get('/order/{order}',[\App\Http\Controllers\OrderController::class, 'order_card'])->name('order_card');
        Route::post('/order/update/status/{id}',[\App\Http\Controllers\OrderController::class, 'update_status'])->name('status_update');
        Route::get('/order/search',[\App\Http\Controllers\OrderController::class, 'query'])->name('admin_typehead');


});

# КЛИЕНТСКАЯ ЧАСТЬ

Route::get('/', function (){
    $banners =Banner::all();
    return view('user.home_page', compact('banners'));
})->name('home_client');
# КАТАЛОГ
Route::get('/catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/search',[\App\Http\Controllers\CatalogController::class,'query'])->name('typehead');
Route::get('/catalog/card/{product}', [\App\Http\Controllers\ProductController::class, 'card'])->name('card');

# КОРЗИНА
Route::get('/basket',[\App\Http\Controllers\BasketController::class, 'show'])->name('basket');
Route::post('/basket/add/{product_id}',[\App\Http\Controllers\BasketController::class, 'add'])->name('add_basket');
Route::post('/basket/add_count/{id}', [\App\Http\Controllers\BasketController::class, 'add_count'])->name('add_count');
Route::post('/basket/minus_count/{id}', [\App\Http\Controllers\BasketController::class, 'minus_count'])->name('minus_count');
Route::delete('/basket/delete/{id}', [\App\Http\Controllers\BasketController::class,'delete'])->name('delete_product_basket');

# ЗАКАЗ
Route::get('/order', function (){
    if(\App\Models\Basket::count()!=0) {
        $basket= \App\Models\Basket::getBasket();
        return view('user.order',compact('basket'));
    }
    else{
        return redirect(route('catalog'));
    }
})->name('order');
Route::post('/order/arrange', [\App\Http\Controllers\OrderController::class, 'create'])->name('create_order');
Route::get('/basket/success', [\App\Http\Controllers\OrderController::class, 'success'])->name('done_order');

# ПИСЬМО НА ПОЧТУ
Route::get('/send/{id}',[\App\Http\Controllers\MailController::class, 'send'])->name('send_mail');

# ЧАТ БОТИК
Route::match(['get', 'post'], '/botman', [\App\Http\Controllers\BotmanController::class,'handle']);

