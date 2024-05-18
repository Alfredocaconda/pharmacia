<?php
function mensagem($texto, $tipo){
    echo "<div class='alert alert-$tipo' role='alert'>
    $texto
  </div>";
}
//invertendo a data
function mostrar_data($data){
    $d=explode('-',$data);
    $escreve=$d[2] ."/" .$d[1] ."/".$d[0];
    return $escreve;
}
//condicao de foto
function mover_foto($vector_foto){
    $vector_tipo= explode("/", $vector_foto['type']);
    $tipo=$vector_tipo[0] ?? '';
    $extensao= "." .$vector_tipo[1] ?? '';
    if ((!$vector_foto['error']) and ($vector_foto['size']<=500000) and ($tipo=="image")) {
        # code...$foto['nome_foto']
        $nome_arquivo= date('Ymdhms') .$extensao;
        move_uploaded_file($vector_foto['tmp_name'], "../img/".$nome_arquivo);
        return $nome_arquivo;
    } else {
        # code...
        return 0;
    }
}
?>