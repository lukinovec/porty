<?php

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\WelcomeController;
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
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/portfolio', [HomeController::class, 'show']);
Route::get('/download/css', function () {
    return response()->download(public_path("css/app.css"));
});
// Route::get('/download', function () {
//     $zip = new ZipArchive;
//     $zip->open('portfolio.zip', ZipArchive::CREATE);
//     foreach (['index.html', 'app.css'] as $file) {
//       $zip->addFile($file);
//     }
//     $zip->close();
//     return response()->download(public_path("css/app.css"));
// });

Route::get('/auth/redirect', function () {
    if(request()->cookie("github_user")) {
        return redirect('/portfolio')->with('github_user', unserialize(request()->cookie("github_user")));
    }
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    Cookie::queue(Cookie::make('github_user', serialize($user), 10));
    return redirect('/portfolio')->with('github_user', $user);
});