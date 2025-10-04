<?php

use App\Http\Controllers\CarrerController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AgronomicExpenseController; //2

use App\Http\Controllers\AreaController; //3

use App\Http\Controllers\CropTypeController; //4

use App\Http\Controllers\CropController; //5

use App\Http\Controllers\CustomerController; //6

use App\Http\Controllers\EmployeeController; //7

use App\Http\Controllers\FarmController; //8

use App\Http\Controllers\HarvestController; //9

use App\Http\Controllers\InsecticideController; //10

use App\Http\Controllers\OwnerController; //11

use App\Http\Controllers\Post_HarvestController; //12

use App\Http\Controllers\PreparationController; //13

use App\Http\Controllers\ProductionController; //14

use App\Http\Controllers\Property_TypeController; //15

use App\Http\Controllers\SaleController; //6

use App\Http\Controllers\SowingController; //17

use App\Livewire\Products\ProductList;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    
    });

    

    // Route::resource('/categories', CategoryController::class);
    // Route::resource('/animals', AnimalController::class);

require __DIR__ . '/auth.php';

Route::resource('/agronomic_expenses', AgronomicExpenseController::class);
Route::resource('/areas', AreaController::class);
Route::resource('/crop_types', CropTypeController::class);
Route::resource('/crops', CropController::class);
Route::resource('/customers', CustomerController::class);
Route::resource('/employees', EmployeeController::class);
Route::resource('/farms', FarmController::class);
Route::resource('/harvests', HarvestController::class);
Route::resource('/insecticides', InsecticideController::class);
Route::resource('/owners', OwnerController::class);
Route::resource('/post_harvests', Post_HarvestController::class);
Route::resource('/preparations', PreparationController::class);
Route::resource('/productions', ProductionController::class);
Route::resource('/property_types', Property_TypeController::class);
Route::resource('/sales', SaleController::class);
Route::resource('/sowings', SowingController::class);



