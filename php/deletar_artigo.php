<?php

session_start();
include("conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];

$sql = "DELETE FROM artigos WHERE id = '$id' AND usuario_id = '$usuario_id'";

if(mysqli_query($conexao, $sql)){
    header("Location: ../perfil.php");
    exit();
} else {
    echo "Erro ao excluir artigo: " . mysqli_error($conexao);
}

?>