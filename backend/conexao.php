<?php
    #CONECTANDO AO BANCO DE DADOS
    define("HOST", "127.0.0.1");
    define("USUARIO", "root");
    define("SENHA", "");
    define("DB", "databaseportfolio");

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('não foi possivel conectar ao servidor');



?>