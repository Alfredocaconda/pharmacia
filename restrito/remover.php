<?php
session_start();

if (isset($_GET['remover']) && $_GET['remover']=="carrinho") {
    # code... 
    $idproduto=$_GET['id'];
    unset($_SESSION['itens'][$idproduto]);
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=carrinho.php"/>';
} 
?>