<?php

require "verificaradmin.php";
include("conexao.php");

$idUsuarioEscolhido = $_POST['usuario'];
$sql = "DELETE FROM usuario WHERE idUsuario  = '$idUsuarioEscolhido'";

if (mysqli_query($conexao, $sql)) {
    echo "<script>"
        . "alert('Usuario excluido com sucesso!');"
        . "window.location='../conta_perfil.php';"
        . "</script>";
} else {
    echo mysqli_error($conexao);
}
