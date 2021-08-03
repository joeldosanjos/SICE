<?php
include("controller/conexao.php");

$selo = $_GET['selo_inmetro'];
include("../qr-code/qrlib.php");

$sql = "SELECT idExtintor, selo_inmetro, tipo_extintor, localizacao, descricao, DATE_FORMAT(ult_recarga,'%d/%m/%Y'), DATE_FORMAT(vencimento,'%d/%m/%Y') FROM extintor WHERE selo_inmetro = '$selo'";
$result = mysqli_query($conexao, $sql);
$rs = mysqli_fetch_assoc($result);
if ($rs) {
    $idExtintor = $rs['idExtintor'];
    $selo_inmetro = $rs['selo_inmetro'];
    $tipo_extintor = $rs['tipo_extintor'];
    $localizacao = $rs['localizacao'];
    $descricao = $rs['descricao'];
    $ult_recarga = $rs["DATE_FORMAT(ult_recarga,'%d/%m/%Y')"];
    $vencimento = $rs["DATE_FORMAT(vencimento,'%d/%m/%Y')"];

    if (($tipo_extintor) == "agua") {
        $tipo_extintor = "Água";
    } elseif (($tipo_extintor) == "co2") {
        $tipo_extintor = "Dióxido de Carbono (CO2)";
    } elseif (($tipo_extintor) == "pqs") {
        $tipo_extintor = "Pó Químico Seco (PQS)";
    }
}

$sql = "SELECT usuario.nome FROM extintor, usuario WHERE (extintor.idUsuario = usuario.idUsuario) AND extintor.idExtintor = '$idExtintor'";
$result = mysqli_query($conexao, $sql);
$rs = mysqli_fetch_assoc($result);
if ($rs) {
    $nome = $rs['nome'];
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

    <title>Detalhes do extintor - S.I.C.E.</title>
</head>

<body>
    <!-- Logotipo -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger">
        <a class="navbar-brand" href="index.html"><img src="../img/logo.png" width="170" height="50" alt=""></a>
    </nav>


    <main role="main">

        <div class="jumbotron">
            <div class="container">
                <br><br><br>
                <h1 class="display-5"> Detalhes do extintor </h1>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="controller/incluirextintor.php">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationDefault01">Tipo de extintor</label>
                                <p style="font-size: 20px;"><?php echo $tipo_extintor; ?></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationDefault02">Selo INMETRO</label>
                                <p style="font-size: 20px;"><?php echo $selo_inmetro; ?></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationDefault02">Usuário responsável</label>
                                <p style="font-size: 20px;"><?php echo $nome; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationDefault03">Localização</label>
                                <p style="font-size: 20px;"><?php echo $localizacao; ?></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationDefault04">Última recarga</label>
                                <p style="font-size: 20px;"><?php echo $ult_recarga; ?></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationDefault05">Data de vencimento</label>
                                <p style="font-size: 20px;"><?php echo $vencimento; ?></p>
                            </div>
                        </div>

                        <div class='row'>
                            <?php

                            if (!empty($descricao)) {

                                echo "<div class='col-md-6 mb-3'>
                    <label for='exampleFormControlTextarea'>Descrição</label>
                    <p style='font-size: 20px;'>$descricao</p>
                    </div>";
                            }
                            ?>

                            <div class="col-md-2 mb-3">
                                <label for="validationDefault05">Prazo de recarga</label>
                                <?php
                                $sql = "SELECT DATEDIFF((SELECT vencimento FROM extintor WHERE selo_inmetro = '$selo' AND idExtintor = '$idExtintor'), CURDATE())";
                                $result = mysqli_query($conexao, $sql);
                                $rs = mysqli_fetch_assoc($result);
                                if ($rs) {
                                    $diasprovencimento = $rs["DATEDIFF((SELECT vencimento FROM extintor WHERE selo_inmetro = '$selo' AND idExtintor = '$idExtintor'), CURDATE())"];
                                }

                                if ($diasprovencimento >= "88") {
                                    echo "<p style='font-size: 20px;' class='p-2 mb-2 bg-success text-white text-center'>$diasprovencimento dias</p>";
                                } elseif ($diasprovencimento < "88" && $diasprovencimento >= "30") {
                                    echo "<p style='font-size: 20px;' class='p-2 mb-2 bg-warning text-white text-center'>$diasprovencimento dias</p>";
                                } elseif ($diasprovencimento < "30" && $diasprovencimento >= "1") {
                                    echo "<p style='font-size: 20px;' class='p-2 mb-2 bg-danger text-white text-center'>$diasprovencimento dias</p>";
                                } elseif ($diasprovencimento < 1) {
                                    echo "<p style='font-size: 20px;' class='p-2 mb-2 bg-dark text-white text-center'>Vencido :(</p>";
                                }
                                ?>
                            </div>
                        </div>
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