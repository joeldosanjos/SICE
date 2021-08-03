<?php
header('Content-type: text/html; charset=utf-8');
// Verificador de sessão 
require "controller/verificar.php";
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="icon" href="../img/icon.png">

  <title>Alterar perfil - S.I.C.E.</title>
  <script>
    function myFunction() {
      var txt;
      if (confirm("Tem certeza de que deseja excluir sua conta?") == true) {
        window.location.href = "controller/excluirconta.php";
      } else {}
      document.getElementById("demo").innerHTML = txt;
    }
  </script>
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger">
    <a class="navbar-brand" href="conta_index.php"><img src="../img/logo.png" width="170" height="50" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="conta_perfil.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['nome']; ?> <span class="sr-only"></span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Extintores</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="cadastro_extintor.php">Adicionar</a>
            <a class="dropdown-item" href="listar_extintor.php">Listar todos</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fichas de inspeção</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="cadastro_ficha.php">Gerar</a>
            <a class="dropdown-item" href="listar_ficha.php">Listar todos</a>
          </div>
        </li>
        <li class="nav-item active">
          <a class="nav-link navbar-right" href="relatorio.php"> Relatório <span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
        <li class="nav-item active">
          <a class="nav-link navbar-right" href="controller/destruir.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair <span class="sr-only"></span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="post" action="procurar_inmetro.php">
        <input class="form-control mr-sm-2" type="text" placeholder="Selo INMETRO" aria-label="Search" name="selo_inmetro">
        <button class="btn btn-outline-secondary my-2 my-sm-0" style="color: white; border-color: white;" type="submit">Procurar</button>
      </form>
    </div>
  </nav>

  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <br><br><br>
        <h1 class="display-5">Informações da conta</h1>
      </div>
    </div>

    <div class="container">

      <section>
        <div class="container py-3">
          <div class="card" style="width: 100%;">
            <div class="row ">
              <div class="col-md-3 ">

              </div>
              <div class="col-md-8 px-0">
                <div class="card-block px-3"><br>
                  <h4 class="card-title">Alterar informações</h4><br>
                  <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                      <form method="post" action="controller/alterarconta.php" enctype="multipart/form-data">
                        <tbody>
                          <tr>
                            <td class="font-weight-bold"><i class="fa fa-info-circle" aria-hidden="true"></i> Nome</td>
                            <td><input type="text" value="<?php echo $_SESSION['nome']; ?>" name="nome">
                              <input type="text" value="<?php echo $_SESSION['sobrenome']; ?>" name="sobrenome">
                            </td>

                          </tr>
                          <tr>
                            <td class="font-weight-bold"><i class="fa fa-envelope-o" aria-hidden="true"></i> E-mail</td>
                            <td><input type="email" value="<?php echo $_SESSION['email']; ?>" name="email"></td>
                          </tr>
                          <tr>
                            <td class="font-weight-bold"><i class="fa fa-id-card-o" aria-hidden="true"></i> CPF</td>
                            <td><input oninput="maxLengthCheck(this)" type="number" value="<?php echo $_SESSION['cpf']; ?>" maxlength="11" name="cpf"></td>
                          </tr>
                          <tr>
                            <td class="font-weight-bold"><i class="fa fa-phone" aria-hidden="true"></i> Telefone</td>
                            <td><input type="text" id="txttelefone" value="<?php echo $_SESSION['telefone']; ?>" maxlength="15" onkeyup="mascaratelefone(this.value)" name="telefone"></td>
                          </tr>
                          <tr>
                            <td class="font-weight-bold"><i class="fa fa-picture-o" aria-hidden="true"></i> Imagem</td>
                            <td><input type="file" name="imagem" accept="image/x-png,image/gif,image/jpeg"></td>
                          </tr>
                          <tr>
                            <td class="font-weight-bold"><i class="fa fa-key" aria-hidden="true"></i> Senha</td>
                            <td><input type="text" value="<?php echo $_SESSION['senha']; ?>" name="senha"></td>
                          </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="Alterar" class="btn btn-warning">
                    <a href="conta_perfil.php" class="btn btn-danger">Voltar</a>
                    </form>
                  </div>
                </div><br>
              </div>

            </div>
          </div>
        </div>
      </section>

      <br>
      <hr>

    </div> <!-- /container -->

  </main>

  <footer class="container">
    <p>&copy; S.I.C.E. 2017-2018</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>

</html>