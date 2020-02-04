<?php
/*
Site: ADOP.TECH
Autor: Jheison Maciel Ines
*/

/* Carrega a pagina atual */
$pagina='home';

if(isset($_GET['i'])){

    $pagina = addslashes($_GET['i']);

}

/* Carrega o Cabeçalho */
include '../public_html/views/header.php';
'<body>';
/* Carrega a pagina escolhida pelo usuario */
switch ($pagina) {
    
    case 'home':
        include '../public_html/views/home.php';
        break;
    
    case 'mapeamento':
        include '../public_html/views/mapeamento.php';
        break;

    case 'sobre':
        include '../public_html/views/sobre.php';
        break;
    
    case 'contato':
        include '../public_html/views/contato.php';
        break;  
    
        
    default:
        include '../public_html/views/erro.php';
        break;
}
include '../public_html/views/botao-flutuante.php';
include '../public_html/views/botao-flutuante-site.php';
'</body';
/* Carrega o Cabeçalho */
include '../public_html/views//footer.php';

?>
