<?php

session_start();
include("conexao.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$artigo_id = $_POST['artigo_id'];
$autor_id = $_POST['autor_id'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO contatos
        (artigo_id, autor_id, usuario_id, mensagem)
        VALUES
        ('$artigo_id', '$autor_id', '$usuario_id', '$mensagem')";

if (mysqli_query($conexao, $sql)) {
    header("Location: ../artigo.php?id=$artigo_id");
    exit();
} else {
    echo "Erro ao enviar mensagem: " . mysqli_error($conexao);
}

?>