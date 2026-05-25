<?php
session_start();
include("php/conexao.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$sql_usuario = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
$resultado_usuario = mysqli_query($conexao, $sql_usuario);

$usuario = mysqli_fetch_assoc($resultado_usuario);

$sql_artigos = "SELECT * FROM artigos 
                WHERE usuario_id = '$usuario_id'
                ORDER BY data_publicacao DESC";

$resultado_artigos = mysqli_query($conexao, $sql_artigos);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcadConnect | Perfil</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header class="topbar">
        <a class="logo" href="feed.php">
            <span>A</span> AcadConnect
        </a>

        <div class="top-search">
            <input type="text" placeholder="Pesquisar artigos, autores ou temas...">
        </div>

        <nav class="top-nav">
            <a href="feed.php">Feed</a>
            <a href="publicar.php">Publicar</a>
            <a href="perfil.php">Perfil</a>
            <a href="index.php">Sair</a>
        </nav>
    </header>

    <main class="page-container">
        <section class="profile-hero">
            <div class="avatar big">B</div>
            <div>
                <h1><?php echo $usuario['nome']; ?></h1>
                <p>
                    <?php echo $usuario['curso']; ?> •
                    <?php echo $usuario['instituicao']; ?>
                </p>
                <p class="bio">
                    <?php echo $usuario['bio']; ?>
                </p>
            </div>
        </section>

        <section class="content-card">
            <h2>Meus artigos</h2>

            <?php while ($artigo = mysqli_fetch_assoc($resultado_artigos)) { ?>

                <article class="mini-article">

                    <div>
                        <h3><?php echo $artigo['titulo']; ?></h3>

                        <p>
                            #<?php echo $artigo['categoria']; ?>
                        </p>
                    </div>

                    <div class="mini-actions">
                        <a href="artigo.php?id=<?php echo $artigo['id']; ?>">Ver</a>

                        <a href="editar_artigo.php?id=<?php echo $artigo['id']; ?>">Editar</a>

                        <a href="php/deletar_artigo.php?id=<?php echo $artigo['id']; ?>"
                            onclick="return confirm('Tem certeza que deseja excluir este artigo?')">
                            Excluir
                        </a>
                    </div>

                </article>

            <?php } ?>
        </section>
    </main>

    <script src="js/script.js"></script>
</body>

</html>