<?php
	include "conexao.php";
	$id = $_POST['id'];
	$sql = "DELETE FROM USUARIO WHERE id_usuario = '$id'";
	try 
    {
        mysqli_query($connect, $sql);
    } 
    catch (\Throwable $error) 
    {
        die($error);
    }
	$response = array("success" => true);
	echo json_encode($response)
?>