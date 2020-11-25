<?php
 
  session_start();
  include('../../backend/verifica_login.php');#SE NÃO EXISTIR SESSÃO DE USUARIO, VAI LEVAR DE VOLTA PARA INDEX
  
  $id = $_SESSION['id_usuario'];


  $pdo = new PDO("mysql:host=localhost;dbname=databaseportfolio","root","");
  $sql = $pdo->prepare("SELECT * FROM `usuarios` where `usuario_id` = '{$id}'");
  
  $sql->execute();

    
$info = $sql->fetchAll();


foreach ($info as $key => $value) {


  $data = $value['nascimento'];
  $data = date('d/m/Y', strtotime($data));

  


 


  

  
      


  
?>





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - FACIT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    
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
    <div  style="width: 100%; display:flex !important; flex-direction: row;" class="cont sidebar" id="sidebarok">

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
    <form enctype='multipart/form-data' class="novotrabalho mt-5" style="display: flex; flex-direction: column;"  method="post" action="upload.php">

    
    
      <div class="item1">

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Titulo do Trabalho</label>
          <input style="max-width: 400px;" name="title" class="form-control"  type="text" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Descricao Reduzida para o Card</label>
          <textarea maxlength="400" name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div id="teste"></div>

      <div class="mt-5 mb-5" style="width: 100%; height: 15px; background-color:blueviolet;"></div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 1</label>
          <input style="max-width: 400px;" name="link_1" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 2</label>
          <input style="max-width: 400px;" name="link_2" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 3</label>
          <input style="max-width: 400px;" name="link_3" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 4</label>
          <input style="max-width: 400px;" name="link_4" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 5</label>
          <input style="max-width: 400px;" name="link_5" class="form-control"  type="url" >
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Capa do Trabalho para o Card</label>
            <div class="btn btn-primary btn-sm ">
            <input name="img_card" style="max-width: 400px;" type="file">
          </div>
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Video sobre o trabalho</label>
            <div class="btn btn-primary btn-sm ">
            <input name="video" style="max-width: 400px;" type="file">
          </div>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 1</label>
          <textarea maxlength="800" name="p1" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 2</label>
          <textarea maxlength="800" name="p2" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 3</label>
          <textarea maxlength="800" name="p3" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 4</label>
          <textarea maxlength="800" name="p4" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 5</label>
          <textarea maxlength="800" name="p5" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 6</label>
          <textarea maxlength="800" name="p6" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 7</label>
          <textarea maxlength="800" name="p7" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Imagem esquerda</label>
            <div class="btn btn-primary btn-sm ">
            <input style="max-width: 400px;" type="file" name="img_left">
          </div>
      </div>


      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Imagem direita</label>
            <div class="btn btn-primary btn-sm ">
            <input style="max-width: 400px;" type="file" name="img_right">
          </div>
      </div>






      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1"> Imagens para a galeria</label>
          <div class="btn btn-primary btn-sm ">
            <input id='fileToUpload' class='file-input' type='file' name='arquivo[]' multiple />
            <ul id="dp-files"></ul>
          </div>
      </div>





     

      

      <button data-toggle="modal" data-target="#exampleModal" value="Postar trabalho" name="acao"  style="width: 30%; margin: 0 auto;" type="submit" class="btn btn-primary mb-2 mt-5">Confirmar Postagem</button>

      
     
      </div><!--item1-->  
      

      
        
        
        
        
        
        
        

    
    </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js " integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV " crossorigin="anonymous "></script>

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

               
          


<!-- Modal -->
<div   class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="font-size: 24px;" class="modal-dialog" role="document">
   
  <span style="text-align: center; margin: 25% auto; width: 100%; height: 100%; font-size: 240px;" class="fa fa-spinner fa-spin fa-5x"></span>
    
  </div>
</div>

    
    </div>

    </div><!--container-->
    
  
</body>

</body>


</html>

<?php  }  



?>



