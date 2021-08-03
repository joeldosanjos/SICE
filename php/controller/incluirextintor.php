<?php
require("verificar.php");
include("conexao.php");

if (($_POST['tipo']) && ($_POST['selo_inmetro']) && ($_POST['localizacao']) && ($_POST['ult_recarga']) && ($_POST['vencimento'])) {

    $tipo = $_POST['tipo'];
    $selo_inmetro = $_POST['selo_inmetro'];
    $localizacao = $_POST['localizacao'];
    $ult_recarga = $_POST['ult_recarga'];
    $vencimento = $_POST['vencimento'];
    $descricao = $_POST['descricao'];
    $idUsuario = $_SESSION['idUsuario'];

    $sql = "insert into extintor(idUsuario, descricao, tipo_extintor, selo_inmetro, ult_recarga, vencimento, localizacao)
        values ('$idUsuario','$descricao','$tipo','$selo_inmetro','$ult_recarga','$vencimento','$localizacao')";

    if (mysqli_query($conexao, $sql)) {
        echo "<script> alert ('Extintor cadastrado com sucesso!') </script>";
        echo "<script> window.location.href = '../conta_index.php' </script>";
    } else {
        echo "erro" . mysqli_error($conexao);
    }
} else {
    echo "<script> alert ('Por favor, preencha todos os campos') </script>";
    echo "<script> window.location.href = document.referrer </script>";
}
