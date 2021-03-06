<?php
use App\Http\Controllers\PageController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Public Routes
Route::resource('pages', PageController::class);
Route::resource('headers', HeaderController::class);
Route::resource('logos', LogoController::class);
Route::resource('settings', SettingController::class);
Route::resource('categorys', CategoryController::class);
Route::get('/pages', [PageController::class, 'index']);
Route::get('/headers', [HeaderController::class, 'index']);
Route::get('/logos', [LogoController::class, 'index']);
Route::get('/settings', [SettingController::class, 'index']);
Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/home', [PageController::class, 'home']);
Route::get('/pages{id}', [PageController::class, 'show']);
Route::get('pages/search/{name}', [PageController::class, 'search']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //Pages
    Route::post('/pages', [PageController::class, 'store']);
    Route::put('/pages/{id}', [PageController::class, 'update']);
    Route::delete('/pages/{id}', [PageController::class, 'destroy']);
    //Headers
    Route::post('/headers', [HeaderController::class, 'store']);
    Route::put('/headers/{id}', [PageController::class, 'update']);
    Route::delete('/headers/{id}', [HeaderController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


// 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
