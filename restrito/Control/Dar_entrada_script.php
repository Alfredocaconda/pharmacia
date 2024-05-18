<?php
include '../Conexao/connection.php';
include 'funcoes.php';
//declaramos uma variavel que recebe os valores vindo da tabela listagem para poder editar os dados do usuario


if (empty($_POST['descricao']) && empty($_POST['categoria']) && empty($_POST['nome'])) {
  # code...
  mensagem("não foi Possivel dar entrada do Medicamento",'danger');
} else {
  $id_produto=$_POST['idproduto'];
$quantidade=$_POST['quantidade'];
$preco=$_POST['preco'];
$data_entrada=$_POST['data'];
$caducidade=$_POST['caducidade'];
$funcionario=$_POST['id_admin'];
  # code..
  $sql="INSERT INTO `entrada`(`preco`, `qtd`, `dataentrada`, `caducidade`,
   `idp`, `idf`) VALUES ('$preco','$quantidade','$data_entrada'
  ,'$caducidade','$id_produto','$funcionario')";
// Adiciona os dados ao carrinho de compras na sessão
 // Recupera o caminho da imagem do banco de dados (substitua com sua lógica real)
$_SESSION['imagem']=$user['foto'];
if (mysqli_query($conn, $sql)) {
  # code...
      mensagem("$nome Entrada do Medicamento com sucesso!",'success');    
}
header('Location: ../Listar_prod_form.php');
}

?>