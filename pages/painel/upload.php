<?php


function foo ($arg_1, &$arg_2)
{
  $arquivo = $_FILES["$arg_1"]["tmp_name"]; 
  $tamanho = $_FILES["$arg_1"]["size"];
  $fp = fopen($arquivo, "rb");
  $conteudo = fread($fp, $tamanho);
  $arg_2 = addslashes($conteudo);
  fclose($fp); 
}



foo('img_card',$img_card);
foo('img_right',$img_right);
foo('img_left',$img_left);
foo('video',$video);







for ($i=0; $i < 10; $i++) { 


    $arquivo = $_FILES["arquivo"]["tmp_name"][$i]; 
    $tamanho = $_FILES["arquivo"]["size"][$i];
    $fp = fopen($arquivo, "rb");
    $conteudo = fread($fp, $tamanho);
    $img[$i] = addslashes($conteudo);
    fclose($fp); 


}








  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $link_1 = $_POST['link_1'];
  $link_2 = $_POST['link_2'];
  $link_3 = $_POST['link_3'];
  $link_4 = $_POST['link_4'];
  $link_5 = $_POST['link_5'];
  $p1 = $_POST['p1'];
  $p2 = $_POST['p2'];
  $p3 = $_POST['p3'];
  $p4 = $_POST['p4'];
  $p5 = $_POST['p5'];
  $p6 = $_POST['p6'];
  $p7 = $_POST['p7'];
  


   
    



  $pdo = new PDO("mysql:host=localhost;dbname=databaseportifolio","root","");


  $sql = $pdo->prepare("INSERT INTO `trabalhosport` (`id`, `data`, `titulo`,`desc`, `parag1`, `parag2`, `parag3`, `parag4`, `parag5`, `parag6`, `parag7`,`img_card`,`img_right`,`img_left`,`img1`,`img2`,`img3`,`img4`,`img5`,`img6`,`img7`,`img8`,`img9`,`img10`, `video`, `link1`, `link2`, `link3`, `link4`, `link5`) VALUES (NULL, '2020-10-05', '$title', '$desc', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7','$img_card','$img_right','$img_left','$img[0]','$img[1]','$img[2]','$img[3]','$img[4]','$img[5]','$img[6]','$img[7]','$img[8]','$img[9]', '$video', '$link_1', '$link_2', '$link_3', '$link_4', '$link_5');");

  $sql->execute();






?>