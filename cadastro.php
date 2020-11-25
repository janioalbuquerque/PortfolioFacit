<?php



session_start();
  
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 





#SE  NÃO EXISTIR SESSÃO USUARIO, VOLTAR PARA INDEX
if (!$_SESSION['usuario']) {
    header('location: index.php');
    exit();
}
  
  $id = $_SESSION['id_usuario'];

  if ($id != 11) {
    
    
    header('location: pages/painel/perfil.php');
  }







$pdo = new PDO("mysql:host=localhost;dbname=databaseportfolio", "root", "");#CONECTANDO AO BANCO DE DADOS
function post($par) {
    $$par = $_POST['$par'];
  }
if (isset($_POST['acao'])) {

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$nascimento = $_POST['nascimento'];
$cpf = $_POST['cpf'];
$sexo = $_POST['sexo'];
$curso = $_POST['curso'];
$turno = $_POST['turno'];
$periodo = $_POST['periodo'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];   
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$descricao = $_POST['descricao'];

$sql = $pdo->prepare("INSERT INTO `usuarios` (`usuario_id`, `usuario`, `senha`, `nome`, `sobrenome`, `nascimento`, `cpf`, `sexo`, `curso`, `turno`, `periodo`, `descricao`, `cidade`, `estado`) VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$sql->execute(array($usuario,$senha,$nome,$sobrenome,$nascimento,$cpf,$sexo,$curso,$turno,$periodo,$descricao,$cidade,$estado));#INSERINDO VALORES NO BANCO DE DADOS
echo "<script>alert('Usuario cadastrado com sucesso!');</script>";
}

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
           
              <form method="POST" action="backend/proc_upload.php" enctype="multipart/form-data">
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
        <a class="navbar-brand" href="#"><img src="img/logo-facit.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="sobre.php">Sobre<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="pages/projetos.php">Projetos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="backend/logout.php">Sair<span class="sr-only">(current)</span></a>
                </li>

                



            </ul>
        </div>
    </nav><!--FINALIZANDO MENU / NAVBAR-->

<div style="background-color: rgba(180, 198, 240,1);"  class=" container mt-5" >
<div style="text-align:center;"><h1>Cadastro de Usuarios</h1></div>
<div  class="flex-column col-12	col-sm-12	col-md-8 col-lg-12	col-xl-12">
    <form style="display: flex; flex-direction: row;"  method="post">

        <div style="padding: 5px; margin: 0 auto; width: 40%" class="item1 col-12	col-sm-12	col-md-6 col-lg-5	col-xl-5 ">
            
        <p>Nome</p>
        <input class="form-control" type="text" name="nome">

        <p>Sobrenome</p>
        <input class="form-control" type="text" name="sobrenome">

        <p>Data de nacimento</p>
        <div class="form-group">
          <input name="nascimento" class="form-control"  type="text" onfocus="(this.type='date')" onblur="(this.type='text' this.placeholder='<?php echo $data?>')">
        </div>

        <p>CPF</p>
        <input class="form-control" type="text" name="cpf">

        <p>Genero</p>
        <div class="form-group">
            <select  name="sexo" class=" form-control" id="exampleFormControlSelect1">
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>    
            </select>
        </div>

        <p>Curso</p>
        <div class="form-group">
            <select  name="curso" class=" form-control" id="exampleFormControlSelect1">
                <option value="ADS">ADS</option>
            </select>
        </div>

        <p>Turno</p>
        <div class="form-group">
            <select  name="turno" class=" form-control" id="exampleFormControlSelect1">
                <option value="Manhã">Manhã</option>
                <option value="Tarde">Tarde</option>
                <option value="Noite">Noite</option>    
            </select>
        </div>

        <p>Usuario</p>
        <input class="form-control mb-5" type="text" name="usuario">

    </div>

    <div class="item2 col-12	col-sm-12	col-md-6 col-lg-5	col-xl-5" style="padding: 5px; margin: 0 auto; width: 40%">
        <p>Periodo</p>
        <div class="form-group">
            <select  name="periodo" class=" form-control" id="exampleFormControlSelect1">
                <option value="1º Semestre">1º Semestre</option>
                <option value="2º Semestre">2º Semestre</option>
                <option value="3º Semestre">3º Semestre</option>
                <option value="4º Semestre">4º Semestre</option>
                <option value="5º Semestre">5º Semestre</option>
                <option value="Outro">Outro</option>
                  
            </select>
        </div>

        <p>Descricao</p>
        <textarea name="descricao" id="" cols="49" rows="5" ></textarea>

        <p>Cidade</p>
        <input class="form-control" type="text" name="cidade">

        <p>Estado</p>
        <input class="form-control" type="text" name="estado" >      

        <p>Senha</p>
        <input class="form-control" type="password" name="senha">

        <input style="background-color:#8e24aa; color: white;"class="form-control mt-5" type="submit" name="acao">
        
</div>
    
    </form>

  
	
	
</form>
</div>



</div>

       






        



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js " integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV " crossorigin="anonymous "></script>
        <script src="js/script.css "></script>

         <!---------------------INICIANDO FOOTER--------------------->
 <div class="card-group mt-5 mb-0 pb-0" style="background: radial-gradient(rgba(180, 198, 240,1), #8e24aa);">
  <div class="card" style="background-color: rgba(255, 255, 255,0);">
    
    <div class="card-body">
      <h5 class="card-title">Quem somos</h5>
      <p class="card-text">Somos o curso de Analise e Desenvolvimento da Faculdade de Ciências do Tocantins - FACIT.</p>
      <p class="card-text">©  2020 ADS. Todos os Direitos Reservados</p>
    </div>
  </div>
  <div class="card" style="background-color: rgba(255, 255, 255,0);">
    
    <div class="card-body">
      <h5 class="card-title">Contatos</h5>
      <p class="card-text">coord-ads@faculdadefacit.edu.br</p>
      <p class="card-text">https://www.instagram.com/ads.facit/</p>
      <p class="card-text">https://linktr.ee/ads.facit</p>

      
    </div>
  </div>
  <div class="card" style="background-color: rgba(255, 255, 255,0);">
   
    <div class="card-body">
      <h5 class="card-title">Sobre o Portfólio</h5>
      <p class="card-text">Este portfólio foi desenvolvido por acadêmicos do curso de
         análise e desenvolvimento de sistemas da Faculdade de Ciências do Tocantins - FACIT.</p>
      
    </div>
  </div>
</div>

                            <!---------------------FINALIZANDO FOOTER--------------------->
    
</body>
</html>