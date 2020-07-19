<?php
//session_start();
// Verificador de sessão 
require "php/verificar.php"; 

?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="icon.png">

    <title>Cadastrar extintor - S.I.C.E.</title>
      
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger">
      <a class="navbar-brand" href="conta_index.php"><img src="logo.png" width="170" height="50" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="conta_perfil.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['nome']; ?> <span class="sr-only"></span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Extintores</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="cadastro_extintor.php">Adicionar</a>
              <a class="dropdown-item" href="listar_extintor.php">Listar todos</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fichas de inspeção</a>
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
            <a class="nav-link navbar-right" href="php/destruir.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair <span class="sr-only"></span></a>
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
          <h1 class="display-5"> Cadastrar extintor</h1>
        </div>
      </div>

      <div class="container">
         <div class="card">
             <div class="card-body">
                <form method="post" action="php/incluirextintor.php">
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Tipo de extintor</label>
                    <select name="tipo" class="custom-select form-control" required>
                        <option selected disabled>Selecionar</option>
                        <option value="agua">Água</option>
                        <option value="co2">Dióxido de Carbono (CO2)</option>
                        <option value="pqs">Pó Químico Seco (PQS)</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationDefault02">Selo INMETRO</label>
                    <input type="text" class="form-control" id="validationDefault02" name="selo_inmetro" placeholder="Last name" value="EX" required>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="validationDefault03">Localização</label>
                    <input type="text" maxlength="100" class="form-control" id="validationDefault03" name="localizacao" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault04">Última recarga</label>
                    <input type="date" class="form-control" id="validationDefault04" name="ult_recarga" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault05">Data de vencimento</label>
                    <input type="date" class="form-control" id="validationDefault05" name="vencimento" required>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="exampleFormControlTextarea">Descrição (opcional)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3"></textarea>
                </div>           
                </div>
                <button class="btn btn-danger" type="submit">Cadastrar</button>
                </form>
             </div>
          </div>
        <br><hr>
          
      </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>&copy; S.I.C.E. 2017-2018</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
