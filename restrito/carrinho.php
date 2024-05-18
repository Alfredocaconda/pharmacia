<?php 
include '../protecao.php';
$id_admin = $_SESSION['idfuncionario'];
$valor=0;
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verifica se o campo "nome" está preenchido
  if (!empty($_POST["dinheiro"])) {
    // Obtém o valor do campo "nome" e o exibe
    $valor = $_POST["dinheiro"];
    echo "dinheiro: " . $valor;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmácia Luz & vida</title>
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/estilo.css">
  <style>
    #finalizar:hover{
  background-color: green;
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <a href="venda.php">Ponto de venda</a>
  <!-- Content Wrapper. Contains page content -->
  <div class="menus">
  <h1 class="cor">Venda de Medicamento</h1>

   <!-- Content Header (Page header) -->
   <nav >
      <div class="direita">
          <img src="dist/img/user2-160x160.jpg" class="profile-photo" alt="User Image">
          <p><?php  echo $_SESSION['nome'] ?></p>                  
    </div>
   <div class="formulario">
   <form method="post" action="">
     <input type="number" name="dinheiro" placeholder="VALOR PAGO">
     <button id="finalizar" class="btn btn-primary" onclick="openNewTab()" type="submit">Finalizar pedido</button>
     <button id="finalizar" class="btn btn-primary" onclick="performa()" type="submit">Factura Performe</button>
   </form>  
   <div>  
 </nav>
    <div class="barra"> 
    </div> 
    <div class="container">
        <!--LINHA-->
  <div class="row">
  <!--coluna-->
  <div class="col"> 
    <table class="table table-hover">
      <theard>
        <tr>
         <th scope="col">Nome</th>
         <th scope="col">Descrição</th>
         <th scope="col">Categoria</th>
         <th scope="col">PREÇO</th>
         <th scope="col">Quantidade</th>
         </tr>
      </tr>
    </theard>
  <tbody> 
<?php
      # chamando a conexao e a funcao...
      $data_actual = date("Y/m/d");
      $factura = date("YmdHis");
    
      # code...                     
      if (!isset($_SESSION['itens'])) {
          # caso entra na pagina sem querer ira receber um array...
          $_SESSION['itens']=array();
      }
      
      #condicao para saber os valores que foi adicionado no carrinho
      if (isset($_GET['add'] )&& $_GET['add']=='carrinho') {
          # ADICIONA AO CARRINHO
          $idproduto=$_GET['id'];
          $qtd=$_POST['qtd'];
          $qtd=0; if (empty($_POST['qtd'])) {
          # code...
          header('Location: venda.php');
          } else {
          if (!isset($_SESSION['itens'][$idproduto])) {
              # code...
              $qtd=$_POST['qtd'];
              $_SESSION['itens'][$idproduto]=$qtd;
          } else {
              # code...
              $qtd=$_POST['qtd'];
              $_SESSION['itens'][$idproduto] +=$qtd;
          }
        }
      }
      #exibi o carrinho
      if (count($_SESSION['itens'])==0) {
      # code...
      echo "CARRINHO VAZIO <a href=venda.php>ADICIONAR ITENS</a>";
      } else{                       
      $_SESSION['valores']=array();
      # esta condicao ira ler tudo que esta na sessao itens
      $subtotal=0;
      $total=0;                       
      foreach ($_SESSION['itens'] as $idproduto => $quantidade) {
      # code...
      $conexao=new PDO('mysql:host=localhost;dbname=farmacia_lobito',"root","");
      $sql=$conexao->prepare("SELECT * FROM `ventrada` WHERE `CODIGO_ENTRADA`=?");
      $sql->bindParam(1,$idproduto);
      $sql->execute();
      $dados=$sql->fetchAll();                          
      $subtotal = $quantidade * $dados[0]["PRECO"];
      $total +=$subtotal;
      $troco=$valor-$total;                                
      echo' <tr>
          <th>'.$dados[0]["MEDICAMENTO"].'</th>
          <th>'.$dados[0]["DESCRICAO"].'</th>
          <th>'.$dados[0]['CATEGORIA'].'</th>
          <th >'. number_format($dados[0]["PRECO"],2,",",".").'</th>
          <th>'.$quantidade.'</th>
          <th>
          <a href="remover.php?remover=carrinho&id='.$idproduto.'" class="btn btn-danger">REMOVER</a>
          </th>
          </th>
    </tr>';   
  array_push(
        $_SESSION['valores'],
         array(
           'idproduto'=>$idproduto,
           'NOME'=>$dados[0]['MEDICAMENTO'],
           'PRECO'=>$dados[0]["PRECO"],
           'descricao'=>$dados[0]["DESCRICAO"],
           'categoria'=>$dados[0]["CATEGORIA"],
           'Quantidade'=>$quantidade,
           'subtotal'=>$subtotal,
           'Total'=>$total,
           'Valor_pago'=>$valor,
           'troco'=>$troco,
           'data'=>$data_actual,
           'factura'=>$factura,
           'idfuncionario'=>$id_admin
           )
           // Isso remove todos os elementos do array
            // Remove o elemento com índice 0
          );                                 
          //unset($VALORE[]);  
        }                           
  
 echo "<button class='btn btn-primary'>Valor total da compra : ". number_format($total,2,",",".")." kz</button>";
                                              
?>
<script>
function openNewTab() {
    // Abrir um novo guia (ou aba) usando JavaScript
    var newTab = window.open('', '_blank');
    // Carregar uma página específica no novo guia
    newTab.location.href = 'final.php?valores=".urlencode(serialize["valores"])';
}

function performa() {
    // Abrir um novo guia (ou aba) usando JavaScript
    var newTab = window.open('', '_blank');
    // Carregar uma página específica no novo guia
    newTab.location.href = 'Performe.php?valores=".urlencode(serialize["valores"])';
}
</script>
   <?php 
   }   
?>
           </tbody>
          </table>
        </div>
        </div>
    </div> 
 </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Farmácia Luz&Vida</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>