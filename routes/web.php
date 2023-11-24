<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DamageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\MissingController;
use App\Http\Controllers\ReplaceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductInController;
use App\Http\Controllers\Ecom\HeaderController;
use App\Http\Controllers\ProductSaleController;
use App\Http\Controllers\Ecom\InvoiceController;
use App\Http\Controllers\Ecom\ProductController;
use App\Http\Controllers\EcomCategoryController;
use App\Http\Controllers\settings\BannerController;
use App\Http\Controllers\settings\OutsideSettingsController;

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
Route::get('/getdata', [DashboardController::class, 'getdata']);
Route::get('/getcollection', [DashboardController::class, 'getcollection']);
Route::get('/getexpense', [DashboardController::class, 'getexpense']);
Route::get('/getreplace', [DashboardController::class, 'getreplace']);

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
Route::get('/sale/view-two/{invoice}',[ProductSaleController::class,'show_two'])->name('sales.view_two');

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
Route::get('/findCollection', [ProductSaleController::class,'findCollection']);
Route::get('/findSaleDate', [ProductSaleController::class,'findSaleDate']);

// stock
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::get('/stock/details', [StockController::class, 'details'])->name('stock.details');
Route::get('/stock/search', [StockController::class, 'search'])->name('stock.search');
Route::get('/stock/details/find', [StockController::class, 'detailsSearch'])->name('stockdetails.search');


//damage
Route::get('/damage', [DamageController::class, 'index'])->name('damage.index');
Route::post('/damage/store', [DamageController::class, 'store'])->name('damage.store');
Route::get('/damage/edit/{id}',[DamageController::class,'edit'])->name('damage.edit');
Route::post('/damage/update/{id}',[DamageController::class,'update'])->name('damage.update');
Route::delete('/damage/delete/{id}',[DamageController::class,'destroy'])->name('damage.delete');
Route::get('/damage/search', [DamageController::class, 'search'])->name('damage.search');

Route::get('/findDamageProductCat', [DamageController::class, 'findDamageProductCat']);
Route::get('/findDamageProduct', [DamageController::class, 'findDamageProduct']);

//missing
Route::get('/missing', [MissingController::class, 'index'])->name('missing.index');
Route::post('/missing/store', [MissingController::class, 'store'])->name('missing.store');
Route::get('/missing/edit/{id}',[MissingController::class,'edit'])->name('missing.edit');
Route::post('/missing/update/{id}',[MissingController::class,'update'])->name('missing.update');
Route::delete('/missing/delete/{id}',[MissingController::class,'destroy'])->name('missing.delete');
Route::get('/missing/search', [MissingController::class, 'search'])->name('missing.search');

//replcae
Route::get('/replace', [ReplaceController::class, 'index'])->name('replace.index');
Route::post('/replace/store', [ReplaceController::class, 'store'])->name('replace.store');
Route::get('/replace/edit/{id}',[ReplaceController::class,'edit'])->name('replace.edit');
Route::post('/replace/update/{id}',[ReplaceController::class,'update'])->name('replace.update');
Route::delete('/replace/delete/{id}',[ReplaceController::class,'destroy'])->name('replace.delete');
Route::get('/replace/search', [ReplaceController::class, 'search'])->name('replace.search');

//daily
Route::get('/collection', [DailyController::class, 'collection'])->name('collection.index');
Route::post('/collection/store', [DailyController::class, 'collection_store'])->name('collection.store');
Route::get('/collection/edit/{id}',[DailyController::class,'collection_edit'])->name('collection.edit');
Route::post('/collection/update/{id}',[DailyController::class,'collection_update'])->name('collection.update');
Route::delete('/collection/delete/{id}',[DailyController::class,'collection_destroy'])->name('collection.delete');
Route::get('/collection/search', [DailyController::class, 'collection_search'])->name('collection.search');

Route::get('/expense', [DailyController::class, 'expense'])->name('expense.index');
Route::post('/expense/store', [DailyController::class, 'expense_store'])->name('expense.store');
Route::get('/expense/edit/{id}',[DailyController::class,'expense_edit'])->name('expense.edit');
Route::post('/expense/update/{id}',[DailyController::class,'expense_update'])->name('expense.update');
Route::delete('/expense/delete/{id}',[DailyController::class,'expense_destroy'])->name('expense.delete');
Route::get('/expense/search', [DailyController::class, 'expense_search'])->name('expense.search');

Route::get('/note', [DailyController::class, 'note'])->name('note.index');
Route::post('/note/store', [DailyController::class, 'note_store'])->name('note.store');
Route::get('/note/edit/{id}',[DailyController::class,'note_edit'])->name('note.edit');
Route::post('/note/update/{id}',[DailyController::class,'note_update'])->name('note.update');
Route::delete('/note/delete/{id}',[DailyController::class,'note_destroy'])->name('note.delete');
Route::get('/note/search', [DailyController::class, 'note_search'])->name('note.search');

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

//invoice
Route::get('/ecommerce/invoice', [InvoiceController::class, 'index'])->name('ecom_invoice.index');
Route::get('/ecommerce/invoice/create', [InvoiceController::class, 'create'])->name('ecom_invoice.create');
Route::post('/ecommerce/invoice/store', [InvoiceController::class, 'store'])->name('ecom_invoice.store');
Route::get('/ecommerce/invoice/edit/{id}', [InvoiceController::class, 'edit'])->name('ecom_invoice.edit');
Route::post('/ecommerce/invoice/update/{id}', [InvoiceController::class, 'update'])->name('ecom_invoice.update');
Route::get('/ecommerce/invoice/show/{invoice}', [InvoiceController::class, 'show'])->name('ecom_invoice.show');
Route::get('/ecommerce/invoice/delete/{id}', [InvoiceController::class, 'destroy'])->name('ecom_invoice.delete');

Route::get('/ecomCategory', [InvoiceController::class, 'ecomCategory']);
Route::get('/ecomSubCategory', [InvoiceController::class, 'ecomSubCategory']);
Route::get('/ecomproductsellprice', [InvoiceController::class, 'ecomproductsellprice']);
Route::get('/ecomproductquantity', [InvoiceController::class, 'ecomproductquantity']);
Route::get('/ecomsalequantity', [InvoiceController::class, 'ecomsalequantity']);

//setings
Route::get('/settings', [OutsideSettingsController::class, 'index'])->name('settings.index');
Route::post('/settings/store', [OutsideSettingsController::class, 'store'])->name('settings.store');
Route::post('/settings/update/{id}', [OutsideSettingsController::class, 'update'])->name('settings.update');

Route::get('/settings/banner', [BannerController::class, 'index'])->name('banner.index');
Route::post('/settings/banner/store', [BannerController::class, 'store'])->name('banner.store');
Route::delete('/settings/banner/delete/{id}',[BannerController::class,'destroy'])->name('banner.delete');

