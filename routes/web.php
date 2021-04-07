<?php

use App\Http\Livewire\Auth;
use App\Http\Livewire\Home;
use App\Http\Livewire\Welcome;
use App\Http\Livewire\Generate;
use Illuminate\Support\Facades\Route;

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
Route::get('/', Welcome::class);
Route::get('/portfolio/{just_get?}', Home::class);
Route::get('/generate/{currentPhase?}', Generate::class);

Route::get('/download/css', function () {
    return response()->download(public_path("css/app.css"));
});

Route::get('/auth/clear/{get}', [Auth::class, 'clear']);

Route::get('/auth/redirect', [Auth::class, 'authRedirect']);

Route::get('/auth/callback', [Auth::class, 'callback']);