<?php

use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::middleware(['auth'])->group(function (){

    Route::prefix('admin')->group(function () {
        
        // DASHBOARD ROUTES
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    
        // INVENTORY ROUTES
        Route::get('inventory', [InventoryController::class, 'inventoryTable'])->name('inventoryTable');
        //Filter Inventory Row
        Route::get('filter', [InventoryController::class, 'filterInventory'])->name('filterInventory');
        //Sort Quantity
        Route::get('inventory-sort', [InventoryController::class, 'sortQuantity'])->name('sortQuantity');
        //Import CSV file
        Route::post('importProduct', [InventoryController::class, 'importCsv'])->name('importProductFromCsv');
        //Decrement Quantity
        Route::put('/decrement/{id}', [InventoryController::class, 'down'])->name('quantity.down');
        //Increment Quantity
        Route::put('/increment/{id}', [InventoryController::class, 'up'])->name('quantity.up');
        //Inline Edit price_each (TCG Mid)
        Route::put('/edit/{id}', [InventoryController::class, 'edit'])->name('price_each.edit');
        Route::post('/update/{id}', [InventoryController::class, 'sold'])->name('csv.update');
        Route::post('/delete/{id}', [InventoryController::class, 'delete'])->name('csv.delete');
        //Selected Delete Inventory
        Route::delete('/delete-selected-inventory', [InventoryController::class, 'deleteSelectInventory'])->name('delete-selected-inventory');
    
        // ORDERS ROUTES
        Route::get('orders', [OrderController::class, 'orders'])->name('orders');
        Route::get('/delete-order/{tcgplacer_id}/{id}', [OrderController::class, 'returnOrder'])->name('delete-order');
        Route::post('/edit-order/{id}', [OrderController::class, 'editOrder'])->name('edit-order');
        Route::delete('/delete-selected-order', [OrderController::class, 'deleteSelectOrder'])->name('delete-selected-order');
        Route::post('/edit-order/{id}', [OrderController::class, 'editOrder'])->name('edit-order');
    
        // SETTINGS ROUTES
        Route::match(['post', 'get'], '/settings/{id?}', [SettingsController::class, 'settings'])->name('settings');
        Route::post('/add-currency', [SettingsController::class, 'addCurrency'])->name('add-currency');
        Route::post('/add-method', [SettingsController::class, 'addMethod'])->name('add-method');
    });

});

Route::middleware(['auth', 'user-role:admin'])->group(function(){
    //Admin Panel
    Route::get('admin-panel', [AdminPanelController::class, 'adminPanel'])->name('adminPanel');
});




Route::get('/', function () {
    return view('welcome');
});

Route::post('/get-alert', function () {
    return response()->json(['message' => 'success to use ajax'], 200);
});
