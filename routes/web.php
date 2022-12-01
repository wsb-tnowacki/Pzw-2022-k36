<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\KontrolerStart;
use App\Http\Controllers\PostController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('/kontakt', function () {
    return view('kontakt');
});

Route::get('/kontakt/{id}/news/{tekst}', function ($id, $tekst) {
    //return "Id $id, tekst: $tekst";
    return view('test.kontakt',['id' => $id, 'tekst' => $tekst]);
});


Route::get('/onas', function () {
    $zadania = [
        'Zadanie 1',
        'Zadanie 2',
        'Zadanie 3'
    ];
    return view('onas', ['zadania'=> $zadania]);
});
 */

/* Route::get('/',[KontrolerStart::class, 'start']);
Route::get('/kontakt',[KontrolerStart::class, 'kontakt']);
Route::get('/kontakt/{id}/test/{tekst}',[KontrolerStart::class, 'kontakt_dane']);
Route::get('/onas',[KontrolerStart::class, 'onas']); */

Route::controller(KontrolerStart::class)->group(function(){
    Route::get('/','start')->name('start');
    Route::get('/kontakt','kontakt')->name('kontakt');
    Route::get('/kontakt/{id}/test/{tekst}','kontakt_dane')->name('kontakt_dane');
    Route::get('/onas','onas')->name('onas');
});

/* Route::get('/posty', function () {
    return view('posty.index');
});

Route::get('/posty/dodaj', function () {
    return view('posty.dodaj');
}); */

Route::resource('posty', PostController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
