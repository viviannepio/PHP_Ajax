<?php

$connect = mysqli_connect("localhost", "root", "");

if (!$connect) die ("Falha na conexão com o Banco de Dados!");

$db = mysqli_select_db($connect, "pweb_ajax");

?>