<?php

require "verificar.php"; 
include "conexao.php";

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$imagem = $_FILES['imagem'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$id = $_SESSION['idUsuario'];

    

if($imagem != NULL) { 
	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal); 

		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
        mysqli_query($conexao, "UPDATE usuario SET imagem='$mysqlImg' WHERE idUsuario = '$id'") or die("O sistema não foi capaz de executar a query");
		unlink($nomeFinal);
	}
} 


    $sql = "UPDATE usuario SET email='$email',nome='$nome',senha='$senha',cpf='$cpf',telefone='$telefone',sobrenome='$sobrenome' WHERE idUsuario = '$id'";
    if(mysqli_query($conexao, $sql)){
        
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['telefone'] = $telefone;
        $_SESSION['sobrenome'] = $sobrenome;
         
        
        if($imagem != NULL) { 
            $operacao = "SELECT imagem FROM usuario where idUsuario = '$id'";
            $operacao_resultado = mysqli_query($conexao, $operacao);
            $resultado = mysqli_fetch_assoc($operacao_resultado);
                if ($resultado){
                    $_SESSION['imagem'] = $resultado['imagem'];
                } else {
                    $_SESSION['imagem'] = $_SESSION['imagem'];
                }
        }
        echo "<script>"
        . "alert('Dados alterados com sucesso!');"
                . "window.location='../conta_perfil.php';"
                . "</script>";
                    
                }else{
                    echo mysqli_error($conexao);
                }

?>