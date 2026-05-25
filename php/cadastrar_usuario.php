<?php

include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$curso = $_POST['curso'];
$instituicao = $_POST['instituicao'];
$area = $_POST['area'];
$bio = $_POST['bio'];

$sql = "INSERT INTO usuarios 
(nome, email, senha, curso, instituicao, area_interesse, bio)

VALUES

('$nome', '$email', '$senha', '$curso', '$instituicao', '$area', '$bio')";

if(mysqli_query($conexao, $sql)){
    header("Location: ../index.php?cadastro=sucesso");
    exit();
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

?>