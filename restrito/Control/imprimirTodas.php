<?php
// Inclua a classe FPDF
//require('../Conexao/connection.php');
require('../factura/fpdf.php');
// Função para conectar ao banco de dados e recuperar os dados
function getDadosFromDatabase(){
    $servidor="localhost";
$db="farmacia_lobito";
$usuario="root";
$senha="";
 
#variavel que recebe os valores para saber se a base de dados existe
$conn = new mysqli($servidor,$usuario,$senha,$db);
    $pesquisar=$_POST['nome'];
    $datae=$_POST['datae'];
    $datapara=$_POST['datapara'];
    // Consulta SQL para selecionar os dados da tabela
    $sql = "SELECT `nome`,`datavenda`, `quantidade`,`totalcompra`,`nomef` from `Vvenda` where
    (datavenda>='$datae' and datavenda<='$datapara') and
    (`nome`='$pesquisar' or `nomef`='$pesquisar')";
    if ($datae=="" || $datapara=="") {
        $sql = "SELECT `nome`,`datavenda`,
                sum(`quantidade`) as `quantidade`, sum(`totalcompra`) as `totalcompra`,
             `nomef` from `Vvenda` where (`nome`='$pesquisar' or `nomef`='$pesquisar') GROUP BY `nome`,`categoria`";
    }
   
    $result = $conn->query($sql);
    // Array para armazenar os dados recuperados do banco de dados
    $dados = array();

    // Verifique se há resultados e armazene-os no array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $dados[] = $row;
        }
    }

    // Feche a conexão com o banco de dados
    $conn->close();

    // Retorne os dados recuperados
    return $dados;
}

// Função para gerar o PDF com os dados recuperados
function gerarPDF($dados) {
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
$dat=date("Y/m/d/H:i:s");
$pdf->Ln();
$pdf->Cell(160,-20,  'Data do Relatorio :' .$dat, 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(-10, 100, '', 0, 0, 'C');
$pdf->Cell(40, 40, 'Produto', 0, 0, 'C');
$pdf->Cell(30, 40, 'Data', 0, 0, 'C');
$pdf->Cell(20, 40, 'Quantidade', 0, 0, 'C');
$pdf->Cell(30, 40, 'Total', 0, 0, 'C');
$pdf->Cell(50, 40, 'Funcionario', 0, 0, 'C');
$pdf->Ln();
    

    // Percorra os dados e adicione-os ao PDF
    foreach ($dados as $row) {
        // Imprima cada valor em uma nova linha
        foreach ($row as $value) {
            $pdf->Cell(30, 10, $value, 0); // 40 de largura e 10 de altura
        }
        $pdf->Ln(); // Nova linha após cada linha de dados
    }

    // Saída do documento
    $pdf->Output();
}

// Obtém os dados do banco de dados
$dados = getDadosFromDatabase();

// Gera o PDF com os dados obtidos
gerarPDF($dados);
?>
