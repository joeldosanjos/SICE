<?php

require "verificar.php";
include("conexao.php");

$idUsuario = $_SESSION['idUsuario'];
    $sql = "DELETE FROM usuario WHERE idUsuario = '$idUsuario'";
    
    if(mysqli_query($conexao, $sql)){
        echo "<script>"
        . "alert('Usuário excluído com sucesso!');"
                . "window.location='../index.html';"
                . "</script>";
    }else{
        echo mysqli_error($conexao);
    }

?>