<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
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
Route::get('/home', [HomeController::class, 'index'])->name('index');

//profile routes start
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
//profile routes end

//admin routes start
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/project/{id}/detail', [HomeController::class, 'projectDetail'])->name('admin.project.detail');
    Route::get('/admin/leader', [HomeController::class, 'leader'])->name('admin.leader');
    Route::get('/admin/leader/create', [HomeController::class, 'leaderCreate'])->name('admin.leader.create');
    Route::post('/admin/leader/store', [HomeController::class, 'leaderStore'])->name('admin.leader.store');
    Route::get('/admin/leader/{id}/detail', [HomeController::class, 'leaderShow'])->name('admin.leader.show');
    Route::get('/admin/leader/{id}/edit', [HomeController::class, 'leaderEdit'])->name('admin.leader.edit');
    Route::post('/admin/leader/{id}/update', [HomeController::class, 'leaderUpdate'])->name('admin.leader.update');
    Route::get('/admin/leader/{id}/delete', [HomeController::class, 'leaderDelete'])->name('admin.leader.delete');

    Route::get('/admin/teams', [TeamController::class, 'index'])->name('admin.team');
    Route::get('/admin/teams/create', [TeamController::class, 'create'])->name('admin.team.create');
    Route::post('/admin/teams/store', [TeamController::class, 'store'])->name('admin.team.store');
    Route::get('/admin/teams/{id}/edit', [TeamController::class, 'edit'])->name('admin.team.edit');
    Route::post('/admin/teams/{id}/update', [TeamController::class, 'update'])->name('admin.team.update');
    Route::get('/admin/teams/{id}/delete', [TeamController::class, 'destroy'])->name('admin.team.delete');
});
//admin routes end

//leader routes start
Route::group(['middleware' => ['leader']], function () {
    Route::get('/leader/dashboard', [LeaderController::class, 'dashboard'])->name('leader.dashboard');
    Route::get('/leader/project/{id}/detail', [LeaderController::class, 'projectDetail'])->name('leader.project.detail');
    Route::get('/leader/member', [LeaderController::class, 'index'])->name('leader.member');
    Route::get('/leader/member/create', [LeaderController::class, 'create'])->name('leader.member.create');
    Route::post('/leader/member/store', [LeaderController::class, 'store'])->name('leader.member.store');
    Route::get('/leader/member/{id}/detail', [LeaderController::class, 'show'])->name('leader.member.show');
    Route::get('/leader/member/{id}/edit', [LeaderController::class, 'edit'])->name('leader.member.edit');
    Route::post('/leader/member/{id}/update', [LeaderController::class, 'update'])->name('leader.member.update');
    Route::get('/leader/member/{id}/delete', [LeaderController::class, 'destroy'])->name('leader.member.delete');

});
//leader routes end

//member routes start
Route::group(['middleware' => ['member']], function () {
    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
    Route::get('/member/task', [MemberController::class, 'task'])->name('member.task');
    Route::post('/member/task/create', [MemberController::class, 'taskCreate'])->name('member.task.create');


    Route::get('/member/project', [MemberController::class, 'index'])->name('member.project');
    Route::get('/member/project/create', [MemberController::class, 'create'])->name('member.project.create');
    Route::post('/member/project/store', [MemberController::class, 'store'])->name('member.project.store');
    Route::get('/member/project/{id}/detail', [MemberController::class, 'show'])->name('member.project.show');
    Route::get('/member/project/{id}/edit', [MemberController::class, 'edit'])->name('member.project.edit');
    Route::post('/member/project/{id}/update', [MemberController::class, 'update'])->name('member.project.update');
    Route::get('/member/project/{id}/delete', [MemberController::class, 'destroy'])->name('member.project.delete');

});
//member routes end
