<?php

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
use GuzzleHttp\Client;
Route::get('/', function () {

    $pokemonBase = new Client([
        'base_uri' => 'https://pokeapi.co/api/v2/pokemon/',
        'timeout' => 2.0,
    ]);

    // Armazena o request no formato GET e com o parâmetro uri 1
    $pokemonList = $pokemonBase->request('GET', '1');

    //Retorna os dados em formato json
    return json_decode($pokemonList->getBody(), true);

    return view('welcome');
});
