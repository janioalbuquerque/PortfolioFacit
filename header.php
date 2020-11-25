<?php
    session_start()#INICIANDO SESSÃO!!

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifolio - FACIT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>

<!--================================================-INICIAND MENU / NAVBAR--==========================================--->

    <nav class="navbar navbar-expand-lg navbar-light bg-roxo">
        <a class="navbar-brand" href="index.php"><img src="img/logo-facit.png" alt=""></a>
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


                                            <!--INICIANDO DROPDOWN / FORMULARIO DE LOGIN-->

                <li class="dropdown order-1 ">
                    <button style="color: white;" type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn dropdown-toggle bt-roxo">Entrar <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                        <li class="px-3 py-2">
                            <form action="backend/login.php" method="post" class="form bt-entrar" role="form">
                                <div class="form-group">
                                    <input name="usuario" id="emailInput" placeholder="Usuario" class="form-control form-control-sm " type="text " required=" ">
                                </div>
                                <div class="form-group ">
                                    <input name="senha" id="passwordInput " placeholder="Senha " class="form-control form-control-sm " type="password" required=" ">
                                </div>
                                <div class="form-group ">
                                    
                                    <button id="button"  name="acao" style="background-color: #8e24aa !important;" type="submit " class="btn bt-roxo btn-block text-white ">Entrar  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                                </div>
                                <?php
                                    if (isset($_SESSION['nao_autenticado'])): 
                                        #AUTENTICANDO USUARIO E SENHA
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Usuario ou senha invalidos.
                                </div>

                                <?php
                                    endif;
                                    unset($_SESSION['nao_autentocado']);  
                                ?>
                                <div class="form-group text-center ">
                                    <small><a href="# " data-toggle="modal " data-target="#modalPassword ">Esqueceu a senha?</a></small>
                                </div>
                            </form>
                        
                            
                        </li>
                    </ul>
                </li>
                                                  <!--FINALIZANDO DROPDOWN / FORMULARIO DE LOGIN-->



            </ul>
        </div>
    </nav>

<!--================================================-FINALIZANDO MENU / NAVBAR--==========================================--->
