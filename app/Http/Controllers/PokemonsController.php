<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use mysql_xdevapi\Result;


class PokemonsController extends Controller
{
    public function pkList($id=null)
    {
        $client =  new Client(['base_uri' => env('BASE_URI'),'timeout' => 2.0]);
        if($id):
            $resposne = $client->request('GET', 'pokemon/'.$id);
            return json_decode($resposne->getBody(), true);
        endif;
        $resposne = $client->request('GET', 'pokemon');
        return json_decode($resposne->getBody(), true);
    }
}
