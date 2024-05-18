?>
<?php
$servidor="localhost";
$db="farmacia_lobito";
$usuario="root";
$senha="";
#variavel que recebe os valores para saber se a base de dados existe
$conn = new mysqli($servidor,$usuario,$senha,$db);
#condicao para saber se a conexao existe
if ($conn->error) {
    # code...
    die ('Falha ao conectar ao Banco de dados' .$conn->error);
} 