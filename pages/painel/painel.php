<?php
 
  session_start();
  include('../../backend/verifica_login.php');#SE NÃO EXISTIR SESSÃO DE USUARIO, VAI LEVAR DE VOLTA PARA INDEX
  
  $id = $_SESSION['id_usuario'];
  header('location: perfil.php');

  $pdo = new PDO('mysql:host=localhost;dbname=databaseportfolio','root','');
$sql = $pdo->prepare("SELECT * FROM `usuarios` where `usuario_id` = '{$id}'");
  

  $sql->execute();

  $info = $sql->fetchAll();


  foreach ($info as $key => $value){
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - FACIT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
      h1 {
        color: black;
      }
    </style>
</head>
<body>

  <!--INICIANDO MENU / NAVBAR-->

<nav class="navbar navbar-expand-lg navbar-light bg-roxo">
        <a class="navbar-brand" href="#"><img src="../../img/logo-facit.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="#">Sobre<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="#">Contatos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../backend/logout.php">Sair<span class="sr-only">(current)</span></a>
                </li>

                



            </ul>
        </div>
    </nav><!--FINALIZANDO MENU / NAVBAR-->

    <!--INICIANDO MENU LATERAL / SIDEBAR-->

    <ul class="nav flex-column col-2 h-100 bg-roxo">
      <!--INICIANDO CARD DO USUARIO-->
      <div class="card bg-roxo mt-3 ml-2">
        <img class="card-img-top" style="border-radius: 50%; width: 200px; height: 200px;" src='../../img/painel/<?php echo $value['img_perfil']; ?>'>
        <div class="card-body">
          <h5 class="card-title"><?php echo $value['nome']." "; echo $value['sobrenome']; ?></h5>
          <li class="nav-item">
          <a class="nav-link active" href="perfil.php">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Trabalhos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="novo.php">Novo Trabalho</a>
        </li>
          
        </div>
      </div><!--FINALIZANDO CARD DO USUARIO-->
        
        
    </ul><!--FINALIZANDO MENU LATERAL / SIDEBAR-->
    <div>
      
    </div>
</body>

</body>


</html>

<?php }?>
