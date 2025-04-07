<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/Jouets', function(){
    $jouet = DB::table('jouets')->select('nom', 'prix')->where('id','=', 1)->get();
    return view('Jouets', ['jouet' => $jouet]);
});

Route::get('/panier', function(){
    return view('panier');

});