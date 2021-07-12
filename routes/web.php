<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get("accesso","AccessoController@index")->name('accesso');
Route::post("accesso","AccessoController@controlloAccesso");
Route::get("abbandona_pagina", "AccessoController@abbandona")->name('abbandona_pagina');


Route::get('registrati', "RegistratiController@index")->name('registrati');
Route::post('registrati',"RegistratiController@create");
Route::get('registrati/email/{query}',"RegistratiController@controlloEmail");
Route::get('registrati/id/{query}', "RegistratiController@verificaUtente");

Route::get('homepage', "HomepageController@index")->name('homepage');
Route::get('homepage/carica',"HomepageController@carica");
Route::get('homepage/caricaSeguiti/{id}',"HomepageController@carica_seguiti");
Route::get('homepage/rimuoviSeguiti/{id}',"HomepageController@rimuovi_seguiti");

Route::get('ristoranti',"RestaurantController@index")->name('ristoranti');
Route::get('ristoranti/carica',"RestaurantController@carica");
Route::post('ristoranti',"RestaurantController@submit");

Route::get('recensioni',"ReviewController@index")->name('recensioni');
Route::get('esci',"ReviewController@esci")->name('esci');
Route::post('recensioni/caricaRecensione',"ReviewController@caricaRecensioni");
Route::get('recensioni/ricarica',"ReviewController@ricarica");
Route::get('recensioni/aggiungi_like/{id}',"ReviewController@aggiungi");
Route::get('recensioni/rimuovi_like/{id}',"ReviewController@rimuovi");
Route::get('recensioni/aggiungi_commento/{id}/{commento}',"ReviewController@aggiungi_commento");


Route::get('ricette',"RecipeController@index")->name('ricette');
Route::get('ricette/cerca/{type}/{query?}',"RecipeController@cerca")->name('ricette.cerca');



