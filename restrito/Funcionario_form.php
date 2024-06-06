<?php 
include '../protecao.php';
$id_admin = $_SESSION['idfuncionario'];
include "cabecalho/cabecalho.php" ?>
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
          <div class="row">
            <div class="col">
                <form action="Control/CadastroFuncionario.php" method="Post" enctype="multipart/form-data" class="row g-3">
                  <div class="col-md-6"><label for="inputEmail4" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" name="nome" id="inputEmail4" placeholder="DIGITE AQUI O SEU NOME" required>
                  </div>
                  <div class="col-md-4">
                    </br>
                    </br>
                    <select id="inputState" name="genero" class="form-select" required>
                      <option >Selecionar o Genero</option>
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
            <select id="inputState" name="cargo" class="form-select" required>
              <option >Selecionar a Função</option>
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
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "cabecalho/rodape.php" ?>