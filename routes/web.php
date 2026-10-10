<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});
// registerへのGETリクエストでcreateメソッドを呼び出します。name()で名前付きルートにします。
Route::get('/register', [UserController::class, 'create'])->name('register.create');
//→ /registerへのPOSTリクエストでstoreメソッドを呼び出します。フォーム送信時にこのルートが使われます。
Route::post('/register', [UserController::class, 'store'])->name('register.store');

