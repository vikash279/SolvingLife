<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Admin Routes
Route::get('/login',[AdminController::class, 'login'])->name('login');
Route::post('/dologin',[AdminController::class, 'doLogin'])->name('dologin');
Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/team-members-list',[AdminController::class, 'allUsers'])->name('team-members-list');
Route::get('/add-team-member',[AdminController::class, 'addUsers'])->name('add-team-member');
Route::get('/edituser/{id}',[AdminController::class, 'editUsers']);
Route::get('/add-team-member',[AdminController::class, 'addUsers'])->name('add-team-member');
Route::post('/addteammember',[AdminController::class, 'addTeamMember'])->name('addteammember');
Route::get('/packages',[AdminController::class, 'packages'])->name('packages');
Route::get('/autopool',[AdminController::class, 'autopool'])->name('autopool');
Route::get('/payment-history',[AdminController::class, 'paymentHistory'])->name('payment-history');
Route::post('/getreferraldeatils',[AdminController::class, 'getReferralDeatils'])->name('getreferraldeatils');
Route::post('/changeuserstatus',[AdminController::class, 'changeUserStatus'])->name('changeuserstatus');
Route::post('/changeuserstatusactive',[AdminController::class, 'changeUserStatusActive'])->name('changeuserstatusactive');
Route::post('/updateteammember',[AdminController::class, 'updateTeamMember'])->name('updateteammember');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('logout', function ()
{
    Session()->flush();

    return Redirect::to('/login');
})->name('logout');

