<?php
 
  session_start();
  include('../../backend/verifica_login.php');#SE NÃO EXISTIR SESSÃO DE USUARIO, VAI LEVAR DE VOLTA PARA INDEX
  
  $id = $_SESSION['id_usuario'];


  $pdo = new PDO("mysql:host=localhost;dbname=databaseportfolio","root","");
  $sql = $pdo->prepare("SELECT * FROM `usuarios` where `usuario_id` = '{$id}'");
  

  $sql->execute();
  

  

  



$info = $sql->fetchAll();


foreach ($info as $key => $value) {?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - FACIT</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   
   
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    
    

    <script src="js/submit.js"></script>
    
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
                    <a class="nav-link text-white" href="../../index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../sobre.php">Sobre<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../projetos.php">Projetos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../backend/logout.php">Sair<span class="sr-only">(current)</span></a>
                </li>

                



            </ul>
        </div>
    </nav><!--FINALIZANDO MENU / NAVBAR-->

        

     <!--INICIANDO MENU LATERAL / SIDEBAR-->
     <div  style="width: 100%; display:flex !important; flex-direction: row; min-height: 100%;" class="cont sidebar" id="sidebarok">

<ul id=""  class="nav flex-column col-12	col-sm-12	col-md-4 col-lg-2	col-xl-2 bg-roxo ul-sidebar">
  <!--INICIANDO CARD DO USUARIO-->
  <div class="card bg-roxo mt-3 ml-2">
    <img class="card-img-top" style="border-radius: 50%; max-width: 200px; max-height: 200px;" src='../../img/painel/perfil/<?php echo $value['img_perfil']; ?>'>
    <div class="card-body">
      <h5 class="card-title"><?php echo $value['nome']." "; echo $value['sobrenome']; ?></h5>
      <li class="nav-item">
      <a class="nav-link active" href="perfil.php">Perfil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="trabalhos.php">Trabalhos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="novo.php">Novo Trabalho</a>
    </li>
      
    </div>
  </div><!--FINALIZANDO CARD DO USUARIO-->
    
    
</ul><!--FINALIZANDO MENU LATERAL / SIDEBAR-->

    <div class="flex-column col-12	col-sm-12	col-md-8 col-lg-10	col-xl-10" id="teste">
      <form method="post">
        <div class="input-group mb-3 mt-3">
          <input name="valor" type="text" class="form-control" placeholder="Pesquise o trabalho!" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <input name="btok" class="btn btn-outline-secondary" type="submit" value="Pesquisar"></input>
          </div>
        </div>
      </form>
        <div class="table-responsive">

          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Publicação</th>
                <th> </th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              
              
              
              
              <?php
                  
                  $sql2 = $pdo->prepare("SELECT id,titulo,`data`, `desc`, `video` FROM `trabalhosport`");
                  $sql2->execute();
                  
                  if (isset($_POST['btok'])) {
                    $valor = $_POST['valor'];
                    $sql2 = $pdo->prepare("SELECT id,titulo, `video`, `data`, `desc` FROM `trabalhosport` WHERE
                    CONCAT_WS( ' ', id,  titulo,  `data`,  `desc` ) LIKE '%$valor%'");
                    $containergeral = "";
                    
                  }
                  $sql2->execute();
                  $info_trabalhos = $sql2->fetchAll();
                  

                  foreach ($info_trabalhos as $key => $trabalhos) {
                    
                    
                    $x = $key+1;
                    
                    
                    
                    $containergeral = '<div class="container-geral">
                    <form method="post">
                    <tr>
                    <td>'. $x .'</td>
                    <td>'. $trabalhos['titulo'] .'</td>
                    <td>'. $trabalhos['data'] .'</td>
                    <th><a href="projetos/'.substr($trabalhos['video'], 0 ,14).'.php" class="btn btn-dark">Visualizar</a></th>
                 
                    <th><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#a'.substr($trabalhos['video'], 0 ,14).'">Excluir</a></th>
                    </tr>
                    
                    
                    </form>
                    
                    
                    
                     <div class="modal fade" id="a'.substr($trabalhos['video'], 0 ,14).'" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                                  </div>
                                  <div class="modal-body">
                                    Deseja realmente excluir este item:<br> <strong>'. $trabalhos['titulo'].'</strong>
                                  </div>
                                  <div class="modal-footer">
                                  <form method="post">
                                    <input name="'.substr($trabalhos['video'], 0 ,14).'" type="submit" class="btn btn-primary" value="Sim">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                                  </form>
                                  
                                  </div>
                                </div>
                              </div>
                              </div> <!-- /.modal -->
                              
                              </div><!--containner-geral-->';

                 echo $containergeral;

                 if (isset($_POST[substr($trabalhos['video'], 0 ,14)])) {
                   $deletar = substr($trabalhos['video'], 0 ,14);
                   $sql3 = $pdo->prepare("DELETE FROM `trabalhosport` WHERE video = $deletar");
                   $sql3->execute();
                   @header('location: trabalhos.php');
                 };};?>

                    
                   
                  </tbody>
                </table>

        </div>

     
        </div>
              
              

    
<script>
                          let teste = document.getElementById('teste');
                          let tamanho = document.defaultView.getComputedStyle(teste, null).getPropertyValue('height');
                          let sidebar = document.getElementById('sidebarok');
                          var w = window;
                          let x = w.innerWidth;
                         
                          if (x > 677) {
                            
                            sidebar.setAttribute('style', 'height:' + tamanho + ' !important; display: flex;');
                          }

                         
                           
                            
                      </script>
</body>

</body>


</html>

<?php  }  ?>