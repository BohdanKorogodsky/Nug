<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return 'Hello, World!';
});

Route::get('users/{id}/friends', function ($id) {
    //
});

Route::get('users/{id?}', function ($id = 'fallbackId') {
    //
});



Route::get('/', 'WelcomeController@index');

Route::post('/', function () {
    // обслуживаем кого-то, отправившего запрос POST на этот маршрут
});

Route::put('/', function () {
    // обслуживаем кого-то, отправившего запрос PUT на этот маршрут
});

Route::delete('/', function () {
    // Обслуживаем кого-то, отправившего запрос DELETE на этот маршрут
});

Route::any('/', function () {
    // Обслуживаем запрос любой команды по этому маршруту
});

Route::match(['get', 'post'], '/', function () {
    // Обслуживаем запросы GET или POST по этому маршруту
});

