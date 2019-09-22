<?php

use Illuminate\Http\Request;
use App\Http\Resources\Users as UserResource;
use App\User;

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

//Route::get('/news/sync','UsersController@sync')->name('sync');
Route::get('/user_sync', function (Request $request) {
    $secret_word = env('API_TOKEN_SECRET');
    $bearer_token = $request->bearerToken();
    if ($bearer_token == null or base64_encode($secret_word) != $bearer_token) abort('404');

    return UserResource::collection(User::paginate(100));
});

Route::get('/get_one_user', function () {
    return new UserResource(User::first());
});