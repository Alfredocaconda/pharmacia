<?php 
include '../protecao.php';
#recuperar o id do funcionario
 # pesquisando pelo usuario...
 $pesquisar=$_POST['buscar'] ?? '';
 # chamando a conexao e a funcao...
include 'Conexao/connection.php';
include 'Control/funcoes.php';
//pegar os dados apartir do banco de dados
$sql="SELECT * FROM `ventrada`  WHERE MEDICAMENTO  LIKE '%$pesquisar%'";
//executar a query que ira ser declarado uma variavel que ira receber a conexao e os dados do banco de dados
//esta variavel ira receber todos os objectos do banco de dados
$dados=mysqli_query($conn,$sql); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmácia Luz & vida</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Contacto.php" class="nav-link">Contacto</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
       <a href="../logaut.php" class="btn btn-danger">Sair</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Farmácia Luz&Vida</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php  echo $_SESSION['nome'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Funcionário
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Funcionario_form.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Listar_form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Produto
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Produto_form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Listar_prod_form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Listar_stock.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar o Stock</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Relatório
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="relatorio_diario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diário</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="relatorio_personalizado.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personalizado</p>
                </a>
              </li>
             
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="venda.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Vender
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listar os Medicamantos no Stock</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <!--LINHA-->
        <div class="row">
            <!--coluna-->
            <div class="col"> 
                <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" action="Listar_prod_form.php" method="POST" role="search">
                        <input class="form-control me-2" type="search" name="buscar" placeholder="Nome do Medicamento" aria-label="Search" autofocus>
                         <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </form>
                </div>
                 </nav>
                <table class="table table-hover">
                    <theard>
                        <tr>
                            <th scope="col">Medicamanto</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Data de Entrada</th>
                            <th scope="col">Data de Caducidade</th>
                            <th scope="col">Funcionário</th>
                            <th scope="col">Configurações</th>
                        </tr>
                    </theard>
                    <tbody>
                    <?php
                    //condicao para pegar todos os valores e mostrar na tabela
                    //condicao para percorrer o vector
                    while ($linha=mysqli_fetch_assoc($dados)) {
                        $CODIGO_ENTRADA=$linha['CODIGO_ENTRADA'];
                        $idproduto=$linha['CODIGO_PRODUTO'];
                        $MEDICAMENTO=$linha['MEDICAMENTO'];
                        $DESCRICAO=$linha['DESCRICAO'];
                        $CATEGORIA=$linha['CATEGORIA'];
                        $PRECO=$linha['PRECO'];
                        $QUANTIDADE=$linha['QUANTIDADE'];
                        $DATA_ENTRADA=$linha['DATA_ENTRADA'];
                        $CADUCIDADE=$linha['CADUCIDADE'];
                        $NOME_FUNCIONARIO=$linha['NOME_FUNCIONARIO'];
                        
                        echo " <tr>
                        <th>$MEDICAMENTO/$DESCRICAO/$CATEGORIA</th>
                        <th >$QUANTIDADE</th>
                        <th >$PRECO</th>
                        <th >$DATA_ENTRADA</th>
                        <th >$CADUCIDADE</th>
                        <th >$NOME_FUNCIONARIO</th>
                        <th width=150px>
                        <a href='Stock.php?idproduto=$idproduto'
                        class='btn btn-success btn-sm'>EDITAR</a>
                        <a href='actualizarStock.php?idproduto=$CODIGO_ENTRADA' 
                        class='btn btn-primary btn-sm'>AUMENTAR QTD</a>
                        </tr>
                        </tr>";
                     }
                     // onclick="pegar_dados('$idusuario','$nome')"; o secredo esta aqui
                     ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 <!-- Modal -->
 <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação para Apagar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Control/Produto_Apagar.php" method="post">
        <p>Deseja realmente apagar <b id="nome_pessoa">Nome da pessoa</b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
        <input type="hidden" name="nome" id="nome_pessoa_1" value="">
       <input type="hidden" name="idusuario" id="idusuario" value="">
        <input type="submit" class="btn btn-danger" value="Sim">
        </form>
      </div>
    </div>
  </div>
</div>
 <!-- Modal para dar entrada do produto -->
 <div class="modal fade" id="entrada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação para Dar entrada do Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Control/Dar_entrada.php" method="post">
        <p>Deseja realmente dar entrada <b id="nome_produto">Nome da pessoa</b>?</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
        <input type="hidden" name="nome" id="nome_pessoa_1" value="">
       <input type="hidden" name="idusuario" id="idusuario" value="">
        <input type="submit" class="btn btn-danger" value="Sim">
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- /.content -->
    <!--- java script---->
<script type="text/javascript">
function pegar_dados(idusuario,nome){
  //pegar o nome da pessoa
  document.getElementById('nome_pessoa').innerHTML=nome;
  document.getElementById('nome_pessoa_1').value=nome;
  // para pegar o id
  document.getElementById('idusuario').value=idusuario;
}
</script>
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
