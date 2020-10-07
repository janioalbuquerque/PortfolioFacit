<?php
#VERIFICANDO SE EXISTE SESSÃO INICIADA
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 



#SE  NÃO EXISTIR SESSÃO USUARIO, VOLTAR PARA INDEX
if (!$_SESSION['usuario']) {
    header('location: ../../index.php');
    exit();
}


?>