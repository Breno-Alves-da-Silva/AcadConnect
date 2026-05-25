<?php

session_start();
include("conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../index.php");
    exit();
}

$id = $_POST['id'];
$usuario_id = $_SESSION['usuario_id'];
$titulo = $_POST['titulo'];
$categoria = $_POST['categoria'];
$resumo = $_POST['resumo'];
$conteudo = $_POST['conteudo'];

$sql = "UPDATE artigos SET
        titulo = '$titulo',
        categoria = '$categoria',
        resumo = '$resumo',
        conteudo = '$conteudo'
        WHERE id = '$id' AND usuario_id = '$usuario_id'";

if(mysqli_query($conexao, $sql)){
    header("Location: ../perfil.php");
    exit();
} else {
    echo "Erro ao atualizar artigo: " . mysqli_error($conexao);
}

?>