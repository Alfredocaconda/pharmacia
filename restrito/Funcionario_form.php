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
                <a href="Control/CadastroFuncionario.php" class="nav-link active">
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
            <h1 class="m-0">Cadastrar Funcionário</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--Conteudos Main content -->
    <section class="content">
    <div class="container">
        <!--LINHA-->
        <div class="row">
        <div class="col">
  <form action="Control/CadastroFuncionario.php" method="Post" enctype="multipart/form-data" class="row g-3">
      <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nome Completo</label>
    <input type="text" class="form-control" name="nome" id="inputEmail4" 
     placeholder="DIGITE AQUI O SEU NOME" required>
  </div>
  <div class="col-md-4">
  </br>
    <label for="genero" class="form-label">Selecionar o Genero</label>
    <select id="inputState" name="genero" class="form-select" required>
      <option >Masculino</option>
      <option>Femenino</option>
    </select>
</div>
<div class="col-md-2">
    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" name="data_nascimento" id="inputZip" required>
  </div>

  <div class="col-md-6">
    <label for="endereco" class="form-label">Morada</label>
    <input type="text" class="form-control" id="inputAddress" name="endereco"
     placeholder="DIGITE AQUI A SUA MORADA" required>
  </div>
  <div class="col-md-6">
    <label for="telefone" class="form-label">Nº do Telefone ou E-mail</label>
    <input type="text" class="form-control" id="inputAddress" name="telefone" 
    placeholder="DIGITE AQUI O SEU NÚMERO OU E-MAIL" required>
  </div>
  <div class="col-md-6">
    <label for="senha" class="form-label">Senha</label>
    <input type="text" class="form-control" id="inputAddress" name="senha" 
    placeholder="DIGITE AQUI A SUA SENHA" required>
  </div>
  <div class="col-md-4">
  </br>
    <label for="cargo" class="form-label">Selecionar a Função</label>
    <select id="inputState" name="cargo" class="form-select" required>
      <option >Gerente</option>
      <option>Farmaceutico</option>
    </select>
</div>
  <div class="mb-3">
  <label for="foto" class="form-label">Inserir Imagem</label>
  <input type="file" class="form-control" id="foto"  name="foto" accept="image/*">          
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>  
        </div>
     </div>
    </div>
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="#">Farmácia Luz&Vida</a>.</strong>
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