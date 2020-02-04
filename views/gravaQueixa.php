<?php

    // INCLUINDO CONEXÃO
    include_once('../conexao/DbConnect.php');
    // INICIANDO SESSAO

/* ################################ PEGANDO PARAMETROS DO FORMULARIO ################################ */
    $nomePessoa = $_POST['nomePessoa'];
    $nomeCidade = $_POST['nomeCidade'];
    $nomeEstado = $_POST['nomeEstado'];
    $cep = $_POST['cep'];
    $nomebairro = $_POST['nomeBairro'];
    $nomeRua = $_POST['nomeRua'];
    $numero = $_POST['numero'];
    $tipoQueixa = $_POST['tipoQueixa'];
    $descricaoQueixa = $_POST['descricaoQueixa'];
    $lat = "";
    $lng = "";

/* ################################ Colocando variaveis na sessao ################################ */
    $_SESSION['cidade'] = $nomeCidade;
    $_SESSION['estado'] = $nomeEstado;
    $_SESSION['lat'] = $lat;
    $_SESSION['lng'] = $lng;

/* ################################ REQUISICAO API DE GEOLOCALIZACAO ################################ */

    $endereco = $nomeRua.','.$numero.','.$nomeCidade.','.$nomeEstado.','.$cep;
    $linkApi = 'https://maps.googleapis.com/maps/api/geocode/xml?address='.$endereco.'&key=AIzaSyA0vIjSNtdHJqxX0Pn1QbXMw0ZQJaWQ8zs';//link do arquivo xml
    
    $xml = simplexml_load_file($linkApi); //carrega o arquivo XML e retornando um Array
    foreach ($xml as $dados) {
        if ($xml->children() == "OK") {
            if (true) {
                foreach($dados->children()->geometry->children()->location as $location){
                    $lat = $location->lat;
                    $lng = $location->lng;
                    break;
                }
            }
        }else {
            header('location: index.php');
        }
        
    }
   
/* ########## GRAVAR TODOS DADOS NO BANCO MYSQL ########## */

    $sql = "INSERT INTO queixas(nomePessoa,
    nomeCidade,
    nomeEstado,
    cep,
    nomeBairro,
    nomeRua,
    numero,
    tipoQueixa,
    descricaoQueixa,
    lat,
    lng,
    dataQueixa) VALUES 
    ('$nomePessoa',
    '$nomeCidade',
    '$nomeEstado',
    '$cep',
    '$nomebairro',
    '$nomeRua',
    '$numero',
    '$tipoQueixa',
    '$descricaoQueixa',
    '$lat',
    '$lng',
    NOW())";
    try{

        $resultado_query = $conn->prepare($sql);
        $resultado_query->execute();
        header("Location: index.php?i=mapeamento");

    } catch(PDOException $e) {
        echo 'Erro :' .$e->getMessage();
    }
    
    
?>