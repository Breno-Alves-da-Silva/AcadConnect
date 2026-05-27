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

$sql_contatos = "SELECT contatos.*, usuarios.nome as remetente, artigos.titulo
                 FROM contatos
                 INNER JOIN usuarios ON contatos.usuario_id = usuarios.id
                 INNER JOIN artigos ON contatos.artigo_id = artigos.id
                 WHERE contatos.autor_id = '$usuario_id'
                 ORDER BY contatos.data_contato DESC";

$resultado_contatos = mysqli_query($conexao, $sql_contatos);
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

    <nav class="top-nav">
        <a href="feed.php">Feed</a>
        <a href="publicar.php">Publicar</a>
        <a href="perfil.php">Perfil</a>
        <a href="php/logout.php">Sair</a>
    </nav>
</header>

<main class="page-container">

    <section class="profile-hero">

        <?php if(!empty($usuario['avatar'])){ ?>

            <img class="avatar big"
                 src="uploads/<?php echo $usuario['avatar']; ?>">

        <?php } else { ?>

            <div class="avatar big">
                <?php echo strtoupper(substr($usuario['nome'], 0, 1)); ?>
            </div>

        <?php } ?>

        <div>

            <h1><?php echo htmlspecialchars($usuario['nome']); ?></h1>

            <p>
                <?php echo htmlspecialchars($usuario['curso']); ?> •
                <?php echo htmlspecialchars($usuario['instituicao']); ?>
            </p>

            <p class="bio">
                <?php echo nl2br(htmlspecialchars($usuario['bio'])); ?>
            </p>

            <a href="editar_perfil.php"
               class="btn-primary small-btn">
                Editar perfil
            </a>

        </div>

    </section>

    <section class="content-card">

        <h2>Meus artigos</h2>

        <?php while ($artigo = mysqli_fetch_assoc($resultado_artigos)) { ?>

            <article class="mini-article">

                <div>

                    <h3>
                        <?php echo htmlspecialchars($artigo['titulo']); ?>
                    </h3>

                    <p>
                        #<?php echo htmlspecialchars($artigo['categoria']); ?>
                    </p>

                </div>

                <div class="mini-actions">

                    <a href="artigo.php?id=<?php echo $artigo['id']; ?>">
                        Ver
                    </a>

                    <a href="editar_artigo.php?id=<?php echo $artigo['id']; ?>">
                        Editar
                    </a>

                    <a href="php/deletar_artigo.php?id=<?php echo $artigo['id']; ?>"
                       onclick="return confirm('Tem certeza que deseja excluir este artigo?')">
                        Excluir
                    </a>

                </div>

            </article>

        <?php } ?>

    </section>

    <section class="content-card">

        <h2>Mensagens recebidas</h2>

        <?php while($contato = mysqli_fetch_assoc($resultado_contatos)){ ?>

            <div class="comment">

                <strong>
                    <?php echo htmlspecialchars($contato['remetente']); ?>
                </strong>

                <p>
                    <strong>Artigo:</strong>
                    <?php echo htmlspecialchars($contato['titulo']); ?>
                </p>

                <p>
                    <?php echo nl2br(htmlspecialchars($contato['mensagem'])); ?>
                </p>

            </div>

        <?php } ?>

    </section>

</main>

<script src="js/script.js"></script>
</body>
</html>