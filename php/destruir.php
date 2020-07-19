<?php
	session_start();
	
	unset($_SESSION['senha']);
    unset($_SESSION['idUsuario']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['cpf']);
    unset($_SESSION['telefone']);
    unset($_SESSION['data_nasc']);
    unset($_SESSION['imagem']);
    unset($_SESSION['idEmpresa']);
    unset($_SESSION['sobrenome']);
    unset($_SESSION['cidade']);
    unset($_SESSION['cep']); 
    unset($_SESSION['bairro']);
    unset($_SESSION['rua']); 
    unset($_SESSION['numero']);
    unset($_SESSION['complemento']);  
    unset($_SESSION['selo_inmetro']); 
    unset($_SESSION['tipo_extintor']); 
    unset($_SESSION['localizacao']);
    unset($_SESSION['descricao']);
    unset($_SESSION['ult_recarga']); 
    unset($_SESSION['vencimento']);
    unset($_SESSION['idFicha']);
    unset($_SESSION['selo_inmetro']);
    unset($_SESSION['data_criacao']);
    unset($_SESSION['limpeza']);
    unset($_SESSION['sinal_piso']);
    unset($_SESSION['sinal_parede']);
    unset($_SESSION['venc_carga']);
    unset($_SESSION['teste_hidro']);
    unset($_SESSION['lacre']);
    unset($_SESSION['mangueira']);
    unset($_SESSION['suporte']);
    unset($_SESSION['manometro']);
                
	header("Location: ../index.html");
	
?>


