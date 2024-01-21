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

Route::get('users/{id}', function ($id) {
    //
})->where('id', '[0-9]+');


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

Route::get('members/{id}', 'MembersController@show')->name('members.show');

Route::get('members/{id}', [
    'as' => 'members.show',
    'uses' => 'MembersController@show',
]);

Route::middleware('auth:api', 'throttle:60,1')->group(function () {
    Route::get('/profile', function () {

    });
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        // Обрабатывает путь /dsahboard
    });
    Route::get('users', function () {
        // Обрабатывает путь /dsahboarb/users
    });
});

Route::any('{anything}', 'CatchAllController')->where('anything', '*');

Route::fallback(function () {
    //
});

Route::domain('api.myapp.com')->group(function () {
    Route::get('/', function () {
        //
    });
});

Route::domain('{account}.myapp.com')->group(function () {
    Route::get('/', function ($account) {
        //
    });
    Route::get('users/{id}', function ($account, $id) {
        //
    });
});

Route::name('users.')->prefix('users')->group(function () {
    Route::name('comments.')->prefix('comments')->group(function () {
        Route::get('{id}', function () {

        })->name('show');
    });
});

Route::get('invitations/{invotation}/{answer}', 'InvitationController')->name('invitations');

// Генерирование нормальной ссылки
URL::route('invitations', ['invitation' => 12345, 'answer' => 'yes']);

// Генерирование подписанной ссылки
URL::signedRoute('invitations', ['invitation' => 12345, 'answer' => 'yes']);

// Генерирование подписанной ссылки с ограниченным сроком действия (временной)
URL::temporaryRouteSignedRoute(
    'invitations',
    now()->addHours(4),
    ['invitation' => 12345, 'answer' => 'yes']
);
