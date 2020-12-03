<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/CSSmain.css"/>
	
    <title>CRUD-Aluno</title>
	
  </head>
  
	<?php 
		include "conexao.php";
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			$query = "SELECT * FROM aluno WHERE id ='".$id."'";
			$dados = mysqli_query($conexao,$query);
			$linha = $dados->fetch_assoc();
			
			$nome = $linha["nome"];
			$dataNascimento =  $linha["dataNascimento"];
			$ano = $linha["ano"];
			$materia = $linha["materia"];
			
		}else{
			$id = 0;
			$nome = "";
			$dataNascimento =  "";
			$ano = "";
			$materia = "";
		}
		
	
	?>
  
  <body>
  
	<h1 align="center">CRUD - Aluno</h1>
	
		<form action="info.php"method="POST">
			
			<div class="form-group row justify-content-center">
				<label class="col-sm-1 col-form-label">Nome</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="inputName" name="name" required maxlength=30 value=<?=$nome?>>
				</div>
			</div>
			
			<div class="form-group row justify-content-center">
				<label class="col-sm-1 col-form-label">Nascimento</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="inputDate" name="date" required max="2020-12-12" min="1900-01-01" value=<?=$dataNascimento?>>
				</div>
			</div>
			
			<div class="form-group row justify-content-center">
				<label class="col-sm-1 col-form-label">Ano</label>
				<div class="col-sm-3">
					<input type="number"time class="form-control" id="inputAno" required name="ano" max=10 value=<?=$ano?>>
				</div>
			</div>
			
			<div class="form-group row justify-content-center">
				<label class="col-sm-1 col-form-label">Materia</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="inputMateria" name="materia" maxlength=20 required value=<?=$materia?>>
				</div>
			</div>
			
			<div class="form-group row justify-content-center">
				<input type="reset"   style="margin-right: 25px">
				<input type="submit"  class="btn btn-primary">
				<input type="hidden" id="id" name="id" value="<?=$id;?>"/>
			</div>
		</form>
		
		<div class ="row justify-content-center" style="margin: 50px">
		<table border =1>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Materia</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					$query = "SELECT * FROM aluno";
					$tabela = mysqli_query($conexao,$query);
					while($linha = $tabela->fetch_assoc()){		
				?>
						<tr>
							<th><?=$linha["nome"];?></th>
							<th><?=$linha["materia"];?></th>
							<th>
								<a href="index.php?id=<?=$linha["id"];?>">
									Editar
								</a>
							</th>
							<th>
								<a href="drop.php?id=<?=$linha["id"];?>" style="color: red">
									Excluir
								</a>
							</th>
						</tr>
		
				<?php				
					}
					mysqli_close($conexao);
				?>
			
			</tbody>
			<tr>
				<form action="search.php" method="POST">
					<th colspan=2>
						<input type="text" name= "search" class="form-control" placeholder="Filtrar" >
					</th>
					<th colspan=2 >
						<input type="submit"  class="btn btn-primary" style="background-color: green; width: 100%" value="buscar">
					</th>
				</form>
				
			</tr>
		
		</table>
		</div>
	 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  
  
	<script>
		
		$('#inputName').keypress(function(e) {
		  var keyCode = (e.keyCode ? e.keyCode : e.which); 
		  if (keyCode > 47 && keyCode < 58) {
			e.preventDefault();
		  }
		});
		
		$('#inputMateria').keypress(function(e) {
		  var keyCode = (e.keyCode ? e.keyCode : e.which); 
		  if (keyCode > 47 && keyCode < 58) {
			e.preventDefault();
		  }
		});
		
		
	</script>
  

  </body>
</html>