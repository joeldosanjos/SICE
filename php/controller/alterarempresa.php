<?php

require "verificar.php";
include "conexao.php";

$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$idEmpresaEscolhida = $_POST['idEmpresaEscolhida'];



$sql = "UPDATE empresa SET cidade='$cidade',numero='$numero',cidade='$cidade',bairro='$bairro',cep='$cep',complemento='$complemento' WHERE idEmpresa = '$idEmpresaEscolhida'";
if (mysqli_query($conexao, $sql)) {


    echo "<script>"
        . "alert('Dados alterados com sucesso!');"
        . "window.location='../conta_perfil.php';"
        . "</script>";
} else {
    echo mysqli_error($conexao);
}
