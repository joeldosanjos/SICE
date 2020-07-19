<?php

    include ("conexao.php");

    if(($_POST['nome']) && ($_POST['email']) && ($_POST['senha']) && ($_POST['data_nasc']) && ($_POST['cpf']) && ($_POST['telefone'])){

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_nasc = $_POST['data_nasc'];
    $cpf1 = $_POST['cpf'];
    $cpf2 = $_POST['cpf2'];
    $cpf = ($cpf1.$cpf2);
    $telefone = $_POST['telefone'];
    $idEmpresa = $_POST['empresa'];

    $sql = "insert into usuario(nome, data_nasc, cpf, senha, email, idEmpresa, telefone, sobrenome)
        values ('$nome','$data_nasc','$cpf','$senha','$email','$idEmpresa','$telefone','$sobrenome')";

if (mysqli_query($conexao, $sql)) {
    echo "<script> alert ('Sucesso! O funcionário poderá usar o sistema agora') </script>";
    echo "<script> window.location.href = '../conta_index.php' </script>";
} 
    else {
        echo "erro".mysqli_error($conexao);
} 
    } else {
        echo "<script> alert ('Por favor, preencha todos os campos') </script>";
        echo "<script> window.location.href = document.referrer </script>";
    }



?>