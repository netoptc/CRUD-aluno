<?php
	include "conexao.php";
	
	$id =$_GET["id"];
	echo $id;
	
	$query = "DELETE FROM aluno WHERE id ='".$id."'";
	mysqli_query($conexao,$query);
	
	mysqli_close($conexao);
	header("location: index.php");

?>