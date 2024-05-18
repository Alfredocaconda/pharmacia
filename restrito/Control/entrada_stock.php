<?php
include '../Conexao/connection.php';
include 'funcoes.php';
//declaramos uma variavel que recebe os valores vindo da tabela listagem para poder editar os dados do usuario


if (empty($_POST['DESCRICAO']) && empty($_POST['MEDICAMENTO'])) {
  # code...
  mensagem("Não foi Possivel dar entrada do Medicamento",'danger');
} else {
  $id_produto=$_POST['idproduto'];
$quantidade=$_POST['QUANTIDADE'];
$preco=$_POST['PRECO'];
$data_entrada=$_POST['DATA_ENTRADA'];
$caducidade=$_POST['CADUCIDADE'];
$funcionario=$_POST['id_admin'];
  # code..
  $sql="UPDATE `entrada` SET `preco`='$preco', `qtd`='$quantidade', `dataentrada`='$data_entrada',
   `caducidade`='$caducidade',`idf`='$funcionario' where `idp`='$id_produto'";
// Adiciona os dados ao carrinho de compras na sessão
 // Recupera o caminho da imagem do banco de dados (substitua com sua lógica real)
if (mysqli_query($conn, $sql)) {
  # code...
      mensagem("$nome Entrada do Medicamento com sucesso!",'success');    
}
header('Location: ../Listar_stock.php');
}

?>