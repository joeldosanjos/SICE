<?php
// Verificador de sessão 
require "controller/verificar.php";
include("controller/conexao.php");

$idUsuario = $_SESSION['idUsuario'];
$selo_inmetro = $_SESSION['selo_inmetro'];
$sql = "SELECT ult_recarga, vencimento FROM extintor WHERE selo_inmetro = '$selo_inmetro' AND idUsuario	= '$idUsuario'";
$result = mysqli_query($conexao, $sql);
$rs = mysqli_fetch_assoc($result);
if ($rs) {
  $_SESSION['ult_recarga'] = $rs['ult_recarga'];
  $_SESSION['vencimento'] = $rs['vencimento'];
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

  <title>Cadastrar extintor - S.I.C.E.</title>

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

    <div class="jumbotron">
      <div class="container">
        <br><br><br>
        <h1 class="display-5">Alterar extintor <i class="fa fa-fire-extinguisher" aria-hidden="true"></i></h1>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-body">
          <form method="post" action="controller/alterarextintor.php">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault01">Tipo de extintor</label>
                <?php if ($_SESSION['tipo_extintor'] == "Água") {
                  echo "<select name='tipo' class='custom-select form-control' required>
                                        <option value='agua'>Água</option>
                                        <option value='co2'>Dióxido de Carbono (CO2)</option>
                                        <option value='pqs'>Pó Químico Seco (PQS)</option>
                                        </select>";
                } elseif ($_SESSION['tipo_extintor'] == "Dióxido de Carbono (CO2)") {
                  echo "<select name='tipo' class='custom-select form-control' required>
                                        <option value='co2'>Dióxido de Carbono (CO2)</option>
                                        <option value='agua'>Água</option>
                                        <option value='pqs'>Pó Químico Seco (PQS)</option>
                                        </select>";
                } elseif ($_SESSION['tipo_extintor'] == "Pó Químico Seco (PQS)") {
                  echo "<select name='tipo' class='custom-select form-control' required>
                                        <option value='pqs'>Pó Químico Seco (PQS)</option>
                                        <option value='agua'>Água</option>
                                        <option value='co2'>Dióxido de Carbono (CO2)</option>
                                        </select>";
                }
                ?>

              </div>
              <div class="col-md-6 mb-3">
                <label for="validationDefault02">Selo INMETRO</label>
                <input type="text" class="form-control" id="validationDefault02" name="selo_inmetro" placeholder="Last name" value="<?php echo $_SESSION['selo_inmetro']; ?>" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault03">Localização</label>
                <input type="text" maxlength="100" class="form-control" id="validationDefault03" name="localizacao" value="<?php echo $_SESSION['localizacao']; ?>" required>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationDefault04">Última recarga</label>
                <input type="date" class="form-control" id="validationDefault04" name="ult_recarga" value="<?php echo $_SESSION['ult_recarga']; ?>" required>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationDefault05">Data de vencimento</label>
                <input type="date" class="form-control" id="validationDefault05" name="vencimento" value="<?php echo $_SESSION['vencimento']; ?>" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="exampleFormControlTextarea">Descrição (opcional)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3"><?php echo $_SESSION['descricao'] ?></textarea>
              </div>
            </div>
            <button class="btn btn-warning" type="submit">Enviar</button>
            <a href="listar_extintor.php" class="btn btn-secondary">Voltar</a>
          </form>
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