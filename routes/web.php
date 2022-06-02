<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ConnexionController;


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

Route::get('/', function () {
    return view('welcome');

})->name ('menu');

Route::put('/projet/finance/{projet}', [ProjetController::class, 'finance'])->name('projet.finance');

Route::get('/budget', function () {
    return view('budget');
})->middleware(['auth'])->name('budget');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){
    Route::resource('budget',BudgetController::class);
    Route::resource('projet',ProjetController::class);
});


