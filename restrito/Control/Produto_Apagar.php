<?php
                include '../Conexao/connection.php';
                include 'funcoes.php';
                $id_produto=$_POST['idproduto'];
                $nome_p=$_POST['nome']; 
                $sql="DELETE FROM  `produto` WHERE `idp`='$id_produto'";
                if (mysqli_query($conn,$sql)) {
                # code...
                    mensagem("$nome_p apagado com sucesso!",'success');
                    header('Location: ../Listar_prod_form.php');
                } else {
                # code...
                mensagem("$nome_p não foi apagado",'danger');
                 }  
                ?>