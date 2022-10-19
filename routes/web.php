<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/about',function (){
    return view('about');
});
Route::get('/dashboard/appointment',[AppointmentController::class,'index'])->name('createAppointment');
Route::post('/dashboard/appointment',[AppointmentController::class,'store']);
Route::get('/dashboard/all',[AppointmentController::class,'all'])->name('allAppointments');
//Route::get('/following',function (){
//    return view('following');
//});
//Route::post('/following',[AppointmentController::class,'show']);
Route::get('/services',[ServiceController::class,'index']);
Route::delete('/dashboard/all',[AppointmentController::class,'delete'])->name('deleteAppointment');
Route::get('/dashboard/info',[UserController::class,'show'])->name('info');
Route::patch('/dashboard/info',[UserController::class,'update'])->name('updateUser');


Route::get('/manager',[ManagerController::class,'index']);
Route::get('/manager/users',[ManagerController::class,'allUsers'])->name('allUsers');
Route::post('/manager/users',[ManagerController::class,'showUser'])->name('showUser');

Route::get('/manager/services',[ManagerController::class,'allServices'])->name('allServices');
Route::post('/manager/services',[ManagerController::class,'showService'])->name('showService');

Route::get('/manager/create',[ManagerController::class,'createService'])->name('createService');
Route::post('/manager/create',[ManagerController::class,'storeService'])->name('storeService');

