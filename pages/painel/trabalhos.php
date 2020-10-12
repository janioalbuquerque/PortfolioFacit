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
         $dados[$i] = $value['$dados[$i]'];
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
    <script src="script.js"></script>
    <style>
      h1 {
        color: black;
      }
    </style>
</head>
<body>

<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Escolha um arquivo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           
              <form method="POST" action="../../backend/proc_upload.php" enctype="multipart/form-data">
                Imagem: <input name="arquivo" type="file"><br><br>
                
                <input  class="btn btn-secondary" type="submit" value="Cadastrar">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
             
            </div>
          </div>
        </div>
      </div>

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
        <img  class="card-img-top" style="border-radius: 50%; width: 200px; height: 200px;" src='../../img/painel/perfil/<?php echo $value['img_perfil']; ?>'>
        <button type="button" class="btn " data-toggle="modal" data-target="#modalExemplo">
          Alterar foto
        </button>
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
        <div class="input-group mb-3 mt-3">
          <input type="text" class="form-control" placeholder="Pesquise o trabalho!" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button name="btok" class="btn btn-outline-secondary" type="button">Pesquisar</button>
          </div>
        </div>

        <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Titulo do Trabalho" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Data de Publicação" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Descrição" disabled></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Trabalho 01</td>
                        <td>01/05/2020</td>
                        <td>Descrição projeto 01</td>
                        <th>Edit</th>
                       <th>Delete</th>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Trabalho 02</td>
                        <td>01/05/2020</td>
                        <td>Descrição projeto 01</td>
                        <th>Edit</th>
                       <th>Delete</th>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Trabalho 03</td>
                        <td>01/05/2020</td>
                        <td>Descrição projeto 01</td>
                        <th>Edit</th>
                       <th>Delete</th>
                    </tr>
                </tbody>
            </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>

</body>


</html>

<?php  }  ?>