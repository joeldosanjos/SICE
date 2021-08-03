<?php

require("controller/verificar.php");
include("controller/conexao.php");

$operacao = $_POST['operacao'];
$idFicha = $_POST['idFicha'];

if ($operacao == "excluir") {

  $sql = "DELETE FROM ficha WHERE idFicha = '$idFicha'";

  if (mysqli_query($conexao, $sql)) {
    echo "<script>"
      . "alert('Ficha de inspeção excluída com sucesso!');"
      . "window.location='listar_ficha.php';"
      . "</script>";
  } else {
    echo mysqli_error($conexao);
  }
}
if ($operacao == "listar") {

  $idUsuario = $_SESSION['idUsuario'];
  $sql = "SELECT idFicha, selo_inmetro, DATE_FORMAT(data_criacao,'%d/%m/%Y'), limpeza, sinal_piso, sinal_parede, venc_carga, teste_hidro, lacre, mangueira, suporte, manometro FROM ficha WHERE idFicha = '$idFicha' AND idUsuario = '$idUsuario'";
  $result = mysqli_query($conexao, $sql);
  $rs = mysqli_fetch_assoc($result);
  if ($rs) {
    $_SESSION['idFicha'] = $rs['idFicha'];
    $_SESSION['selo_inmetro'] = $rs['selo_inmetro'];
    $_SESSION['data_criacao'] = $rs["DATE_FORMAT(data_criacao,'%d/%m/%Y')"];
    $_SESSION['limpeza'] = $rs['limpeza'];
    $_SESSION['sinal_piso'] = $rs['sinal_piso'];
    $_SESSION['sinal_parede'] = $rs['sinal_parede'];
    $_SESSION['venc_carga'] = $rs['venc_carga'];
    $_SESSION['teste_hidro'] = $rs['teste_hidro'];
    $_SESSION['lacre'] = $rs['lacre'];
    $_SESSION['mangueira'] = $rs['mangueira'];
    $_SESSION['suporte'] = $rs['suporte'];
    $_SESSION['manometro'] = $rs['manometro'];
  }
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="icon" href="../img/icon.png">

  <title>Detalhes da ficha de inspeção - S.I.C.E.</title>

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
          <a class="nav-link navbar-right" href="control/destruir.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair <span class="sr-only"></span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="post" action="procurar_inmetro.php">
        <input class="form-control mr-sm-2" type="text" placeholder="Selo INMETRO" aria-label="Search" name="selo_inmetro">
        <button class="btn btn-outline-secondary my-2 my-sm-0" style="color: white; border-color: white;" type="submit">Procurar</button>
      </form>
    </div>
  </nav>

  <main role="main">

    <div class="jumbotron">
      <div class="container">
        <br><br><br>
        <h1 class="display-5"> Detalhes da ficha de inspeção <i class="fa fa-list-alt" aria-hidden="true"></i></h1>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="validationDefault01">ID da Ficha</label>
              <p style="font-size: 20px;"><?php echo $_SESSION['idFicha']; ?></p>

            </div>
            <div class="col-md-3 mb-3">
              <label for="validationDefault02">Data de criação</label><br>
              <p style="font-size: 20px;"><?php echo $_SESSION['data_criacao']; ?></p>
            </div>
            <div class="col-md-5 mb-3">
              <label for="validationDefault02">Selo INMETRO</label><br>
              <p style="font-size: 20px;"><?php echo $_SESSION['selo_inmetro']; ?></p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Limpeza</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['limpeza']; ?></p>
              </label>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Sinal do piso</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['sinal_piso']; ?></p>
              </label>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Sinal da parede</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['sinal_parede']; ?></p>
              </label>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Vencimento da carga</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['venc_carga']; ?></p>
              </label>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Teste hidrostático</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['teste_hidro']; ?></p>
              </label>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Sinal do piso</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['sinal_piso']; ?></p>
              </label>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Lacre</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['lacre']; ?></p>
              </label>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Mangueira</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['mangueira']; ?></p>
              </label>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Suporte</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['suporte']; ?></p>
              </label>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationDefault02">Manômetro</label><br>
              <label class="custom-control custom-radio">
                <p style="font-size: 20px;"><?php echo $_SESSION['manometro']; ?></p>
              </label>
            </div>
          </div>

          <a class="btn btn-secondary" href="listar_extintor.php">Voltar</a>
        </div>
      </div>

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