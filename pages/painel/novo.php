<?php
 
  session_start();
  include('../../backend/verifica_login.php');#SE NÃO EXISTIR SESSÃO DE USUARIO, VAI LEVAR DE VOLTA PARA INDEX
  
  $id = $_SESSION['id_usuario'];


  $pdo = new PDO("mysql:host=localhost;dbname=login","root","");
  $sql = $pdo->prepare("SELECT * FROM `usuario` where `usuario_id` = '{$id}'");
  
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
    <div  style="width: 100%; height: 100%; display:flex; direction-flex: row;" class="cont">

    <ul id="sidebar"  style="height: 180%;" class="nav flex-column col-2 bg-roxo">
      <!--INICIANDO CARD DO USUARIO-->
      <div class="card bg-roxo mt-3 ml-2">
        <img class="card-img-top" style="border-radius: 50%; width: 200px; height: 200px;" src='../../img/painel/perfil/<?php echo $value['img_perfil']; ?>'>
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



    <div class="col-10" id="teste">
    <form enctype='multipart/form-data' class="novotrabalho mt-5" style="display: flex; flex-direction: column;"  method="post" action="upload.php">

    
    
      

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Titulo do Trabalho</label>
          <input style="width: 400px;" name="title" class="form-control"  type="text" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Descricao Reduzida para o Card</label>
          <textarea maxlength="100" name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div id="teste"></div>

      <div class="mt-5 mb-5" style="width: 100%; height: 15px; background-color:blueviolet;"></div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 1</label>
          <input style="width: 400px;" name="link_1" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 2</label>
          <input style="width: 400px;" name="link_2" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 3</label>
          <input style="width: 400px;" name="link_3" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 4</label>
          <input style="width: 400px;" name="link_4" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 4</label>
          <input style="width: 400px;" name="link_5" class="form-control"  type="url" >
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Capa do Trabalho para o Card</label>
            <div class="btn btn-primary btn-sm ">
            <input name="img_card" style="width: 400px;" type="file">
          </div>
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Video sobre o trabalho</label>
            <div class="btn btn-primary btn-sm ">
            <input name="video" style="width: 400px;" type="file">
          </div>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 1</label>
          <textarea maxlength="900" name="p1" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 2</label>
          <textarea maxlength="900" name="p2" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 3</label>
          <textarea maxlength="900" name="p3" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 4</label>
          <textarea maxlength="900" name="p4" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 5</label>
          <textarea maxlength="900" name="p5" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 6</label>
          <textarea maxlength="900" name="p6" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Paragrafo 7</label>
          <textarea maxlength="900" name="p7" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Imagem esquerda</label>
            <div class="btn btn-primary btn-sm ">
            <input style="width: 400px;" type="file" name="img_left">
          </div>
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">TESTE</label>
            <div class="btn btn-primary btn-sm ">
            <input style="width: 400px;" type="file" name="teste">
          </div>
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Imagem direita</label>
            <div class="btn btn-primary btn-sm ">
            <input style="width: 400px;" type="file" name="img_right">
          </div>
      </div>






      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1"> Imagens para a galeria</label>
          <div class="btn btn-primary btn-sm ">
            <input id='fileToUpload' class='file-input' type='file' name='arquivo[]' multiple />
            <ul id="dp-files"></ul>
          </div>
      </div>





     

      

      <button value="Postar trabalho" name="acao"  style="width: 30%; margin: 0 auto;" type="submit" class="btn btn-primary mb-2 mt-5">Confirmar Postagem</button>

      
     

      

      
        
        
        
        
        
        
        

    
    </form>

           <script>
                          let teste = document.getElementById('teste');
                          let tamanho = document.defaultView.getComputedStyle(teste, null).getPropertyValue('height');
                          let sidebar = document.getElementById('sidebar');
                          sidebar.setAttribute('style', 'height: calc(250% + ' + tamanho + ');');
                           
                            
                      </script>

               
          

    

    
    </div>

    </div><!--container-->
    
  
</body>

</body>


</html>

<?php  }  



?>



