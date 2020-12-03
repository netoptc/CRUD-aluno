<?php 
	include "conexao.php";

	$nome = $_POST["name"];
	$dataNascimento =  $_POST["date"];
	$ano = $_POST["ano"];
	$materia = $_POST["materia"];
	$id = $_POST["id"];
	
	if($id==0){
		$query = "INSERT INTO aluno(nome, dataNascimento, ano, materia) VALUES('".$nome."','".$dataNascimento."','".$ano."','".$materia."')";
		mysqli_query($conexao,$query);
	}else{
		$query = "UPDATE aluno SET nome = '".$nome."', dataNascimento = '".$dataNascimento."', ano = '".$ano."', materia = '".$materia."'";
		mysqli_query($conexao,$query);
	}
	mysqli_close($conexao);
	header("location: index.php");
?>