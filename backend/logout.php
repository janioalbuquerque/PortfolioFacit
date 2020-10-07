<?php
    #DESTRUINDO A SESSÃO QUE GUARDA USUARIO E SENHA E VOLTANDO PARA PAGINA INDEX
    session_start();
    session_destroy();
    header('location: ../index.php');
    exit();


?>