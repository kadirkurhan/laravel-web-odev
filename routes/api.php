<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntryController;

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

// Route:resource('topics',TopicController::class);
// public routes

// Auth
// Route::post('/register',[AuthController::class,'register']);
// Route::post('/login',[AuthController::class,'login']);
Route::group(['middleware' => ['web']], function () {
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
});
// Topics
Route::get('/topics',[TopicController::class,'index']);
Route::get('topics/one/{id}',[TopicController::class,'show']);
Route::get('topics/search/{topicname}',[TopicController::class,'search']);
Route::get('topics/{id}',[TopicController::class,'entriesOfTopic']);
Route::get('topics/top/top10',[TopicController::class,'myFunc']);

// Entries
Route::get('/entries',[EntryController::class,'index']);
Route::get('/entries/{id}',[EntryController::class,'show']);

// Protected Routes
Route::group(['middleware'=>['auth:sanctum']],function(){
    // Topics
    Route::post('/topics',[TopicController::class,'store']);
    Route::put('/topics/{id}',[TopicController::class,'update']);
    Route::delete('/topics/{id}',[TopicController::class,'destroy']);
    
    // Entries
    Route::post('/entries',[EntryController::class,'store']);
    Route::put('/entries/{id}',[EntryController::class,'update']);
    Route::delete('/entries/{id}',[EntryController::class,'destroy']);

    // Auth
    Route::post('logout',[AuthController::class,'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
