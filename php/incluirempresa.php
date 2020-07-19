<?php

    include ("conexao.php");

    if($_POST['nome']){

    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];

    $sql = "insert into empresa(nome, numero, rua, cidade, bairro, cep)
        values ('$nome','$numero','$rua','$cidade','$bairro','$cep')";

if (mysqli_query($conexao, $sql)) {
    echo "<script> alert ('Empresa cadastrada com sucesso!') </script>";
    echo "<script> window.location.href = '../cadastro.php' </script>";
} 
    else {
        echo "erro".mysqli_error($conexao);
} 
    } else {
        echo "<script> alert ('Por favor, preencha todos os campos') </script>";
        echo "<script> window.location.href = document.referrer </script>";
    }



?>