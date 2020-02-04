<?php
    include_once '../conexao/DbConnect.php';
    $query = "SELECT nome_municipio FROM municipios";    
    $resultado_query = $conn->prepare($query);   
    $resultado_query->execute();
    echo json_encode($resultado_query->fetchAll(PDO::FETCH_ASSOC),JSON_UNESCAPED_UNICODE);
?>
