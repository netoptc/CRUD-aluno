<?php
	include "conexao.php";

	$search = $_POST["search"];
	$query = "SELECT * FROM aluno WHERE nome ='".$search."' OR materia = '".$search."'";
	$dados = mysqli_query($conexao,$query);

	echo"<a href='index.php'>voltar</a>";
	
	echo "
		<table border =1>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Materia</th>
				</tr>
			</thead>
	";
	while($linha = $dados->fetch_assoc()){
		echo"
		<tr>
							<th>".$linha["nome"]."</th>
							<th>".$linha["materia"]."</th>
		</tr>
		";
	}	
	echo "</table>";

?>