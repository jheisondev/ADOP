<?php
    include_once '../conexao/DbConnect.php';

    // Cria um retorno padronizado para vc trabalhar no Ajax depois
    $retorno = array(
        'success'   => false,
        'msg'       => 'Cidade não encontrada!',
        'dados'     => null
    );

    $cidade = $_POST['cidade'];
   
    //var_dump($cidade);

    //Aqui o limit 1 já limita a apenas 1 retorno 
    $query = "SELECT nome_municipio,latitude,longitude FROM municipios WHERE nome_municipio='$cidade' LIMIT 1";

    $resultado_query = $conn->prepare($query);
    $resultado_query->execute();
    
    // Aqui o fetch reforça o retorno de apenas uma tupla
    $rows = $resultado_query->fetch(PDO::FETCH_OBJ);

    // a resposta caso houver
    if ($rows) {
        $retorno['success'] = true;
        $retorno['msg']     = 'Dados retornados com sucesso!';
        $retorno['dados']   = $rows;
    }

    // Aqui vc faz o retorno
    echo json_encode($retorno);