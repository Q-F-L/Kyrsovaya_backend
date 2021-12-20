<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TouragentController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Auth\TouragentController2;
use App\Models\Users;

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

Route::apiResources([
    'touragent' => TouragentController::class,
]);

Route::get('touragent/search/{name}', [TouragentController::class, 'search']);
// Route::post('touragent/register', [TouragentController2::class, 'register']);

Route::apiResources([
    'user' => UserApiController::class,
]);

Route::get('user/search/{name}', [UserApiController::class, 'search']);