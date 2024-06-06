<?php 
include '../protecao.php';
#recuperar o id do funcionario
$id_admin = $_SESSION['idfuncionario'];
include "cabecalho/cabecalho.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registar os Medicamentos</h1>
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
            <!--coluna-->
            <div class="col">

     <form action="Control/Cadastrar_Produto.php" method="Post" class="row g-3">
     <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>">
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome do Medicamanto</label>
    <input type="text" class="form-control" name="nome" id="inputEmail4"  placeholder="PARACETAMOL" required>
  </div>
  <div class="col-md-6">
    <label for="descricao" class="form-label">Descrição do Medicamento</label>
    <input type="text" class="form-control" id="inputPassword4" name="descricao"  placeholder="250MG" required>
  </div>
  <div class="col-md-6">
    <label for="categoria" class="form-label">Categoria do Medicamanto</label>
    <input type="text" class="form-control" id="inputAddress" name="categoria"
     placeholder="COMPRMIDO" required>
  </div>

  <div class="col-md-12">
  </br>
    <button type="submit" class="btn btn-primary">Guardar o Medicamanto</button>
  </div>
</form>  
            </div>
        </div>
    </div>
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "cabecalho/rodape.php" ?>