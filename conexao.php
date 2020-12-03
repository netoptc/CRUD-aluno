<?php
$conexao = mysqli_connect("localhost","root","","crud");
	// Check connection
	if ($conexao->connect_errno) {
	  echo "Failed to connect to MySQL: " . $conexao-> connect_error;
	  exit();
	}
?>