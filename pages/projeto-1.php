<?php
    
    include "header.php";



$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"databaseportifolio");

$qry = "SELECT * FROM trabalhosport WHERE id = 1";
$res = mysqli_query($conn,$qry);

while($fila = mysqli_fetch_array($res))


{


   






    
?>


<div style="text-align: justify;" class="w-100 p-2">
    <?php echo '<img style="width: 35%;" src="data:image/jpeg;base64,' . base64_encode( $fila['img_right'] ) . '" class="img-fluid float-right p-4 mt-5" alt="Responsive image">' ?>
    
        <?php echo '<h2 class="p-2">' . $fila["titulo"] . '</h2>' ; ?>
    
        <?php echo '<p>' . $fila["parag1"] . '</p>' ; ?>
    

        <?php echo '<p>' . $fila["parag2"] . '</p>' ; ?>

        <?php echo '<p>' . $fila["parag3"] . '</p>' ; ?>

        <?php echo '<img style="width: 35%;" src="data:image/jpeg;base64,' . base64_encode( $fila['img_left'] ) . '" class="img-fluid float-left p-4 mt-5" alt="Responsive image">' ?>

        <?php echo '<p>' . $fila["parag4"] . '</p>' ; ?>

        <?php echo '<p>' . $fila["parag5"] . '</p>' ; ?>

        <?php echo '<p>' . $fila["parag6"] . '</p>' ; ?>

        <?php echo '<p>' . $fila["parag7"] . '</p>' ; ?>

    <div class="container">
        <video style="margin: 0 auto;" class="mt-4 ml-5 video-01" width="90%" controls="">
         <source type="video/mp4" src="painel/uploads/videos/<?php echo $fila['video']?>">
        </video>
    </div>
    
    <div style="background-color: #B4C6F0;">

        <div class="container">
            
            <div class="slide hi-slide">
                <div style="margin-top: 25%;" class="hi-prev"></div>
                <div style="margin-top: 25%;" class="hi-next"></div>
                <ul>
                    
                    <li><img src="../img/01.jpg" alt="Img 1" /></li>
                    <li><img src="../img/02.jpg" alt="Img 2" /></li>
                    <li><img src="../img/03.jpg" alt="Img 3" /></li>
                    <li><img src="../img/banner-1.jpg" alt="Img 4" /></li>
                    <li><img src="../img/banner-2.jpg" alt="Img 5" /></li>
                    <li><img src="../img/banner-3.png" alt="Img 6" /></li>
                    <li><img src="../img/banner-21.jpg" alt="Img 7" /></li>
                    <li><img src="../img/banner-31.jpg" alt="Img 7" /></li>
                </ul>
            </div>
            
        </div>
    
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="js/jquery.hislide.js" ></script>
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

    include "footer.php";
}
?>


 
</body>

</body>


</html>


