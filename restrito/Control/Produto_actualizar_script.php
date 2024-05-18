<?php
include '../Conexao/connection.php';
include 'funcoes.php';
//declaramos uma variavel que recebe os valores vindo da tabela listagem para poder editar os dados do usuario
$idproduto=$_POST['id_produto'];
$idusuario=$_POST['idfuncionario'];
$nome=$_POST['nome'];
$categoria=$_POST['categoria'];
$descricao=$_POST['descricao'];

if (empty($_POST['nome']) && empty($_POST['categoria']) && empty($_POST['descricao'])) {
  # code...
  mensagem("$nome NÃO FOI ACTUALIZADO",'danger');
} else {
  # code...
  $sql="UPDATE `produto` SET 
  `nome`='$nome',`descricao`='$descricao',`categoria`='$categoria',`idf`='$idusuario' 
  WHERE `idp`='$idproduto'";
if (mysqli_query($conn, $sql)) {
  # code...
      mensagem("$nome Actualizado com sucesso!",'success');
     
}
header('Location: ../Listar_prod_form.php');
}
?>