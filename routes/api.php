<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FavDocController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersAppointmentsController;
use App\Http\Controllers\UsersFavDocController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return auth()->user();
    });

    Route::resource('appointment', AppointmentsController::class)->only([ 'store']);
    Route::resource('user', UserController::class)->only([ 'show' , 'update']);
    Route::resource('favoriteDoctor', FavDocController::class)->only([ 'store', 'destroy']);
    Route::resource('doctor', DoctorController::class)->only([ 'show', 'index']);
    Route::get('user/{id}/favoriteDoctors', [UsersFavDocController::class, 'index'])->name('user.favDocs.index');
    Route::get('user/{id}/appointments', [UsersAppointmentsController::class, 'index'])->name('user.appointments.index');

    


    Route::post('/logout', [AuthController::class, 'logout']);
});
