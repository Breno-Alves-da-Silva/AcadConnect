<?php

session_start();
include("conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$artigo_id = $_POST['artigo_id'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO comentarios 
        (artigo_id, usuario_id, comentario)
        VALUES
        ('$artigo_id', '$usuario_id', '$comentario')";

if(mysqli_query($conexao, $sql)){
    header("Location: ../artigo.php?id=$artigo_id");
    exit();
} else {
    echo "Erro ao comentar: " . mysqli_error($conexao);
}

?>