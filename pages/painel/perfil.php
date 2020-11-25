<?php
 
  session_start();
  
  include('../../backend/verifica_login.php');#SE NÃO EXISTIR SESSÃO DE USUARIO, VAI LEVAR DE VOLTA PARA INDEX
  
  $id = $_SESSION['id_usuario'];


  $pdo = new PDO("mysql:host=localhost;dbname=databaseportfolio","root","");
  $sql = $pdo->prepare("SELECT * FROM `usuarios` where `usuario_id` = '{$id}'");
  
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
        
          $dados[$i] = $value["$dados[$i]"];
       }else{
          
          $sql2 = $pdo->prepare("UPDATE `usuarios` SET {$dados2[$i]} = '{$dados[$i]}' WHERE `usuario_id` = '{$id}'");
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
                    <a class="nav-link text-white" href="../../index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../sobre.php">Sobre<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../pages/projetos.php">Projetos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../backend/logout.php">Sair<span class="sr-only">(current)</span></a>
                </li>

                



            </ul>
        </div>
    </nav><!--FINALIZANDO MENU / NAVBAR-->

        

    <!--INICIANDO MENU LATERAL / SIDEBAR-->
    <div style="width: 100%; height: 100%; display:flex; flex-direction: row;" class=" sidebar cont">

    <ul class="nav flex-column col-12	col-sm-12	col-md-4 col-lg-2	col-xl-2 h-100 bg-roxo ul-sidebar">
      <!--INICIANDO CARD DO USUARIO-->
      <div class="card bg-roxo mt-3">
        <img  class="card-img-top" style="border-radius: 50%; max-width: 200px; max-height: 200px;" src='../../img/painel/perfil/<?php echo $value['img_perfil']; ?>'>
        <button type="button" class="btn " data-toggle="modal" data-target="#modalExemplo">
          Alterar foto
        </button>
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
        <li class="nav-item">
          <a class="nav-link" href="../../cadastro.php">Novo Usuário</a>
        </li>
          
        </div>
      </div><!--FINALIZANDO CARD DO USUARIO-->
        
        
    </ul><!--FINALIZANDO MENU LATERAL / SIDEBAR-->



    <div  class="flex-column col-12	col-sm-12	col-md-8 col-lg-10	col-xl-10">
    <form style="display: flex; flex-direction: row;"  method="post">

        <div style="padding: 5px; margin: 0 auto; width: 40%" class="item1 col-12	col-sm-12	col-md-6 col-lg-5	col-xl-5 mt-5">
         
        <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Nome</label>
          <input name="nome" class="form-control" placeholder='<?php echo $value["nome"];?>' type="text" >
        </div>

        <div class="form-group">
         <label class="h6" for="exampleFormControlInput1">Sobrenome</label>
          <input name="sobrenome" class="form-control" placeholder='<?php echo $value["sobrenome"];?>' type="text">
        </div>

        <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Nascimento</label>
          <input name="nascimento" class="form-control" placeholder='<?php echo $data?>' type="text" onfocus="(this.type='date')" onblur="(this.type='text' this.placeholder='<?php echo $data?>')">
        </div>

        <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">CPF</label>
          <input name="cpf" class="form-control" placeholder='<?php echo $value["cpf"];?>' type="text">
        </div>

        <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Genero</label>
          <select name="sexo" class=" form-control" id="exampleFormControlSelect1">
                <option <?=($value["sexo"] == 'Masculino')?'selected':''?> value="Masculino">Masculino</option>
                <option <?=($value["sexo"] == 'Feminino')?'selected':''?> value="Feminino">Feminino</option>
                <option <?=($value["sexo"] == 'Outro')?'selected':''?> value="Outro">Outro</option>    
            </select>
          
        </div>

        <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Curso</label>
          <select placeholder='<?php echo $value["curso"];?>'  name="curso" class=" form-control" id="exampleFormControlSelect1">
                <option value="ADS">ADS</option>
            </select>
         
        </div>

      
       
    </div>
<div class="item2 col-12	col-sm-12	col-md-6 col-lg-5	col-xl-5" style="padding: 5px; margin: 0 auto; width: 40%">

        <div class="form-group mt-5 ">
          <label class="h6" for="exampleFormControlInput1">Turno</label>
          <select name="turno" class=" form-control" id="exampleFormControlSelect1">
                <option <?=($value["turno"] == 'Manhã')?'selected':''?> value="Manhã">Manhã</option>
                <option <?=($value["turno"] == 'Tarde')?'selected':''?> value="Tarde">Tarde</option>
                <option <?=($value["turno"] == 'Noite')?'selected':''?> value="Noite">Noite</option>    
            </select>
         
        </div>


        <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Periodo</label>
          <select name="periodo" class=" form-control" id="exampleFormControlSelect1">
                <option <?=($value["periodo"] == '1º Semestre')?'selected':''?> value="1º Semestre">1º Semestre</option>
                <option <?=($value["periodo"] == '2º Semestre')?'selected':''?> value="2º Semestre">2º Semestre</option>
                <option <?=($value["periodo"] == '3º Semestre')?'selected':''?> value="3º Semestre">3º Semestre</option>
                <option <?=($value["periodo"] == '4º Semestre')?'selected':''?> value="4º Semestre">4º Semestre</option>
                <option <?=($value["periodo"] == '5º Semestre')?'selected':''?> value="5º Semestre">5º Semestre</option>
                <option <?=($value["periodo"] == 'Outro')?'selected':''?> value="Outro">Outro</option>
                  
            </select>
        </div>

        <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Descricao</label>
          <textarea name="descricao" placeholder='<?php echo $value["descricao"];?>' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Cidade</label>
          <input name="cidade" class="form-control" placeholder='<?php echo $value["cidade"];?>' type="text">
        </div>

        <div class="form-group">
          <label class="h6" for="exampleFormControlInput1">Estado</label>
          <input name="estado" class="form-control" placeholder='<?php echo $value["estado"];?>' type="text">
        </div>

        


        

        <button name="acao" id="button" style="background-color: #8e24aa;" type="submit " class="btn bt-roxo btn-block text-white ">Alterar</span></button>


        
        
        
        
        
        
        
        
</div>
    
    </form>
    </div>

    </div><!--container-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>

</body>


</html>

<?php  }  ?>
