<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function(){
    return redirect('transactions');
});
 
// Route untuk monitoring transaksi
Route::get('transactions', [TransactionController::class, 'index']);
