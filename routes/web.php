<?php

use Illuminate\Support\Facades\Route;
use App\Models\Entry;
use App\Models\Topic;
use App\Models\User;


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
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard/login', function () {
    return view('dashboard-login');
});

Route::get('/dashboard', function () {
    $entries = Entry::all();
    $topics = Topic::all();
    $users = User::query()->where('id', '!=' , 0)->orWhereNull('id')->get();
    return view('dashboard',['entries' => $entries, 'topics' => $topics, 'users' => $users]);
});


Route::get('/topic/{id}', function () {
    return view('topic');
});
