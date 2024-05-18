<?php
include '../Conexao/connection.php';
include 'funcoes.php';
//declaramos uma variavel que recebe os valores vindo da tabela listagem para poder editar os dados do usuario
$id_admin=$_POST['id_admin'];
$idproduto=$_POST['idproduto'];
$quantidade=$_POST['QUANTIDADE'];
$nome=$_POST['MEDICAMENTO'];

if (empty($_POST['QUANTIDADE'])) {
  # code...
  mensagem( $nome." NÃO FOI ACTUALIZADO",'danger');
} else {
  # code...
  $sql="UPDATE `entrada` SET `qtd`=`qtd`+'$quantidade', `idf`='$id_admin' WHERE ide=$idproduto";
if (mysqli_query($conn, $sql)) {
  # code...
      mensagem($nome."Actualizado com sucesso!",'success');
     
}
header("location: ../Listar_stock.php");
}
?>