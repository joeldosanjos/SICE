<?php

include("../qr-code/qrlib.php");
$selo = $_POST['selo_inmetro'];

QRcode::png('http://sice.cf/ver_extintor_unlogged.php?selo_inmetro='.$selo, 'qrcode.png');

header ('location: qrcode.png');
?>