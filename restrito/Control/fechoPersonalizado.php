<?php
session_start();
include '../../protecao.php';
$id_admin = $_SESSION['idfuncionario'];
// Conexão com o banco de dados (substitua os valores conforme necessário)
try {
    $pdo = new PDO('mysql:host=localhost;dbname=farmacia_lobito',"root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
// Data atual
$data_atual = date("Y-m-d");
$factura = date("YmdHis");
require('../factura/fpdf.php');
    // Crie um novo objeto FPDF
    $pdf = new FPDF();

    // Adicione uma página
    $pdf->AddPage();
try {
    // Consulta para selecionar vendas feitas durante o dia atual
    $sql = "SELECT * FROM vvenda WHERE DATE(datavenda) = :data";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('data',$data_atual);
    $stmt->execute();
    
    // Verifica se há vendas
    if ($stmt->rowCount() > 0) {
        $conta=0;
        // Exibe as vendas
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
    $pdf->Cell(35,0,'============================FECHO DIARIO=================================', 0);
    $pdf->Ln();
$pdf->Cell(60, -20, 'Factura n : ' .$factura, 0, 0, 'C');
$pdf->Cell(10, 0, '', 0, 0, 'C');
$pdf->Cell(160,-20,  'Data da Venda :' .$data_atual, 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(-10, 100, '', 0, 0, 'C');
$pdf->Cell(40, 50, 'Produto', 0, 0, 'C');
$pdf->Cell(30, 50, 'Preco', 0, 0, 'C');
$pdf->Cell(40, 50, 'Quantidade', 0, 0, 'C');
$pdf->Cell(30, 50, 'Total da Venda', 0, 0, 'C');
$pdf->Cell(40, 50, 'Funcionario', 0, 0, 'C');
$pdf->Ln();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pdf->Cell(-5,0,' ', 0);   
            $pdf->Cell(35, 10, $row['nome'], 0); // Nome do produto
            $pdf->Cell(35, 10, $row['preco'].' KZ', 0); // Preço do row
            $pdf->Cell(35, 10, $row['quantidade'], 0); // Preço do row
            $pdf->Cell(35, 10, $row['totalcompra'].' KZ', 0); // Preço do produto
            $pdf->Cell(35, 10, $row['nomef'], 0); // Preço do produto
            $pdf->Ln();
            $valortotal=$row['totalcompra'];
            $conta +=$valortotal;

        }
        $pdf->Cell(35, 10, 'Valor total da venda : '.$conta.' kz', 0); // Preço do produto
        $pdf->Ln();
        $pdf->Cell(35,10,'=========================================================================', 0);
        $pdf->Ln();
        $pdf->Cell(0,10,'Software Processado pela : EMSST', 0, 1, 'C');
        $pdf->Ln();
        $pdf->Cell(0,10,'Obrigado e volte sempre', 0, 1, 'C');
        $pdf->Ln();
         // Saída do documento
         $pdf->Output();
        }else{
            echo "<script>alert('Nenhuma venda feita');</script>";
        }
}
 catch (PDOException $e) {
    die("Erro na consulta: " . $e->getMessage());
}
?>
