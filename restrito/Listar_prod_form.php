<?php 
include '../protecao.php';
 # pesquisando pelo usuario...
 $pesquisar=$_POST['buscar'] ?? '';
 # chamando a conexao e a funcao...
include 'Conexao/connection.php';
include 'Control/funcoes.php';
//pegar os dados apartir do banco de dados
$sql="SELECT * FROM produto WHERE nome LIKE '%$pesquisar%'";
//executar a query que ira ser declarado uma variavel que ira receber a conexao e os dados do banco de dados
//esta variavel ira receber todos os objectos do banco de dados
$dados=mysqli_query($conn,$sql); 
include "cabecalho/cabecalho.php"
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listar os Registros dos Medicamanto</h1>
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
                            <th scope="col">Nome do Medicmanto</th>
                            <th scope="col">Descrição do Medicamento</th>
                            <th scope="col">Categoria do Medicamento</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </theard>
                    <tbody>
                    <?php
                    //condicao para pegar todos os valores e mostrar na tabela
                    //condicao para percorrer o vector
                    while ($linha=mysqli_fetch_assoc($dados)) {
                        $id_medicamento=$linha['idp'];
                        $nome=$linha['nome'];
                        $descricao=$linha['descricao'];
                        $categoria=$linha['categoria'];
                        
                        echo " <tr>
                        <th scope='row'>$nome</th>
                        <th >$descricao</th>
                        <th >$categoria</th>
                        <th width=150px>
                            <a href='Control/Produto_actualizar.php?idproduto=$id_medicamento' 
                            class='btn btn-success btn-sm'>Editar</a>
                            
                          <a href='#' class='btn btn-danger btn-sm'  data-toggle='modal'
                          data-target='#confirma'
                             onclick=" .'"' ."pegar_dados($id_medicamento,'$nome')" .'"' ."
                             >Apagar</a>
                        </th>
                        <th width=150px>
                        <a href='Control/Dar_entrada.php?idproduto=$id_medicamento' 
                        class='btn btn-success btn-sm'>Entrada no Stock</a>
                        </th>
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
       <input type="hidden" name="idproduto" id="idproduto" value="">
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
function pegar_dados(idproduto,nome){
  //pegar o nome da pessoa
  document.getElementById('nome_pessoa').innerHTML=nome;
  document.getElementById('nome_pessoa_1').value=nome;
  // para pegar o id
  document.getElementById('idproduto').value=idproduto;
}
</script>
  </div>
  <!-- /.content-wrapper -->
  <?php include "cabecalho/rodape.php" ?>