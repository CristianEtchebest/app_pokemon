<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use GuzzleHttp\Client;
class PokemonsController extends Controller
{
    public function listar()
    {
        $client =  new Client(['base_uri' => env('BASE_URI'),'timeout' => 2.0]);
        $resposne = $client->request('GET');
        return json_decode($resposne->getBody(), true);
    }
}
