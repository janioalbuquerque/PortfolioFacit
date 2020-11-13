<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	</body>
		<?php
			session_start();

			$id = $_SESSION['id_usuario'];

			include_once("conexao.php");
			$arquivo 	= $_FILES['arquivo']['name'];
			
			$_UP['pasta'] = '../img/painel/perfil/';
			
			
			
				
					
					$nome_final = md5($_FILES['arquivo']['name']).'.jpg';
				
				
				move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final);

				$pdo = new PDO("mysql:host=localhost;dbname=databaseportfolio","root","");
  				$sql = $pdo->prepare("UPDATE `usuarios` SET `img_perfil` = '$nome_final' WHERE `usuarios`.`usuario_id` = '{$id}'");

				$sql->execute();
					
					
				header('location: ../pages/painel/perfil.php');
			
			
			
		?>
		
	</body>
</html>