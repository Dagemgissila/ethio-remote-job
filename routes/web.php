<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/Terms-of-service-and-policies',function(){
    return view('policies');
});

Route::middleware("auth","company")->group(function(){
    Route::get('/dashboard', function () {
        return view('licensedCompany.dashboard');
    })->name('dashboard');
});





require __DIR__.'/auth.php';
