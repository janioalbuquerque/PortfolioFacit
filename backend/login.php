<?php
session_start();
include("conexao.php");

if (empty($_POST['usuario']) || empty($_POST['senha'])) {#VERIFICANDO SE USUARIO OU SENHA ESTÃO VAZIOS
    header('location: ../index.php');#ENVIANDO PARA PAGINA INICIAL
    
    exit();
}

#PEGANDO USUARIO E SENHA DOS INPUTS DO FORMULARIO LOGIN
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);



#VERIFICANDO SE EXISTE O USUARIO E SENHA NA TABELA USUARIOS
$query = "select usuario_id, usuario from usuarios where usuario = '{$usuario}' and senha = md5('{$senha}')";



#VERIFICANDO SE GEROU ALGUM REGISTRO NA PESQUISA
$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);



#SE GERAR 1 REGISTRO ENTRAR NO PAINE, SE NÃO GERAR NENHUM REGISTRO VOLTAR PARA INDEX
if ($row > 0) {

    $dados_usuario = mysqli_fetch_assoc($result);

    $_SESSION['id_usuario'] = $dados_usuario['usuario_id'];
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    header('Location: ../pages/painel/painel.php');
    exit();
}

else {
    $_SESSION['nao_autenticado'] = true;
    header('location: ../index.php');


}
?>