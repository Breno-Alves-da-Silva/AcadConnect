<?php

session_start();
include("conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$titulo = $_POST['titulo'];
$categoria = $_POST['categoria'];
$resumo = $_POST['resumo'];
$conteudo = $_POST['conteudo'];

$sql = "INSERT INTO artigos 
(usuario_id, titulo, categoria, resumo, conteudo) 
VALUES 
('$usuario_id', '$titulo', '$categoria', '$resumo', '$conteudo')";

if(mysqli_query($conexao, $sql)){
    header("Location: ../feed.php");
    exit();
} else {
    echo "Erro ao publicar artigo: " . mysqli_error($conexao);
}

?>