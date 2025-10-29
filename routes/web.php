   <?php

   use Illuminate\Support\Facades\Route;
   use App\Http\Controllers\CategoryController;
   use App\Http\Controllers\MenuController;
   use App\Http\Controllers\OrderController;
   use App\Http\Controllers\DashboardController;

   Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
   Route::resource('categories', CategoryController::class);
   Route::resource('menus', MenuController::class);
   Route::resource('orders', OrderController::class);
   