<?php

require("dbconnect.inc.php");

$qry = "SELECT conteudo FROM arquivos";
$res = mysqli_query($conn,$qry);

while($fila = mysqli_fetch_array($res))
{


echo '<img src="data:image/jpeg;base64,' . base64_encode( $fila['conteudo'] ) . '" />';
}



?>



