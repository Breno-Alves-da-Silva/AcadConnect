<?php

session_start();
include("conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$artigo_id = $_GET['artigo_id'];
$tipo = $_GET['tipo'];

$sql_verifica = "SELECT * FROM reacoes 
                 WHERE usuario_id = '$usuario_id' 
                 AND artigo_id = '$artigo_id'";

$resultado = mysqli_query($conexao, $sql_verifica);

if(mysqli_num_rows($resultado) > 0){
    $reacao_atual = mysqli_fetch_assoc($resultado);

    if($reacao_atual['tipo'] == $tipo){
        $sql = "DELETE FROM reacoes 
                WHERE usuario_id = '$usuario_id' 
                AND artigo_id = '$artigo_id'";
    } else {
        $sql = "UPDATE reacoes 
                SET tipo = '$tipo'
                WHERE usuario_id = '$usuario_id' 
                AND artigo_id = '$artigo_id'";
    }
} else {
    $sql = "INSERT INTO reacoes (artigo_id, usuario_id, tipo)
            VALUES ('$artigo_id', '$usuario_id', '$tipo')";
}

mysqli_query($conexao, $sql);

header("Location: ../feed.php");
exit();

?>