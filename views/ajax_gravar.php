
<?php
    require_once "../conexao/DbConnect.php";

    // Recebe dados vindos do formulario e encaminhar ao banco de dados
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $uf = $_POST['uf'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];

    // Buscar Geolocalização
    // REQUISICAO API DE GEOLOCALIZACAO
    
    $key = "&key=AIzaSyA0vIjSNtdHJqxX0Pn1QbXMw0ZQJaWQ8zs";
    $address = $rua.','.$numero.','.$bairro.','.$cidade.'-'.$uf.',Brasil';
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$address.$key;
    $url = str_replace(" ", "-", $url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    $response = curl_exec($ch);
    curl_close($ch);

    $obj = json_decode($response);
    
    if ($obj->status <> 'OK') {

        $retorno = 12;
        
    } else {
        
        $lat = $obj->results[0]->geometry->location->lat;
        $lng = $obj->results[0]->geometry->location->lng;
    
        // GRAVAR TODOS DADOS NO BANCO MYSQL

        $sql = "INSERT INTO queixas(nomePessoa,nomeCidade,nomeEstado,cep,nomeBairro,nomeRua,numero,tipoQueixa,descricaoQueixa,lat,lng,dataQueixa)
        VALUES ('$nome','$cidade','$uf','$cep','$bairro','$rua','$numero','$tipo','$descricao','$lat','$lng',
        NOW())";

        try{
            $resultado_query = $conn->prepare($sql);
            $resultado_query->execute();  
            $retorno = 10;   
        } catch(PDOException $e) {
            $retorno = 14;
            //Cod de erro ao gravar informações no banco
            //echo 'Erro :' .$e->getMessage();
        }
    }
    echo $retorno;

?>