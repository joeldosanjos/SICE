<?php
    require("verificar.php");
    include ("conexao.php");

    $tipo = $_POST['tipo'];
    $selo_inmetro = $_POST['selo_inmetro'];
    $localizacao = $_POST['localizacao'];
    $ult_recarga = $_POST['ult_recarga'];
    $vencimento = $_POST['vencimento'];
    $descricao = $_POST['descricao'];
    $idUsuario = $_SESSION['idUsuario'];

$sql = "UPDATE extintor SET descricao='$descricao',tipo_extintor='$tipo',selo_inmetro='$selo_inmetro',ult_recarga='$ult_recarga',vencimento='$vencimento',localizacao='$localizacao' WHERE selo_inmetro = '$selo_inmetro' AND idUsuario = '$idUsuario'";
    if(mysqli_query($conexao, $sql)){
         
        
        echo "<script>"
        . "alert('Extintor alterado com sucesso!');"
                . "window.location='../listar_extintor.php';"
                . "</script>";
         } else {
        echo "erro".mysqli_error($conexao);
}

?>