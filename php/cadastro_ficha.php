<?php
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

  <title>Cadastrar ficha - S.I.C.E.</title>

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
        <h1 class="display-5"> Cadastrar ficha de inspeção</h1>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-body">
          <form method="post" action="controller/incluirficha.php">
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="validationDefault01">Selo INMETRO</label>
                <select name="tipo" class="custom-select form-control" required>
                  <option selected disabled>Selecionar</option>
                  <?php
                  include("controller/conexao.php");
                  $idUsuario = $_SESSION['idUsuario'];
                  $SQL = "SELECT selo_inmetro FROM extintor WHERE idUsuario='$idUsuario'";
                  $result = mysqli_query($conexao, $SQL);
                  while ($item = mysqli_fetch_array($result)) {
                    $selo_inmetro = $item['selo_inmetro'];
                    echo "<option value='$selo_inmetro'>$selo_inmetro</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Limpeza</label><br>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="limpeza" value="Ok" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Ok</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="limpeza" value="Nao" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Não</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="limpeza" value="NA" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NA</span>
              </div>

              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Sinal do piso</label><br>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="sinal_piso" value="Ok" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Ok</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="sinal_piso" value="Nao" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Não</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="sinal_piso" value="NA" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NA</span>
              </div>

              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Sinal da parede</label><br>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="sinal_parede" value="Ok" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Ok</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="sinal_parede" value="Nao" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Não</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="sinal_parede" value="NA" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NA</span>
              </div>


            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Vencimento da carga</label><br>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="venc_carga" value="Ok" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Ok</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="venc_carga" value="Nao" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Não</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="venc_carga" value="NA" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NA</span>
              </div>

              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Teste hidrostático</label><br>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="teste_hidro" value="Ok" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Ok</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="teste_hidro" value="Nao" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Não</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="teste_hidro" value="NA" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NA</span>
              </div>

              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Lacre</label><br>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="lacre" value="Ok" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Ok</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="lacre" value="Nao" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Não</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="lacre" value="NA" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NA</span>
              </div>

              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Mangueira</label><br>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="mangueira" value="Ok" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Ok</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="mangueira" value="Nao" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Não</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="mangueira" value="NA" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NA</span>
              </div>


            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Suporte</label><br>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="suporte" value="Ok" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Ok</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="suporte" value="Nao" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Não</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="suporte" value="NA" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NA</span>
              </div>

              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Manômetro</label><br>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="manometro" value="Ok" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Ok</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="manometro" value="Nao" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Não</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="manometro" value="NA" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NA</span>
              </div>

            </div>
            <button class="btn btn-danger" type="submit">Cadastrar</button>
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