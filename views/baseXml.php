<?php
  include_once '../conexao/DbConnect.php';  


  $query = "SELECT nomeCidade,nomeEstado,nomeBairro,nomeRua,numero,tipoQueixa,descricaoQueixa,
                    dataQueixa,lat,lng FROM queixas";

  $resultado_query = $conn->prepare($query);
  $resultado_query->execute();

  if (!$resultado_query) {
      echo("Select invalido!<br>");
  }

  // #### Usar funções DOM do PHP para emitir XML
  $dom = new DOMDocument("1.0", "UTF-8");
  $node = $dom->createElement("markers");
  $parnode = $dom->appendChild($node);

  header("Content-type: text/xml");

  // Iterate through the rows, adding XML nodes for each

  while($row = $resultado_query->fetch(PDO::FETCH_ASSOC)) {
     
    // Add to XML document node
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);

    $newnode->setAttribute("Cidade", $row['nomeCidade']);
    $newnode->setAttribute("Estado", $row['nomeEstado']);
    $newnode->setAttribute("Bairro", $row['nomeBairro']);
    $newnode->setAttribute("Rua", $row['nomeRua']);
    $newnode->setAttribute("Numero", $row['numero']);
    $newnode->setAttribute("Tipo", $row['tipoQueixa']);
    $newnode->setAttribute("Descricao", $row['descricaoQueixa']);
    $newnode->setAttribute("Data", $row['dataQueixa']);
    $newnode->setAttribute("lat", $row['lat']);
    $newnode->setAttribute("lng", $row['lng']);
    
  }
  //
  
  echo $dom->saveXML();
  //$dom->save("./base.xml");

?>