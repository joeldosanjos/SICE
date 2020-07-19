<?php
//session_start();
// Verificador de sessão 
require "php/verificaradmin.php"; 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro - S.I.C.E.</title>
  
  <link rel="icon" href="icon.png">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/cadastro.css">
  
</head>

<body>
  <div class="signupSection">
  <div class="info">
    <h2>Faça o Cadastro</h2>
	<div class="icon">
    <i class="fa fa-fire-extinguisher" aria-hidden="true"></i>
	</div>
    <p>Para dar total acesso</p>
    <p>a um funcionário</p>
      
 
  </div>
  <form action="php/incluircadastro.php" method="POST" class="signupForm" name="signupform">
    <ul class="noBullet">
        <li>
            <select class="inputFields" name="empresa">
                <option selected disabled>Empresa</option>
                <?php
                include ("php/conexao.php");
                $SQL = "SELECT nome, idEmpresa FROM empresa;";
                $result = mysqli_query( $conexao, $SQL );
                while( $item = mysqli_fetch_array( $result ) ) {
                    $nome = $item['nome'];
                    $idEmpresa = $item['idEmpresa'];
                    if ($idEmpresa != "1"){ 
                    echo "<option value='$idEmpresa'>$nome</option>";
                    }
                }
                ?>
            </select>
        </li>
        <a href="novaempresa.php" style="color: white; text-decoration: none;">Adicionar nova empresa</a>
      <li>
        <label for="username"></label>
        <input type="text" class="inputFields" style="width: 24%;" id="username" name="nome" placeholder="Nome" required/>
        <input type="text" class="inputFields" style="width: 24%;" id="username" name="sobrenome" placeholder="Sobrenome" required/>
      </li>
	  <li>
	  <label for="email"></label>
        <input type="email" class="inputFields" id="email" name="email" placeholder="Email" required/>
      </li>
	  <li>
        <label for="password"></label>
        <input type="password" class="inputFields" id="password" name="senha" placeholder="Senha" required/>
      </li>
      <li>
        <input type="date" class="inputFields" style="color: grey;" name="data_nasc">  
      </li>
	  <li>
	   <label for="numero de cpf"></label>
        <input type="text" class="oi" id="CPF" name="cpf"  placeholder="CPF" size="9" maxlength="9"> - <input type="text" class="oie" name="cpf2" size="2" maxlength="2">
      </li>
	  <li>
	  <label for="Telefone"></label>
       <input type="text" class="inputFields" maxlength="11" name="telefone" placeholder="Telefone" />
   <li>
      </li>
    
      <li id="center-btn">
        <input type="submit" id="join-btn" name="Cadastrar" alt="Join" value="Cadastrar">
      </li>
    </ul>
  </form>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
