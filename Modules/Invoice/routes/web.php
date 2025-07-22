<?php

use Illuminate\Support\Facades\Route;
use Modules\Invoice\App\Http\Controllers\InvoiceController;

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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('invoice', InvoiceController::class)->names('invoice');
    Route::get('invoice-display/{billingId}/{clientId}/{invoiceDate}', [InvoiceController::class, 'invoice_display'])->name('invoice.display');

    Route::post('/download-invoice', [InvoiceController::class, 'downloadInvoice'])->name('download.invoice');
});
