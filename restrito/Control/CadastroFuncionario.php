<?php
           include '../Conexao/connection.php';
            include 'funcoes.php';
            $nome=$_POST['nome'];
            $genero=$_POST['genero'];
            $Telefone=$_POST['telefone'];
            $data_nascimento=$_POST['data_nascimento'];
            $Endereco=$_POST['endereco'];
            $Funcao=$_POST['cargo'];
            $password=$_POST['senha'];
            // codigo de foto
            $foto=$_FILES['foto'];
            $nome_foto=mover_foto($foto);
            if ($nome_foto== 0) {
              # code...
              $nome_foto= null;
            } 
            if (empty($_POST['nome']) && empty($_POST['genero']) && empty($_POST['telefone'])
             && empty($_POST['data_nascimento']) && empty($_POST['endereco']) && empty($_POST['cargo'])
            && empty($_POST['senha']) ) {
            
              echo "O campo não pode estar vazio.";
              header('Location: ../funcionario_form.php');
          } else {
              // Processar os dados
              $sql="INSERT INTO `funcionario`(`nome`, `genero`, `telefone`, `cargo`, 
              `data_nascimento`, `senha`, `endereco`, `foto`) VALUES ('$nome','$genero',
              '$Telefone','$Funcao','$data_nascimento','$password','$Endereco','$nome_foto')";
               if (mysqli_query($conn,$sql)) {
                  # code...
                  if ($nome_foto != null) {
                    # code...
                    echo "<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto'>";
                  } 
                      mensagem("$nome Cadastrado com sucesso!",'success');
               } else {
                  # code...
                  mensagem("$nome não foi Cadastrado",'danger');
               }
               header('Location: ../funcionario_form.php');
          }     