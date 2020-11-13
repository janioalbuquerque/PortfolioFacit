




























<?php
    
   
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"databaseportfolio");


$qry = "SELECT * FROM trabalhosport WHERE video = '20201103202906.mp4'";
$res = mysqli_query($conn,$qry);

while($fila = mysqli_fetch_array($res))


{


   


    



    
?>

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
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../painel/css/carousel.css">
    <script src="../js/script.js"></script>
</head>

<body>

<!--================================================-INICIAND MENU / NAVBAR--==========================================--->

    <nav class="navbar navbar-expand-lg navbar-light bg-roxo">
        <a class="navbar-brand" href="../../../index.php"><img src="../../../img/logo-facit.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../../index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../../sobre.php">Sobre<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../projetos.php">Projetos<span class="sr-only">(current)</span></a>
                </li>


                                            <!--INICIANDO DROPDOWN / FORMULARIO DE LOGIN-->

                <li class="dropdown order-1 ">
                    <button style="color: white;" type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn dropdown-toggle bt-roxo">Entrar <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                        <li class="px-3 py-2">
                            <form action="../../../backend/login.php" method="post" class="form bt-entrar" role="form">
                                <div class="form-group">
                                    <input name="usuario" id="emailInput" placeholder="Usuario" class="form-control form-control-sm " type="text " required=" ">
                                </div>
                                <div class="form-group ">
                                    <input name="senha" id="passwordInput " placeholder="Senha " class="form-control form-control-sm " type="password" required=" ">
                                </div>
                                <div class="form-group ">
                                    
                                    <button id="button"  name="acao" style="background-color: #8e24aa;" type="submit " class="btn bt-roxo btn-block text-white ">Entrar  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
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


<div style="text-align: justify;" class="w-100 p-2">
    <?php echo '<img style="width: 500px; height: 350px !important;" src="data:image/jpeg;base64,' . base64_encode( $fila['img_right'] ) . '" class="img-fluid float-right p-4 mt-2" alt="Responsive image">' ?>
    
        <?php echo '<h2 class="p-2">' . $fila["titulo"] . '</h2>' ; ?>
    
        <?php echo '<p>' . $fila["parag1"] . '</p>' ; ?>
    

        <?php echo '<p>' . $fila["parag2"] . '</p>' ; ?>

        <?php echo '<p>' . $fila["parag3"] . '</p>' ; ?>

        <?php echo '<img style="width: 500px; height: 350px !important;" src="data:image/jpeg;base64,' . base64_encode( $fila['img_left'] ) . '" class="img-fluid float-left p-4 mt-5" alt="Responsive image">' ?>

        <?php echo '<p>' . $fila["parag4"] . '</p>' ; ?>

        <?php echo '<p>' . $fila["parag5"] . '</p>' ; ?>

        <?php echo '<p>' . $fila["parag6"] . '</p>' ; ?>

        <?php echo '<p>' . $fila["parag7"] . '</p>' ; ?>

    <div class="container">
        <video style="margin: 0 auto;" class="mt-4 ml-5 video-01" width="90%" controls="">
         <source type="video/mp4" src="../../painel/uploads/videos/<?php echo $fila['video']?>">
        </video>
    </div>
    
    <div style="background-color: #B4C6F0;">

        <div class="container">
            
            <div class="slide hi-slide">
                <div style="margin-top: 25%;" class="hi-prev"></div>
                <div style="margin-top: 25%;" class="hi-next"></div>
                <ul>
                    
                    <li><?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $fila['img1'] ) . '" alt="Img 1" />'?></li>
                    <li><?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $fila['img2'] ) . '" alt="Img 2" />'?></li>
                    <li><?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $fila['img3'] ) . '" alt="Img 3" />'?></li>
                    <li><?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $fila['img4'] ) . '" alt="Img 4" />'?></li>
                    <li><?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $fila['img5'] ) . '" alt="Img 5" />'?></li>
                    <li><?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $fila['img6'] ) . '" alt="Img 6" />'?></li>
                    <li><?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $fila['img7'] ) . '" alt="Img 7" />'?></li>
                    <li><?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $fila['img8'] ) . '" alt="Img 8" />'?></li>
                </ul>
            </div>
            
        </div>
    
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.hislide.js" ></script>
		<script>
			$('.slide').hiSlide();
	</script>

</div>
       
 
    
    <h3 class="mt-5">Links:</h3>

    <a href="#"><?php echo $fila['link1']?></a> <br>
    <a href="#"><?php echo $fila['link2']?></a> <br>
    <a href="#"><?php echo $fila['link3']?></a> <br>
    <a href="#"><?php echo $fila['link4']?></a> <br>
    <a href="#"><?php echo $fila['link5']?></a> <br>
</div>

<?php

                                }
?>


 
                                    <!---------------------INICIANDO FOOTER--------------------->
    <div class="card-group mt-5" style="background: radial-gradient(rgba(180, 198, 240,1), #8e24aa);">
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
   

       






        



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js " integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV " crossorigin="anonymous "></script>
      
</body>

</html>







































