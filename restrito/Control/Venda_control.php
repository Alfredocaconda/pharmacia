<?php
include '../Conexao/connection.php';
include 'funcoes.php';

//declaramos uma variavel que recebe os valores vindo da tabela listagem para poder editar os dados do usuario
$id_entrada=$_POST['id_entrada'];
$nome=$_POST['nome'];
$id_produto=$_POST['id_produto'];
$id_usuario=$_POST['id_usuario'];
$preco=$_POST['preco'];
$quantidade=$_POST['quantidade'];
// Gerar o código da fatura automaticamente
$factura = date("YmdHis"); 
// Valor total da compra
$total= $quantidade* $preco;
// Adiciona a data no formato Ano/Mês/Dia
$data = date("Y/m/d/H:i:s");
 # code..
 $sql=" INSERT INTO `venda`(`qtdrequerida`, `totalCompra`,`datavenda`, `fatura`,`idp`, `idf`) 
 VALUES ('$quantidade','$total','$data','$factura','$id_produto','$id_usuario')"; 

$sql="UPDATE `entrada` SET `qtd`=`qtd`-'$quantidade' WHERE `ide`='$id_entrada'";

if (mysqli_query($conn, $sql)) {
  # code...
  mensagem("$nome Entrada do Medicamento com sucesso!",'success'); 
}
#header('Location: ../venda.php');
?>