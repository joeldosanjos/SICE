<?php
session_start();
	include_once("conexao.php");
	if(($_POST['email']) && ($_POST['senha'])){
		$email = mysqli_real_escape_string($conexao, $_POST['email']);//
		$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
                
        $result_usuario = "SELECT * FROM usuario WHERE email = '$email' && senha = '$senha'" ;
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		$rs = mysqli_fetch_assoc($resultado_usuario); //obtem uma matriz associativa
		if($rs){
	
            $_SESSION['idUsuario'] = $rs['idUsuario'];
            $_SESSION['sobrenome'] = $rs['sobrenome'];
            $_SESSION['nome'] = $rs['nome'];
			$_SESSION['email'] = $rs['email'];
			$_SESSION['senha'] = $rs['senha'];
			$_SESSION['cpf'] = $rs['cpf'];
            $_SESSION['telefone'] = $rs['telefone'];
            $_SESSION['data_nasc'] = $rs['data_nasc'];
            $_SESSION['imagem'] = $rs['imagem'];
            $_SESSION['idEmpresa'] = $rs['idEmpresa'];
			
			
			header("Location:../conta_index.php");
		}else{
           
                mysqli_close($conexao);
                echo "<script> alert ('Nenhum usuário foi encontrado com os dados informados') </script>";
                echo "<script> window.location.href = document.referrer </script>";
                }          
              
               
               } else {
                echo "<script> alert ('Por favor, entre com um usuário válido') </script>";
                echo "<script> window.location.href = document.referrer </script>";
    }
?>