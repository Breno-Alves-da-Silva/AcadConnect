<?php
session_start();
include("php/conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM artigos WHERE id = '$id' AND usuario_id = '$usuario_id'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) == 0){
    echo "Artigo não encontrado ou você não tem permissão.";
    exit();
}

$artigo = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<main class="page-container">
    <section class="content-card">
        <h1>Editar artigo</h1>

        <form class="form" action="php/atualizar_artigo.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $artigo['id']; ?>">

            <label>Título:</label>
            <input type="text" name="titulo" value="<?php echo $artigo['titulo']; ?>" required>

            <label>Categoria:</label>
            <select name="categoria">
                <option><?php echo $artigo['categoria']; ?></option>
                <option>Programação</option>
                <option>Engenharia</option>
                <option>Educação</option>
                <option>Matemática</option>
                <option>Saúde</option>
                <option>Pesquisa científica</option>
            </select>

            <label>Resumo:</label>
            <textarea name="resumo" rows="4"><?php echo $artigo['resumo']; ?></textarea>

            <label>Conteúdo:</label>
            <textarea name="conteudo" rows="9"><?php echo $artigo['conteudo']; ?></textarea>

            <button type="submit" class="btn-primary">Salvar alterações</button>
        </form>
    </section>
</main>

<script src="js/script.js"></script>
</body>
</html>