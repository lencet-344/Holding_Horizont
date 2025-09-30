<?php

use App\Http\Controllers\CarrerController;
use App\Http\Controllers\ProfileController;
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

Route:: resource('/employees', 'EmployeeController'::class);
Route:: resource('/areas', 'AreaController'::class );
Route:: resource('/agronomics', 'AgronomicContoller'::class);
Route:: resource('/crops', 'CropContoller'::class);
Route:: resource('/crop_types', 'Crop_TypeContoller'::class);
Route:: resource('/customers', 'CustomerContoller'::class);
Route:: resource('/farms', 'FarmContoller'::class);
Route:: resource('/harvests', 'HarvestContoller'::class);
Route:: resource('/insecticides', 'InsecticideContoller'::class);
Route:: resource('/owners', 'OwnerContoller'::class);
Route:: resource('/post_harvests', 'Post_HarvestContoller'::class);
Route:: resource('/preparations', 'PreparationContoller'::class);
Route:: resource('/productions', 'ProductionContoller'::class);
Route:: resource('/property_types', 'Property_TypeContoller'::class);
Route:: resource('/sales', 'SaleContoller'::class);
Route:: resource('/sowings', 'SowingContoller'::class);
