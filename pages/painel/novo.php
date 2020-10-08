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
    <script src="script.js"></script>
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



    <div class="col-10 ">
    <form class="novotrabalho mt-5" style="display: flex; flex-direction: column;"  method="post">

    <div class="form-group">
            <label class="h6 d-block" for="exampleFormControlInput1">Quantas imagens vão ter na galeria?</label>
            <div class="btn  btn-sm">
              <input name="num_img" type="number">
             
             </div>
          
            <label class="h6 d-block" for="exampleFormControlInput1">Quantos paragrafos vão ter o Post?</label>
            <div class="btn  btn-sm">
              <input name="num" type="number"> <br>
              <input class="mt-2" style="float: left;" type="submit" name="acao_1" value="Gerar">
             </div>

    </div>
          
      

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Titulo do Trabalho</label>
          <input style="width: 400px;" name="nome" class="form-control"  type="text" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Descricao Reduzida para o Card</label>
          <textarea maxlength="100" name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div id="teste"></div>

      <div class="mt-5 mb-5" style="width: 100%; height: 15px; background-color:blueviolet;"></div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 1</label>
          <input style="width: 400px;" name="nome" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 2</label>
          <input style="width: 400px;" name="nome" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 3</label>
          <input style="width: 400px;" name="nome" class="form-control"  type="url" >
      </div>

      <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Link 4</label>
          <input style="width: 400px;" name="nome" class="form-control"  type="url" >
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Capa do Trabalho para o Card</label>
            <div class="btn btn-primary btn-sm ">
            <input style="width: 400px;" type="file">
          </div>
      </div>

      <div class="form-group file-field">
          <label class="h6 d-block" for="exampleFormControlInput1">Video sobre o trabalho</label>
            <div class="btn btn-primary btn-sm ">
            <input style="width: 400px;" type="file">
          </div>
      </div>

      <button style="width: 30%; margin: 0 auto;" type="submit" class="btn btn-primary mb-2 mt-5">Confirmar Postagem</button>

      

      
        
        
        
        
        
        
        

    
    </form>

            <?php
            
                if (isset($_POST['acao_1'])) {


                  
                  $num = $_POST['num'];
                  if($num > 0 ) {
                    for ($i=1; $i <= $num ; $i++) { 
                     
                    
                      echo "<script> 

                              let textarea$i = document.createElement('div','');
                              textarea$i.setAttribute('name', 'div$i');
                              textarea$i.style.padding = '15px';
                              var frase$i = document.createTextNode(`Paragrafo Numero $i:`); 
                              let text$i = document.createElement('textarea','');
                              text$i.name = 'paragrafo$i';
                              text$i.style.width = '90%';
                              let teste$i = document.getElementById('teste');
                              textarea$i.appendChild(frase$i);
                              textarea$i.appendChild(text$i);
                              teste$i.appendChild(textarea$i);
                              
                            

                      
                            </script>";

                            
                      }

                      $num_img = $_POST['num_img'];
                      if($num_img > 0 ) {
                      for ($i_img=1; $i_img <= $num_img ; $i_img++) { 
                     
                    
                      echo "<script> 

                              let img$i_img = document.createElement('div','');
                              img$i_img.setAttribute('name', 'img$i_img');
                              img$i_img.style.padding = '15px';
                              var frase_img$i_img = document.createTextNode(`Imagem numero $i_img:`); 
                              let text_img$i_img = document.createElement('input','');
                              text_img$i_img.name = 'imagem_galeria$i_img';
                              text_img$i_img.setAttribute('type', 'file');
                              text_img$i_img.style.width = '90%';
                              let teste_img$i_img = document.getElementById('teste');
                              img$i_img.appendChild(frase_img$i_img);
                              img$i_img.appendChild(text_img$i_img);
                              teste_img$i_img.appendChild(img$i_img);
                              
                            

                      
                            </script>";

                            
                      }

                      
                }

                echo "<script>
                
                          let tamanho = document.defaultView.getComputedStyle(teste, null).getPropertyValue('height');
                          let sidebar = document.getElementById('sidebar');
                          sidebar.setAttribute('style', 'height: calc(180% + ' + tamanho + ');');
                           
                            
                      </script>";

               
              }
            }

            ?>

    

    
    </div>

    </div><!--container-->
    
    
</body>

</body>


</html>

<?php  }  ?>
