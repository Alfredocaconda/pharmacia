<?php
                include '../Conexao/connection.php';
                include 'funcoes.php';
                $idusuario=$_POST['idusuario'];
                $nome_p=$_POST['nome']; 
                $sql="DELETE FROM  `funcionario` WHERE `idf`=$idusuario";
                if (mysqli_query($conn,$sql)) {
                # code...
                    mensagem("$nome_p apagado com sucesso!",'success');
                    header('Location: ../Listar_form.php');
                } else {
                # code...
                mensagem("$nome_p não foi apagado",'danger');
                 } 
                ?>