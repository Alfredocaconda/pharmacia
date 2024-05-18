<?php
if (!isset($_SESSION)) {
    # code...
    session_start();
} 
if(!isset($_SESSION['idfuncionario'])){
die(" VOCE NAO PODE ACESSAR ESTA PAGINA! <p><a href=\"../index.php\">ENTRAR <a><p>");
}
?>