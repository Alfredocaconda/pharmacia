<?php
# INICAR A SESSAO
include '../Conexao/connection.php';
# CONDICAO PARA SABER SE EXITE ALGUMA SESSAO
if (isset($_POST['usuario']) || isset($_POST['senha'])) {
    # CONDICAO PARA SABER SE O TAMANHO DO USUARIO É IGUAL A 0 
    if(strlen($_POST['usuario'])==0){
      echo 'POR FAVOR PREENCHA O SEU USUÁRIO';  
    }
     # CONDICAO PARA SABER SE O TAMANHO DA SENHA É IGUAL A 0 
    if (strlen($_POST['senha'])==0) {
      # code...
      echo 'POR FAVOR PREENCHA A SUA SENHA'; 
    } else{
      #limpar o campo para nao ser acessado por invasor
      $user=$conn->real_escape_string($_POST['usuario']);
      $password=$conn->real_escape_string($_POST['senha']);

      $sql="SELECT * FROM funcionario WHERE telefone='$user' AND senha='$password'";
      $query=$conn->query($sql) or die("FALHA NA CONEXAO DO CODIGO SQL: " .$conn->error);

      #condicao para verificar se a quantidade de rexisto for igual a 1
      $quantidade=$query->num_rows;
      if($quantidade>0){
        #se o usuario existe ira pegar no banco de dados
        $user=$query->fetch_assoc();
        #condicao para criar uma nova sessao
        if(!isset($_SESSION)){
          session_start();
        }
        #pegar os dados do usario
        $_SESSION['idfuncionario']=$user['idf'];
        $_SESSION['nome']=$user['nome'];
        $_SESSION['cargo']=$user['cargo'];
         // Recupera o caminho da imagem do banco de dados (substitua com sua lógica real)
        $_SESSION['imagem']=$user['foto'];
       
       // Substitua com sua lógica real
        # CONDICAO PARA VERIFICAR O CARGO DO USUARIO PARA PODER CHAMAR O SEU FORMULARIO
        switch ($_SESSION['cargo']) {
          case 'gerente':
              # CHAMANDO O FORMULARIO DO ADMINISTRADOR...
              header('Location: ../index.php');
              break;
          case 'farmaceutico':
               # CHAMANDO O FORMULARIO DO TECNICO...
              header('Location: ../vendas.php');
              break;
          }
        
     
      }else{
        
      }
      }
      echo 'FALHA AO ENTRAR USUÁRIO OU SENHA INCORRETA';
} 
?>