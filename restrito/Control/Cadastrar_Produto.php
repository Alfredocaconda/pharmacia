<?php
        //incluimos as conexoes e funcoes
            include '../Conexao/connection.php';
            include 'funcoes.php';
           
            //declaramos uma variavel que ira receber todos os atributos digitados no formulario de cadastro
            $nome=$_POST['nome'];
            $descricao=$_POST['descricao'];
            $categoria=$_POST['categoria'];
            $id_admin = $_POST['id_admin'];
                
            if (empty($_POST['nome']) && empty($_POST['descricao']) && empty($_POST['categoria'])) {
             echo "O campo não pode estar vazio.";
             header('Location: ../funcionario_form.php');
         } else {
            
            #codigo para inserir os valores na base de dados
            $sql="INSERT INTO `produto`(`nome`, `descricao`, `categoria`, `idf`) VALUES
             ('$nome','$descricao','$categoria','$id_admin')";
             #condicao para exibir uma mensagem na tela do usuario
            
             if (mysqli_query($conn,$sql)) {
                # code...
               /* if ($nome_foto != null) {
                  # code...
                  echo "<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto'>";
                } */
                // quando o usuario comcadastrado com sucesso
                    mensagem("$nome Cadastrado com sucesso!",'success');
             } else {
                # se der erro ao cadastrar usuario...
                mensagem("$nome não foi Cadastrado",'danger');
             }
             header('Location: ../produto_form.php');
            }
            ?>