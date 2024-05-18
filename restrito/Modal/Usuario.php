<?php
include '../Conexao/connection.php';
class Usuario{
    var $objecto;
    public function __construct(){
        $conn = new PDO("mysql:host=localhost;dbname=farmacia","root","");
        $this->acesso=$conn;
    }
     #funcao com parametros para saber a funcao
     function entrar($usuario,$senha){
        $sql="SELECT * FROM funcionario  WHERE telefone=:user AND senha=:pass";
        $query=$this->acesso->prepare($sql);
        $query-> execute(array(':user'=>$usuario,':pass'=>$senha));
        $this->objecto=$query->fetchall();
        return $this->objecto;
    }

}

?>