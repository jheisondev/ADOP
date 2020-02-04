<?php

// REQUISICAO API DE GEOLOCALIZACAO
$endereco = $rua.','.$numero.','.$cidade.','.$uf.','.$cep;
$apiGeo = 'https://maps.googleapis.com/maps/api/geocode/xml?address='.$endereco.'&key=AIzaSyA0vIjSNtdHJqxX0Pn1QbXMw0ZQJaWQ8zs';

$xml = simplexml_load_file($linkApi); //carrega o arquivo XML e retornando um Array
foreach ($xml as $dados) {
    if ($xml->children() == "OK") {
        $teste = 1;
        if (true) {
            foreach($dados->children()->geometry->children()->location as $location){
                $lat = $location->lat;
                $lng = $location->lng;
                break;
            }
        }
    }
    
}