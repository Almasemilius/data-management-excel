<?php

use App\Http\Controllers\web\CsvDataController;
use App\Http\Livewire\Pages\HomePage;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomePage::class);
Route::get('home',[CsvDataController::class,'filter']);
Route::get('export-excel',[CsvDataController::class,'exportExcel'])->name('export.excel');
Route::post('import-csv',[CsvDataController::class,'importCsv'])->name('import.csv');
Route::get('home',[CsvDataController::class,'filter'])->name('filter');
