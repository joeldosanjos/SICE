<?php
require("verificar.php");
include("conexao.php");

$selo_inmetro = $_POST['tipo'];
$limpeza = $_POST['limpeza'];
$sinal_piso = $_POST['sinal_piso'];
$sinal_parede = $_POST['sinal_parede'];
$venc_carga = $_POST['venc_carga'];
$teste_hidro = $_POST['teste_hidro'];
$mangueira = $_POST['mangueira'];
$suporte = $_POST['suporte'];
$lacre = $_POST['lacre'];
$manometro = $_POST['manometro'];
$idUsuario = $_SESSION['idUsuario'];

$sql = "insert into ficha(idUsuario, selo_inmetro, data_criacao, limpeza, sinal_piso, sinal_parede, venc_carga, teste_hidro, lacre, mangueira, suporte, manometro)
        values ('$idUsuario','$selo_inmetro',CURDATE(),'$limpeza','$sinal_piso','$sinal_parede','$venc_carga','$teste_hidro','$lacre','$mangueira','$suporte','$manometro')";

if (mysqli_query($conexao, $sql)) {
    echo "<script> alert ('Ficha cadastrada com sucesso!') </script>";
    echo "<script> window.location.href = '../conta_index.php' </script>";
} else {
    echo "erro" . mysqli_error($conexao);
}
