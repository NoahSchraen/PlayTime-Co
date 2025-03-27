<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test;

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
    return view('welcome');
});

Route::get('/Jouets', function(){
    $jouet = DB::table('jouets')->where('id','=', 1) ->get('nom', 'id') ;
    //récupération du jouet numéro 1 dans la table jouets
    return view('Jouets', ['jouet' => $jouet]);
});