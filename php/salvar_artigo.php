<?php

session_start();
include("conexao.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$titulo = $_POST['titulo'];
$autores = $_POST['autores'];
$palavras_chave = $_POST['palavras_chave'];

$categoria = $_POST['categoria'];
$resumo = $_POST['resumo'];
$conteudo = $_POST['conteudo'];
$referencias = $_POST['referencias'];

$declaracao_autoria = 0;

if (isset($_POST['declaracao_autoria'])) {
    $declaracao_autoria = 1;
}

$pdf = "";

if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == 0) {

    $nome_original = $_FILES['pdf']['name'];
    $arquivo_tmp = $_FILES['pdf']['tmp_name'];

    $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));

    if ($extensao == "pdf") {

        $nome_pdf = time() . "_" . $nome_original;

        $caminho_pdf = "../uploads/" . $nome_pdf;

        if (move_uploaded_file($arquivo_tmp, $caminho_pdf)) {
            $pdf = $nome_pdf;
        }
    }
}

$sql = "INSERT INTO artigos
(
usuario_id,
titulo,
autores,
palavras_chave,
categoria,
resumo,
conteudo,
referencias,
declaracao_autoria,
pdf,
visualizacoes
)
VALUES
(
'$usuario_id',
'$titulo',
'$autores',
'$palavras_chave',
'$categoria',
'$resumo',
'$conteudo',
'$referencias',
'$declaracao_autoria',
'$pdf',
0
)";

if (mysqli_query($conexao, $sql)) {
    header("Location: ../feed.php");
    exit();
} else {
    echo "Erro ao publicar artigo: " . mysqli_error($conexao);
}
