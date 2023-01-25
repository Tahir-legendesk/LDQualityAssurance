<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin routes start
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/leader', [HomeController::class, 'leader'])->name('admin.leader');
    Route::get('/admin/leader/create', [HomeController::class, 'leaderCreate'])->name('admin.leader.create');
    Route::post('/admin/leader/store', [HomeController::class, 'leaderStore'])->name('admin.leader.store');
    Route::get('/admin/leader/{id}/detail', [HomeController::class, 'leaderShow'])->name('admin.leader.show');
    Route::get('/admin/leader/{id}/edit', [HomeController::class, 'leaderEdit'])->name('admin.leader.edit');
    Route::post('/admin/leader/{id}/update', [HomeController::class, 'leaderUpdate'])->name('admin.leader.update');
    Route::get('/admin/leader/{id}/delete', [HomeController::class, 'leaderDelete'])->name('admin.leader.delete');
    
    //Project detail
    Route::get('/admin/project/{id}/detail', [HomeController::class, 'projectDetail'])->name('admin.project.detail');




});
//admin routes end

//leader routes start
Route::group(['middleware' => ['leader']], function () {
    //
});
//leader routes end

//member routes start
Route::group(['middleware' => ['member']], function () {
    //
});
//member routes end
