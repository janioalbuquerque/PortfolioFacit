<?php

$pdo = new PDO("mysql:host=localhost;dbname=login", "root", "");#CONECTANDO AO BANCO DE DADOS
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

$sql = $pdo->prepare("INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`, `nome`, `sobrenome`, `nascimento`, `cpf`, `sexo`, `curso`, `turno`, `periodo`, `descricao`, `cidade`, `estado`) VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$sql->execute(array($usuario,$senha,$nome,$sobrenome,$nascimento,$cpf,$sexo,$curso,$turno,$periodo,$descricao,$cidade,$estado));#INSERINDO VALORES NO BANCO DE DADOS
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro Usuario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-bottom: 40px;
        }

        p {
            font: 22px normal Arial;
        }


        input {
            width: 100%;
            height: 25px;
            margin-bottom: 25px;
        }

    </style>
</head>
<body>

<div  class="container" >
<div style="text-align:center;"><h1>Cadastro de Usuarios</h1></div>
    <form style="display: flex; flex-direction: row"  method="post">
        <div style="padding: 5px; margin: 0 auto; width: 40%" class="ietm1">
            
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
        <input class="form-control" type="text" name="usuario">

    </div>

<div class="item2" style="padding: 5px; margin: 0 auto; width: 40%">
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
        <textarea name="descricao" id="" cols="60" rows="5" ></textarea>

        <p>Cidade</p>
        <input class="form-control" type="text" name="cidade">

        <p>Estado</p>
        <input class="form-control" type="text" name="estado" >      

        <p>Senha</p>
        <input class="form-control" type="password" name="senha">

        <input class="form-control" type="submit" name="acao">
        
</div>
    
    </form>

  
	
	
</form>
</div>
    
</body>
</html>