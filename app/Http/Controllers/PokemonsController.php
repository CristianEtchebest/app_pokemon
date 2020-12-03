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
        else:
            $resposne = $client->request('GET', 'pokemon');
        endif;
        return json_decode($resposne->getBody(), true);
    }
}
