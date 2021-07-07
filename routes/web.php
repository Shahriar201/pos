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

Route::get('/', 'Frontend\FrontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){

    Route::prefix('users')->group(function(){

        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');  
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::get('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');
        
    });
    
    Route::prefix('profiles')->group(function(){
    
        Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/store', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
        
    });
    
    Route::prefix('suppliers')->group(function(){
    
        Route::get('/view', 'Backend\SupplierController@view')->name('suppliers.view');
        Route::get('/add', 'Backend\SupplierController@add')->name('suppliers.add');
        Route::post('/store', 'Backend\SupplierController@store')->name('suppliers.store'); 
        Route::get('/edit/{id}', 'Backend\SupplierController@edit')->name('suppliers.edit');
        Route::post('/update/{id}', 'Backend\SupplierController@update')->name('suppliers.update');
        Route::post('/delete', 'Backend\SupplierController@delete')->name('suppliers.delete');
        
    });
    
    Route::prefix('customers')->group(function(){
    
        Route::get('/view', 'Backend\CustomerController@view')->name('customers.view');
        Route::get('/add', 'Backend\CustomerController@add')->name('customers.add');
        Route::post('/store', 'Backend\CustomerController@store')->name('customers.store'); 
        Route::get('/edit/{id}', 'Backend\CustomerController@edit')->name('customers.edit');
        Route::post('/update/{id}', 'Backend\CustomerController@update')->name('customers.update');
        Route::post('/delete', 'Backend\CustomerController@delete')->name('customers.delete');

        Route::get('/credit', 'Backend\CustomerController@creditCustomer')->name('customers.credit');
        Route::get('/credit/pdf', 'Backend\CustomerController@creditCustomerPdf')->name('customers.credit.pdf');
        Route::get('/invoice/edit/{invoice_id}', 'Backend\CustomerController@editInvoice')->name('customers.edit.invoice');
        Route::post('/invoice/update/{invoice_id}', 'Backend\CustomerController@updateInvoice')->name('customers.update.invoice');
        Route::get('/invoice/details/pdf/{invoice_id}', 'Backend\CustomerController@invoiceDetailsPdf')->name('invoice.details.pdf');
        
    });
    
    Route::prefix('units')->group(function(){
    
        Route::get('/view', 'Backend\UnitController@view')->name('units.view');
        Route::get('/add', 'Backend\UnitController@add')->name('units.add');
        Route::post('/store', 'Backend\UnitController@store')->name('units.store'); 
        Route::get('/edit/{id}', 'Backend\UnitController@edit')->name('units.edit');
        Route::post('/update/{id}', 'Backend\UnitController@update')->name('units.update');
        Route::post('/delete', 'Backend\UnitController@delete')->name('units.delete');
        
    });
    
    Route::prefix('categories')->group(function(){
    
        Route::get('/view', 'Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'Backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'Backend\CategoryController@store')->name('categories.store'); 
        Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Backend\CategoryController@update')->name('categories.update');
        Route::post('/delete', 'Backend\CategoryController@delete')->name('categories.delete');     
    });
    
    Route::prefix('products')->group(function(){
    
        Route::get('/view', 'Backend\ProductController@view')->name('products.view');
        Route::get('/add', 'Backend\ProductController@add')->name('products.add');
        Route::post('/store', 'Backend\ProductController@store')->name('products.store'); 
        Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('products.edit');
        Route::post('/update/{id}', 'Backend\ProductController@update')->name('products.update');
        Route::post('/delete', 'Backend\ProductController@delete')->name('products.delete');     
    });
    
    Route::prefix('purchases')->group(function(){
    
        Route::get('/view', 'Backend\PurchaseController@view')->name('purchases.view');
        Route::get('/add', 'Backend\PurchaseController@add')->name('purchases.add');
        Route::post('/store', 'Backend\PurchaseController@store')->name('purchases.store'); 
        Route::post('/delete', 'Backend\PurchaseController@delete')->name('purchases.delete');    
        Route::get('/purchase/pending/list', 'Backend\PurchaseController@pendingList')->name('purchases.pending.list');    
        Route::get('/purchases/approve/{id}', 'Backend\PurchaseController@approve')->name('purchases.approve');    

        Route::get('/report', 'Backend\PurchaseController@purchaseReport')->name('purchase.report');
        Route::get('/report/pdf', 'Backend\PurchaseController@purchaseReportPdf')->name('purchase.report.pdf');
    });

    // Get Category By Ajax
    Route::get('/get-category', 'Backend\DefaultController@getCategory')->name('get-category');
    Route::get('/get-product', 'Backend\DefaultController@getProduct')->name('get-product');

    Route::get('/get/stock', 'Backend\DefaultController@getStock')->name('check-product-stock');

    Route::prefix('invoice')->group(function(){
    
        Route::get('/view', 'Backend\InvoiceController@view')->name('invoice.view');
        Route::get('/add', 'Backend\InvoiceController@add')->name('invoice.add');
        Route::post('/store', 'Backend\InvoiceController@store')->name('invoice.store'); 
        Route::post('/delete', 'Backend\InvoiceController@delete')->name('invoice.delete');    
        Route::get('/purchase/pending/list', 'Backend\InvoiceController@pendingList')->name('invoice.pending.list');    
        Route::get('/invoice/approve/{id}', 'Backend\InvoiceController@approve')->name('invoice.approve');  
        Route::post('/delete', 'Backend\InvoiceController@delete')->name('invoice.delete');   
        Route::post('/approve/store/{id}', 'Backend\InvoiceController@approvalStore')->name('approval.store');
        
        Route::get('/print/invoice-list', 'Backend\InvoiceController@printInvoiceList')->name('invoice.print.list');
        Route::get('/print/invoice/{id}', 'Backend\InvoiceController@printInvoice')->name('invoice.print');
        Route::get('/daily/report', 'Backend\InvoiceController@dailyReport')->name('daily.invoice.report');
        Route::get('/daily/report/pdf', 'Backend\InvoiceController@dailyReportPdf')->name('daily.invoice.report.pdf');
        
    });
    
    Route::prefix('stock')->group(function(){
    
        Route::get('/report', 'Backend\StockController@stockReport')->name('stock.report');
        Route::get('/report/download/pdf', 'Backend\StockController@stockReportPdf')->name('stock.report.pdf');
                
        Route::get('/report/supplier/product/wise', 'Backend\StockController@SupplierProductWise')->name('stock.report.supplier.product.wise');
        Route::get('/report/supplier/wise/pdf', 'Backend\StockController@SupplierWisePdf')->name('stock.report.supplier.wise.pdf');
        Route::get('/report/product/wise/pdf', 'Backend\StockController@ProductWisePdf')->name('stock.report.product.wise.pdf');
                
    });
 
});
