<?php
 
  session_start();
  include('../../backend/verifica_login.php');#SE NÃO EXISTIR SESSÃO DE USUARIO, VAI LEVAR DE VOLTA PARA INDEX
  
  $id = $_SESSION['id_usuario'];


  $pdo = new PDO("mysql:host=localhost;dbname=login","root","");
  $sql = $pdo->prepare("SELECT * FROM `usuario` where `usuario_id` = '{$id}'");
  $sql->execute();

if (isset($_POST['acao'])):

  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $nascimento = $_POST['nascimento'];
  $cpf = $_POST['cpf'];
  $sexo = $_POST['sexo'];
  $curso = $_POST['curso'];
  $turno = $_POST['turno'];
  $periodo = $_POST['periodo'];
  $descricao = $_POST['descricao'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];

endif;

$info = $sql->fetchAll();


foreach ($info as $key => $value) {


  $data = $value['nascimento'];
  $data = date('d/m/Y', strtotime($data));

  if (isset($_POST['acao'])):
    $dados = [$nome,$sobrenome,$nascimento,$cpf,$sexo,$curso,$turno,$periodo,$descricao,$cidade,$estado];
    $dados2= ['nome','sobrenome','nascimento','cpf','sexo','curso','turno','periodo','descricao','cidade','estado'];

      for ($i=0; $i < 11; $i++) { 
       if (empty($dados[$i])) {
         $dados[$i] = $_value['$dados[$i]'];
       }else{
      

  $sql2 = $pdo->prepare("UPDATE `usuario` SET {$dados2[$i]} = '{$dados[$i]}' WHERE `usuario_id` = '{$id}'");
  $sql2->execute();
       }
   
   header('location: perfil.php');
      }
      
  endif;

  
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - FACIT</title>
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
    <div style="width: 100%; height: 100%; display:flex; direction-flex: row;" class="cont">

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



    <div class="col-10 ">
    <form class="novotrabalho mt-5" style="display: flex; flex-direction: column;"  method="post">

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Titulo do Trabalho</label>
          <input style="width: 400px;" name="nome" class="form-control"  type="text" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Descricao Reduzida para o Card</label>
          <textarea name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

       <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Descricao reduzida do Trabalho</label>
          <textarea name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Capa do Trabalho para o Card</label>
            <div class="btn btn-primary btn-sm ">
            <input style="width: 400px;" type="file">
          </div>
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Trabalho em formato PDF</label>
            <div class="btn btn-primary btn-sm ">
            <input style="width: 400px;" type="file">
          </div>
      </div>

     
        
        
        
        
        
        
        

    
    </form>
    </div>

    </div><!--container-->
    
</body>

</body>


</html>

<?php  }  ?>
