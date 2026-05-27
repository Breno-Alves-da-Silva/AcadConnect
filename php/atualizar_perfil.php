<?php

session_start();
include("conexao.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$nome = $_POST['nome'];
$curso = $_POST['curso'];
$instituicao = $_POST['instituicao'];
$area_interesse = $_POST['area_interesse'];
$bio = $_POST['bio'];

$sql_avatar = "";

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
    $nome_arquivo = time() . "_" . $_FILES['avatar']['name'];
    $caminho = "../uploads/" . $nome_arquivo;

    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $caminho)) {
        $sql_avatar = ", avatar = '$nome_arquivo'";
    }
}

$sql = "UPDATE usuarios SET
        nome = '$nome',
        curso = '$curso',
        instituicao = '$instituicao',
        area_interesse = '$area_interesse',
        bio = '$bio'
        $sql_avatar
        WHERE id = '$usuario_id'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['usuario_nome'] = $nome;
    $_SESSION['usuario_curso'] = $curso;
    $_SESSION['usuario_instituicao'] = $instituicao;

    header("Location: ../perfil.php");
    exit();
} else {
    echo "Erro ao atualizar perfil: " . mysqli_error($conexao);
}

?>