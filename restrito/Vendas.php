<?php 
include '../protecao.php';
$id_admin = $_SESSION['idfuncionario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmácia Luz & vida</title>
 <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/estilo.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="menus">
  <h3 class="cor">Farmacia Luz&Vida</h3>    
</div>
    <!-- Content Header (Page header) -->
    <nav >
                    <div class="direita">
                        <img src="dist/img/user2-160x160.jpg" class="profile-photo" alt="User Image">
                        <p><?php  echo $_SESSION['nome'] ?></p>
                        <a href="../index.php">
                          <label class="btn btn-success" id="sair" for="create-post">
                            SAIR</label>
                          </a>                   
                        <a href="Control/fechoDiario.php">
                          <label class="btn btn-success" id="sair" for="create-post">
                            FECHO DIARIO</label>
                          </a> 
                  </div>
                  <div class="formulario">
                    <form  action="venda.php" method="POST" role="search">
              <input type="text"   name="buscar" placeholder="Medicamento"  autofocus>
                        <button class="btn btn-success">PESQUISAR</button>                      
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
                                          <th scope="col">Quantidade</th>
                                          <th scope="col">Preço</th>
                                          <th scope="col">Opcções</th>
                                        </tr>
                        </tr>
                    </theard>
                    <tbody> 
                    <?php
                    # pesquisando pelo usuario...
      $pesquisar=$_POST['buscar'] ?? '';
$conexao=new PDO('mysql:host=localhost;dbname=farmacia_lobito',"root","");
$sql=$conexao->prepare("SELECT * FROM `ventrada`  WHERE `QUANTIDADE`>0 and MEDICAMENTO  LIKE '%$pesquisar%'");
$sql->execute();
$dados=$sql->fetchAll();
foreach ($dados as $produtos) {
    # code...
  echo' <tr>
 
          <th>'.$produtos['MEDICAMENTO'].'</th>
          <th>'.$produtos['DESCRICAO'].'</th>
          <th>'.$produtos['CATEGORIA'].'</th>
          <th >'.$produtos['QUANTIDADE'].'</th>
          <th >'.number_format($produtos['PRECO'],2,",",".") .'</th>
          <th>
          <form action="carrinho.php?add=carrinho&id='.$produtos['CODIGO_ENTRADA'].'" method="post">
          <input type="number" name="qtd" placeholder="QTD REQUERIDA ">
          <button class="btn btn-primary">adicionar no carrinho</button>
          </form>
          </th>
        </tr>';             
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
