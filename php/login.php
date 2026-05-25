<?php

session_start();
include("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) == 1){
    $usuario = mysqli_fetch_assoc($resultado);

    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome'];
    $_SESSION['usuario_email'] = $usuario['email'];
    $_SESSION['usuario_curso'] = $usuario['curso'];
    $_SESSION['usuario_instituicao'] = $usuario['instituicao'];

    header("Location: ../feed.php");
    exit();
} else {
    header("Location: ../index.php?erro=login");
    exit();
}

?>