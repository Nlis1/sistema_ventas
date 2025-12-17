<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DetailSalesController;
use App\Http\Controllers\frontend\ProductsController as FrontendProductsController;
use App\Http\Controllers\frontend\CategoriesController as FrontendCategoriesController;
use App\Http\Controllers\frontend\AccountController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

//crear un usuario admin
//Route::get('/crear-admin', [AuthController::class, 'crearAdmin']);
Route::get('/', [FrontendProductsController::class, 'index'])->name('home');
Route::get('/products/listar', [FrontendProductsController::class, 'listar_products'])->name('products.listar');
Route::get('/product-detail/{id}', [FrontendProductsController::class, 'detail_product'])->name('product-detail');
Route::get('/categories/listar', [FrontendCategoriesController::class, 'listar_categories'])->name('categories.listar');
Route::get('/category/{id}', [FrontendCategoriesController::class, 'listar_productos_por_categoria'])->name('categories-productos');
Route::get('/category', [FrontendCategoriesController::class, 'index'])->name('category');

Route::get('/login',  [AuthController::class, 'index'])->name('login');
Route::get('/register',  [AuthController::class, 'register'])->name('register');
Route::post('/loguear',  [AuthController::class, 'loguear'])->name('loguear');
Route::post('/store', [AuthController::class, 'store'])->name('store');
Route::get('/logout',  [AuthController::class, 'logout'])->name('logout');

Route::prefix('order')->middleware('auth')->group(function(){
    Route::get('/', [OrdersController::class, 'index'])->name('orders');
  Route::post('/store', [OrdersController::class, 'store'])->name('order.store');
});

Route::middleware('auth')->group(function(){
  Route::get('/account', [AccountController::class, 'index'])->name('account');
  Route::get('/orders/listar', [AccountController::class, 'listar_orders'])->name('orders.user');
});

Route::middleware('auth')->group(function(){
    Route::get('/cart/listar', [CartController::class, 'obtenerCarrito'])->name('cart.listar');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{id}',[CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

});

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard',  [Dashboard::class, 'index'])->name('dashboard');
});

Route::prefix('sales')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/new-sale', [SalesController::class , 'index'])->name('sales-new');
});

Route::prefix('detail')->middleware(['auth', 'isAdmin'])->group(function(){
     Route::get('/detail-sale', [DetailSalesController::class , 'index'])->name('detail-sale');
});

Route::prefix('categories')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/', [CategoriesController::class,  'index'])->name('categories');
    Route::get('/create', [CategoriesController::class,  'create'])->name('categories.create');
    Route::post('/store', [CategoriesController::class,  'store'])->name('categories.store');
    Route::delete('/destroy/{id}', [CategoriesController::class,  'destroy'])->name('categories.destroy');    
    Route::get('/edit/{id}', [CategoriesController::class,  'edit'])->name('categories.edit');
    Route::put('/update/{id}', [CategoriesController::class,  'update'])->name('categories.update');
});

Route::prefix('products')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/', [ProductsController::class, 'index'])->name('products');
    Route::get('/create', [ProductsController::class,  'create'])->name('products.create');
    Route::post('/store', [ProductsController::class,  'store'])->name('products.store');
    Route::get('/edit/{id}', [ProductsController::class,  'edit'])->name('products.edit');
    Route::put('/update/{id}', [ProductsController::class,  'update'])->name('products.update');
    Route::get('/show-image/{id}', [ProductsController::class,  'show_image'])->name('products.show.image');
    Route::put('/update-image/{id}', [ProductsController::class,  'update_image'])->name('products.update.image');
    Route::delete('/destroy/{id}', [ProductsController::class,  'destroy'])->name('products.destroy');    

});

Route::prefix('proveedores')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/', [ProveedoresController::class, 'index'])->name('proveedores');
    Route::get('/create', [ProveedoresController::class,  'create'])->name('proveedores.create');
    Route::post('/store', [ProveedoresController::class,  'store'])->name('proveedores.store');
    Route::get('/edit/{id}', [ProveedoresController::class,  'edit'])->name('proveedores.edit');
    Route::put('/update/{id}', [ProveedoresController::class,  'update'])->name('proveedores.update');
    Route::delete('/destroy/{id}', [ProveedoresController::class,  'destroy'])->name('proveedores.destroy');    

});

Route::prefix('users')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/', [UsersController::class, 'index'])->name('users');
    Route::get('/create', [UsersController::class,  'create'])->name('users.create');
    Route::post('/store', [UsersController::class,  'store'])->name('users.store');
    Route::get('/edit/{id}', [UsersController::class,  'edit'])->name('users.edit');
    Route::put('/update/{id}', [UsersController::class,  'update'])->name('users.update');
    Route::get('/tbody', [UsersController::class, 'tbody'])->name('users.tbody');
    Route::get('/cambiar-estado/{id}/{estado}', [UsersController::class, 'estado'])->name('users.estado');
    Route::get('/cambiar-password/{id}/{password}', [UsersController::class,  'cambio_password'])->name('users.password');
});

Route::prefix('compras')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/', [ComprasController::class, 'index'])->name('compras');
    Route::get('/create/{product_id}', [ComprasController::class,  'create'])->name('compras.create');
    Route::post('/store', [ComprasController::class,  'store'])->name('compras.store');
    Route::get('/edit/{id}', [ComprasController::class,  'edit'])->name('compras.edit');
    Route::put('/update/{id}', [ComprasController::class,  'update'])->name('compras.update');
     Route::delete('/destroy/{id}', [ComprasController::class,  'destroy'])->name('compras.destroy');
});
