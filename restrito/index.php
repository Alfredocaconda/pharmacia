<?php 
  include '../protecao.php';
  # chamando a conexao e a funcao...
  include 'Conexao/connection.php';
  include 'Control/funcoes.php';
  $id_admin = $_SESSION['idfuncionario'];
  # pesquisando pelo usuario...
  $pesquisar=$_POST['buscar'] ?? '';
  //pegar os dados apartir do banco de dados
  $data_atual = date("Y-m-d");
  $pdo = new PDO('mysql:host=localhost;dbname=farmacia_lobito',"root","");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql="SELECT * FROM vvenda WHERE DATE(datavenda) = :data";
  $dados = $pdo->prepare($sql);
  $dados->bindParam('data',$data_atual);
  $dados->execute();
  include "cabecalho/cabecalho.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Informações</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                // Consulta SQL para contar os usuários
$sql = "SELECT COUNT(idf) as total_usuarios FROM funcionario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe o número de usuários cadastrados
    $row = $result->fetch_assoc();
    echo "<h1>".$row["total_usuarios"]."</h1>";
} else {
    echo "<h1>0</h1>";
} 
                ?>
                <p>Qtd de Funcionário</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                // Consulta SQL para contar os usuários
$sql = "SELECT COUNT(idp) as total_usuarios FROM produto";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Exibe o número de usuários cadastrados
    $row = $result->fetch_assoc();
    echo "<h1>".$row["total_usuarios"]."</h1>";
} else {
    echo "<h1>0</h1>";
} 
                ?>
                <p>Qtd de Medicamento Registado</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Mas informações<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                // Consulta SQL para contar os usuários
$sql = "SELECT COUNT(ide) as total_usuarios FROM entrada Where qtd>0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe o número de usuários cadastrados
    $row = $result->fetch_assoc();
    echo "<h1>".$row["total_usuarios"]."</h1>";
} else {
    echo "<h1>0</h1>";
} 
                ?>

                <p>Qtd de Stock</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Mas informações<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
              $data_atual = date("Y-m-d");
       // Consulta SQL para contar os usuários
$sql = "SELECT COUNT(ide) as total_usuarios FROM entrada Where caducidade < '$data_atual'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe o número de usuários cadastrados
    $row = $result->fetch_assoc();
    echo "<h1>".$row["total_usuarios"]."</h1>";
} else {
    echo "<h1>0</h1>";
} 
                ?>

                <p>Qtd de Medicamento Caducados</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mas informações<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
           <!-- /.card -->

           <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Medicamento</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Nome do Medicamento</th>
                    <th>Quantidade Vendido</th>
                    <th>Preço</th>
                    <th>Valor Total</th>
                    <th>Funcionario</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    //condicao para pegar todos os valores e mostrar na tabela
                    //condicao para percorrer o vector
                    while ($linha = $dados->fetch(PDO::FETCH_ASSOC)) {
                        $nome=$linha['nome'];
                        $quantidade=$linha['quantidade'];
                        $preco=$linha['preco'];
                        $totalcompra=$linha['totalcompra'];
                        $nomef=$linha['nomef'];
                        
                        echo " <tr>
                        <th>$nome</th>
                        <th scope='row'>$quantidade <i class='fas fa-arrow-up'></i></th>
                        <th >$preco</th>
                        <th >$totalcompra</th>
                        <th >$nomef</th>
                        </tr>";
                     }
                     // onclick="pegar_dados('$idusuario','$nome')"; o secredo esta aqui
                     ?>
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
 <?php include "cabecalho/rodape.php" ?>