<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductInController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductSaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\EcomCategoryController;
use App\Http\Controllers\DamageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Ecom\HeaderController;
use App\Http\Controllers\Ecom\ProductController;
use App\Http\Controllers\ItemController;

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

Route::get('/', [HeaderController::class, 'index'])->name('mainView');
// Route::get('/', function () {
//     return view('welcome');
// })->name('mainView');

Route::get('login', [AuthController::class,'index'])->name('login');
Route::post('login', [AuthController::class,'authenticate'])->name('login');
Route::get('login', [AuthController::class,'index'])->name('loginFail');
Route::get('logout', [AuthController::class,'logout'])->name('logout');
// Route::get('', [HomeController::class,'index'])->name(');
// Route::get('register', [AuthController::class,'register_view'])->name('register');

// Dashboard
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.view');

//vendor
Route::get('/vendors', [VendorController::class,'index'])->name('vendor.view');
Route::post('/vendors', [VendorController::class,'store'])->name('vendor.store');
Route::get('/vendors/edit/{id}',[VendorController::class,'edit'])->name('vendor.edit');
Route::post('/vendors/update/{id}',[VendorController::class,'update'])->name('vendor.update');
Route::delete('/vendors/delete/{id}',[VendorController::class,'destroy'])->name('vendor.delete');

//supplier
Route::get('/suppliers', [SupplierController::class,'index'])->name('supplier.view');
Route::post('/suppliers', [SupplierController::class,'store'])->name('supplier.store');
Route::get('/suppliers/edit/{id}',[SupplierController::class,'edit'])->name('supplier.edit');
Route::post('/suppliers/update/{id}',[SupplierController::class,'update'])->name('supplier.update');
Route::delete('/suppliers/delete/{id}',[SupplierController::class,'destroy'])->name('supplier.delete');
Route::get('/suppliers/query', [SupplierController::class, 'search'])->name('supplier.search');

//customers
Route::get('/customers', [CustomerController::class,'index'])->name('customer.view');
Route::post('/customers', [CustomerController::class,'store'])->name('customer.store');
Route::get('/customers/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customers/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::delete('/customers/delete/{id}',[CustomerController::class,'destroy'])->name('customer.delete');
Route::get('/customers/search', [CustomerController::class, 'search'])->name('cus.search');

//category
Route::get('/category', [CategoryController::class,'index'])->name('category.view');
Route::post('/category', [CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::delete('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');

//purchase part
Route::get('/purchase/invoice', [ProductInController::class,'index'])->name('productin');
Route::get('/findVendor', [ProductInController::class, 'findVendor']);
Route::get('/purchase/invoice/create', [ProductInController::class,'create'])->name('productin.create');
Route::get('/findvendorwisecategory',[ProductInController::class,'findvendorwisecategory']);
Route::get('/findCatWiseProduct',[ProductInController::class,'findCatWiseProduct']);
Route::get('/dealerPrice',[ProductInController::class,'dealerPrice']);
Route::get('/tradePrice',[ProductInController::class,'tradePrice']);
Route::get('/mrpPrice',[ProductInController::class,'mrpPrice']);
Route::get('/discountPrice',[ProductInController::class,'discountPrice']);

//product in
Route::get('/input', [ProductInController::class,'index'])->name('pinput.view');
Route::post('/input', [ProductInController::class,'store'])->name('pinput.store');
Route::get('/input/edit/{id}',[ProductInController::class,'edit'])->name('pinput.edit');
Route::post('/input/update/{id}',[ProductInController::class,'update'])->name('pinput.update');
Route::delete('/input/delete/{id}',[ProductInController::class,'destroy'])->name('pinput.delete');
Route::get('/input/view/{invoice}',[ProductInController::class,'show'])->name('pinput.show');

Route::get('/input/invoice/search', [ProductInController::class, 'datesearch'])->name('pinput.datesearch');
Route::get('/input/invoice/query', [ProductInController::class, 'invoicesearch'])->name('pinput.invoice.search');

//sales part

Route::get('/sale/invoice', [ProductSaleController::class,'index'])->name('sales.index');
Route::get('/sale/invoice/create', [ProductSaleController::class,'create'])->name('sales.create');
Route::post('/sale/invoice/store', [ProductSaleController::class,'store'])->name('sales.store');
Route::get('/sale/edit/{id}',[ProductSaleController::class,'edit'])->name('sales.edit');
Route::post('/sale/update/{id}',[ProductSaleController::class,'update'])->name('sales.update');
Route::delete('/sale/delete/{id}',[ProductSaleController::class,'destroy'])->name('sales.delete');
Route::get('/sale/view/{invoice}',[ProductSaleController::class,'show'])->name('sales.view');

//note
Route::post('/notestore', [ProductSaleController::class, 'notestore']);

Route::get('/findCategory', [ProductSaleController::class,'findCategory']);
Route::get('/findProduct', [ProductSaleController::class,'findProduct']);
Route::get('/findVendorFromSale', [ProductSaleController::class, 'findVendorFromSale']);

Route::get('/sale/invoice/search', [ProductSaleController::class, 'datesearch'])->name('sale.datesearch');
Route::get('/sale/invoice/query', [ProductSaleController::class, 'invoicesearch'])->name('sale.invoice.search');
Route::get('/sale/invoice/query/cus', [ProductSaleController::class, 'cussearch'])->name('sale.cus.search');

//for quantity check
Route::get('/purchaseProduct', [ProductSaleController::class,'purchaseProduct']);
Route::get('/saleProduct', [ProductSaleController::class,'saleProduct']);

Route::get('/sellPrice', [ProductSaleController::class,'sellPrice']);
Route::get('/findCustomerInView', [ProductSaleController::class,'findCustomerInView']);
Route::get('/findSaleDue', [ProductSaleController::class,'findSaleDue']);

// stock
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::get('/stock/search', [StockController::class, 'search'])->name('stock.search');
//damage
Route::get('/damage', [DamageController::class, 'index'])->name('damage.index');
Route::post('/damage/store', [DamageController::class, 'store'])->name('damage.store');
Route::get('/findDamageProduct', [DamageController::class, 'findDamageProduct']);
Route::get('/damage/edit/{id}',[DamageController::class,'edit'])->name('damage.edit');
Route::post('/damage/update/{id}',[DamageController::class,'update'])->name('damage.update');
Route::delete('/damage/delete/{id}',[DamageController::class,'destroy'])->name('damage.delete');
Route::get('/damage/search', [DamageController::class, 'search'])->name('damage.search');

//report
Route::get('/profit', [ReportController::class, 'index'])->name('profit');

//Items
Route::get('/items', [ItemController::class, 'index'])->name('item.view');
Route::post('/items', [ItemController::class, 'store'])->name('item.store');
Route::get('/items/edit/{id}',[ItemController::class,'edit'])->name('items.edit');
Route::post('/items/update/{id}',[ItemController::class,'update'])->name('items.update');
Route::delete('/items/delete/{id}',[ItemController::class,'destroy'])->name('items.delete');
Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');


// ecom part///////////////
Route::get('/front/category', [EcomCategoryController::class, 'index'])->name('ecomcat.index');
Route::post('/front/category/store', [EcomCategoryController::class, 'store'])->name('ecomcat.store');
Route::post('/front/category/substore', [EcomCategoryController::class, 'substore'])->name('ecomcat.substore');

Route::get('/getEcomCat', [HeaderController::class, 'getEcomCat']);
Route::get('/product/show/{id}', [HeaderController::class, 'show'])->name('product_details');
Route::get('/product/category/show/{id}', [HeaderController::class, 'categoryshow'])->name('category_show');
// product
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/delete/{id}',[ProductController::class,'destroy'])->name('product.delete');

Route::get('/getSubCat', [ProductController::class, 'getSubCat']);
