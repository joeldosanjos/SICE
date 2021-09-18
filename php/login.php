<?php
// Verificador de sessão 
require "controller/verificarloginpage.php";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Log in - S.I.C.E.</title>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
  <link rel="icon" href="../img/icon.png">
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>

  <div class="signupSection">
    <div class="info">
      <h2>Faça login</h2>
      <div class="icon">
        <i class="fa fa-fire-extinguisher" aria-hidden="true"></i>
      </div>
      <p>E conheça mais nosso projeto</p>

    </div>
    <form action="control/autorizarlogin.php" method="POST" class="signupForm" name="signupform">
      <br><br><br>
      <ul class="noBullet">
        <li>
          <label for="email"></label>
          <input type="email" class="inputFields" id="username" name="email" placeholder="E-mail" required />
        </li>
        <li>
          <label for="password"></label>
          <input type="password" class="inputFields" id="password" name="senha" placeholder="Senha" required />
        </li>
        <li id="center-btn">
          <input type="submit" id="join-btn" name="Entrar" alt="Join" value="Entrar">
        </li>
      </ul>
    </form>
  </div>

</body>

</html>
