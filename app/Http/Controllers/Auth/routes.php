<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

Route::group(['prefix' => 'auth'], function ($route) {
    $route->post('login', [AuthController::class, 'login']);

    $route->get('logout', function () {
        auth()->logout();
        return response()->json(['message' => 'Logout successfully !'], 200);
    })->middleware('auth');
});
