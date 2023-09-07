<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Home;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\User\Users;
use App\Http\Livewire\User\Create;
use App\Http\Livewire\User\Edit;
use App\Http\Livewire\User\MyFavorite;
use App\Http\Livewire\Book\Books;
use App\Http\Livewire\Book\CreateBook;
use App\Http\Livewire\Book\BookReadMore;
use App\Http\Livewire\Book\EditBook;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;

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






Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');


