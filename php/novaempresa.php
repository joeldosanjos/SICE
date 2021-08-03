<?php
// Verificador de sessão 
require "controller/verificaradmin.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Cadastro de Empresa - S.I.C.E.</title>

  <link rel="icon" href="../img/icon.png">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>

  <link rel="stylesheet" href="../css/cadastro.css">

</head>

<body>
  <div class="signupSection">
    <div class="info">
      <h2>Cadastre a Empresa</h2>
      <div class="icon">
        <i class="fa fa-fire-extinguisher" aria-hidden="true"></i>
      </div>
      <p>Para que ela tenha total </p>
      <p>funcionalidade de nosso sistema</p>


    </div>
    <form action="control/incluirempresa.php" method="POST" class="signupForm" name="signupform">
      <ul class="noBullet">
        <p>Obrigatório</p>
        <li>
          <label for="username"></label>
          <input type="text" class="inputFields" id="username" name="nome" placeholder="Nome da empresa" required />
        </li>
        <p>Opcional</p>
        <li>
          <label for="email"></label>
          <input type="text" class="inputFields" id="email" name="cidade" placeholder="Cidade" />
        </li>
        <li>
          <label for="password"></label>
          <input type="text" class="inputFields" name="cep" placeholder="CEP" maxlength="8" />
        </li>
        <li>
          <input type="text" class="inputFields" name="bairro" placeholder="Bairro">
        </li>
        <li>
          <label for="numero de cpf"></label>
          <input type="text" class="oi" id="CPF" name="rua" placeholder="Rua" style="width: 52%;">
        </li>
        <li>
          <label for="Telefone"></label>
          <input type="text" class="inputFields" maxlength="6" name="numero" placeholder="Número" />
        <li>
        </li>

        <li id="center-btn">
          <input type="submit" id="join-btn" name="Cadastrar" alt="Join" value="Cadastrar">
        </li>
      </ul>
    </form>
  </div>

</body>

</html>