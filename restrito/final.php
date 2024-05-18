<?php
session_start();
include '../protecao.php';
$id_admin = $_SESSION['idfuncionario'];

// Verifica se o formulário foi submetido
require('factura/fpdf.php');
// Recupera os valores enviados pela página de recuperação
if(isset($_GET['valores'])) {
    
    $valores = array($_GET['valores']);

    // Crie um novo objeto FPDF
    $pdf = new FPDF();

    // Adicione uma página
    $pdf->AddPage();
    // Defina a fonte e o tamanho do texto
    $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Farmacia Luz&Vida', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Nif: 00000000BA000', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Bairro: Alto Chimbuila ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Benguela/Catumbela  ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Contacto: 931258764/928897850', 0, 1, 'C');
        $pdf->Cell(0, 10, 'E-mail: severinosangundja08@gmail.com', 0, 1, 'C');
        $pdf->Ln();
        //apresentar informacoes
       foreach ($_SESSION['valores'] as $key ) {
        # code...
       }
        $pdf->Ln();
        $pdf->Cell(60, -20, 'Factura n : ' .$key['factura'], 0, 0, 'C');
        $pdf->Cell(10, 0, '', 0, 0, 'C');
        $pdf->Cell(160,-20,  'Data da Venda :' .$key['data'], 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(-10, 100, '', 0, 0, 'C');
        $pdf->Cell(40, 40, 'Produto', 0, 0, 'C');
        $pdf->Cell(30, 40, 'Preco KZ', 0, 0, 'C');
        $pdf->Cell(40, 40, 'Quantidade', 0, 0, 'C');
        $pdf->Cell(30, 40, 'Subtotal', 0, 0, 'C');
        $pdf->Ln();

$qtd_anterior=0;
$qtd_atual=0;
$conexao=new PDO('mysql:host=localhost;dbname=farmacia_lobito',"root","");
foreach ($_SESSION['valores'] as $binji) {
    # code.$res
    $sub=$binji['Total'];
   $caconda=$binji['Valor_pago'];
   if($sub>$caconda){
header('Location: carrinho.php');
   }else{
    // Percorra os valores e adicione-os ao PDF
foreach ($_SESSION['valores'] as $produto) {
    # code...
    
    $insert=$conexao->prepare("INSERT INTO `venda` () VALUES (NULL,?,?,?,?,?,?)");
    $insert->bindParam(1,$produto['idproduto']);
    $insert->bindParam(2,$produto['Quantidade']);
    $insert->bindParam(3,$produto['Total']);
    $insert->bindParam(4,$produto['data']);
    $insert->bindParam(5,$produto['factura']);
    $insert->bindParam(6,$produto['idfuncionario']);
    $insert->execute();
    $idp=$produto['idproduto'];
    $qtd=$produto['Quantidade'];
    $sql=$conexao->prepare("SELECT * FROM `entrada` Where `idp`='$idp'");
    $sql->execute();
    $dados=$sql->fetchAll();
    foreach ($dados as $produtos) {
            $qtd_anterior=$produtos['qtd'];
            }
    $qtd_atual=$qtd_anterior-$qtd;
    $mysql=$conexao->prepare("UPDATE `entrada` SET `qtd`='.$qtd_atual.' WHERE `idp`='$idp'");
    $mysql->execute();
        # code...
        $pdf->Cell(-2,0,' ', 0);
        $pdf->Cell(35, 10, $produto['NOME'], 1); // Nome do produto
        $pdf->Cell(35, 10, $produto['PRECO'], 1); // Preço do produto
        $pdf->Cell(35, 10, $produto['Quantidade'], 1); // Preço do produto
        $pdf->Cell(35, 10, $produto['subtotal'], 1); // Preço do produto
        $pdf->Ln();
}   

$pdf->Ln();
$pdf->Cell(35,10,'=========================================================================', 0);
$pdf->Ln();
$pdf->Cell(35,10,'Total da Compra: '.number_format($produto['Total'],2,",",".").' KZ', 0);
$pdf->Ln();
$pdf->Cell(35,10,'Valor Pago : '. number_format($produto['Valor_pago'],2,",",".").' KZ', 0);
$pdf->Ln();
$pdf->Cell(35,10,'Troco : '. number_format($produto['troco'],2,",",".").' KZ', 0);
$pdf->Ln();
$pdf->Cell(0,10,'Software Processado pela : EMSST', 0, 1, 'C');
$pdf->Ln();
$pdf->Cell(0,10,'Obrigado e volte sempre', 0, 1, 'C');
$pdf->Ln();
$pdf->Cell(0,0,'Funcionario : '.$_SESSION['nome'], 0, 1, 'C');
$pdf->Ln(); 
}
}
    // Saída do documento
   $pdf->Output();
} else {
    echo "Erro: Nenhum valor recebido.";
}
?>