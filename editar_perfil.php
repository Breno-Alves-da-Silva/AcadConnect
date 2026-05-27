<?php
session_start();
include("php/conexao.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
$resultado = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>AcadConnect | Editar Perfil</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="topbar">
    <a class="logo" href="feed.php">
        <span>A</span> AcadConnect
    </a>

    <nav class="top-nav">
        <a href="feed.php">Feed</a>
        <a href="publicar.php">Publicar</a>
        <a href="perfil.php">Perfil</a>
        <a href="php/logout.php">Sair</a>
    </nav>
</header>

<main class="page-container">
    <section class="content-card">
        <h1>Editar perfil</h1>

        <form class="form" action="php/atualizar_perfil.php" method="POST" enctype="multipart/form-data">

            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>

            <label>Curso:</label>
            <input type="text" name="curso" value="<?php echo htmlspecialchars($usuario['curso']); ?>">

            <label>Instituição:</label>
            <input type="text" name="instituicao" value="<?php echo htmlspecialchars($usuario['instituicao']); ?>">

            <label>Área de interesse:</label>
            <select name="area_interesse">
                <option value="<?php echo htmlspecialchars($usuario['area_interesse']); ?>">
                    <?php echo htmlspecialchars($usuario['area_interesse']); ?>
                </option>
                <option>Programação</option>
                <option>Engenharia</option>
                <option>Educação</option>
                <option>Matemática</option>
                <option>Saúde</option>
                <option>Pesquisa científica</option>
            </select>

            <label>Bio:</label>
            <textarea name="bio" rows="4"><?php echo htmlspecialchars($usuario['bio']); ?></textarea>

            <label>Foto de perfil:</label>
            <input type="file" name="avatar" accept="image/*">

            <button type="submit" class="btn-primary">
                Salvar alterações
            </button>

        </form>
    </section>
</main>

<script src="js/script.js"></script>
</body>
</html>