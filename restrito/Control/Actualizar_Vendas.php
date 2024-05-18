<?php
include '../Conexao/connection.php';
include 'funcoes.php';
//declaramos uma variavel que recebe os valores vindo da tabela listagem para poder editar os dados do usuario
$idusuario=$_POST['idvenda'];
$nome=$_POST['nome'];
$genero=$_POST['genero'];
$telefone=$_POST['telefone'];
$data_nascimento=$_POST['data_nascimento'];
$morada=$_POST['endereco'];
$funcao=$_POST['cargo'];
$senha=$_POST['senha'];
$foto=$_POST['foto'];

if (empty($_POST['nome']) && empty($_POST['genero']) && empty($_POST['telefone']) 
&& empty($_POST['data_nascimento']) && empty($_POST['endereco'])
&& empty($_POST['cargo']) && empty($_POST['senha'])) {
  # code...
  mensagem("$nome NÃO FOI ACTUALIZADO",'danger');
} else {
  # code...
  $sql="UPDATE `funcionario` SET `nome`='$nome',`genero`='$genero',`telefone`='$telefone',
`data_nascimento`='$data_nascimento',`endereco`='$morada', `cargo`='$funcao',
`foto`='$foto',`senha`='$senha' WHERE idf=$idusuario";
if (mysqli_query($conn, $sql)) {
  # code...
      mensagem("$nome Actualizado com sucesso!",'success');
     
}
header('Location: ../Listar_form.php');
}
?>