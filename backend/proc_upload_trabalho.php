<?php
			session_start();

			$id = $_SESSION['id_usuario'];

			include_once("conexao.php");
			$arquivo 	= $_FILES['arquivo']['name'];
			
			$_UP['pasta'] = '../img/painel/perfil/';
			
			
			
				
					
					$nome_final = md5($_FILES['arquivo']['name']).'.jpg';
				
				
				move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final);

				$pdo = new PDO("mysql:host=localhost;dbname=login","root","");
  				$sql = $pdo->prepare("UPDATE `usuario` SET `img_perfil` = '$nome_final' WHERE `usuario`.`usuario_id` = '{$id}'");

				$sql->execute();
					
					
				header('location: ../pages/painel/perfil.php');
			
			
			
		?>