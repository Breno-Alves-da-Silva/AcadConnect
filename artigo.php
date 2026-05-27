<?php
session_start();
include("php/conexao.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT artigos.*, usuarios.nome, usuarios.curso, usuarios.id as autor_id
        FROM artigos
        INNER JOIN usuarios ON artigos.usuario_id = usuarios.id
        WHERE artigos.id = '$id'";

$resultado = mysqli_query($conexao, $sql);
$artigo = mysqli_fetch_assoc($resultado);

$sql_comentarios = "SELECT comentarios.*, usuarios.nome
                    FROM comentarios
                    INNER JOIN usuarios ON comentarios.usuario_id = usuarios.id
                    WHERE comentarios.artigo_id = '$id'
                    ORDER BY comentarios.data_comentario DESC";

$resultado_comentarios = mysqli_query($conexao, $sql_comentarios);

$sql_reacoes = "SELECT tipo, COUNT(*) as total 
                FROM reacoes 
                WHERE artigo_id = '$id'
                GROUP BY tipo";

$resultado_reacoes = mysqli_query($conexao, $sql_reacoes);

$reacoes = [
    'util' => 0,
    'interessante' => 0,
    'duvida' => 0
];

while($linha = mysqli_fetch_assoc($resultado_reacoes)){
    $reacoes[$linha['tipo']] = $linha['total'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcadConnect | Artigo</title>
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

<main class="article-layout">

    <article class="content-card article-card">

        <div class="post-header">

            <div class="avatar small">
                <?php echo strtoupper(substr($artigo['nome'], 0, 1)); ?>
            </div>

            <div>
                <h4><?php echo htmlspecialchars($artigo['nome']); ?></h4>

                <span>
                    <?php echo htmlspecialchars($artigo['curso']); ?> •
                    <?php echo $artigo['data_publicacao']; ?>
                </span>
            </div>

        </div>

        <h1><?php echo htmlspecialchars($artigo['titulo']); ?></h1>

        <div class="tags">
            <span>#<?php echo htmlspecialchars($artigo['categoria']); ?></span>
        </div>

        <p><?php echo htmlspecialchars($artigo['resumo']); ?></p>

        <p>
            <?php echo nl2br(htmlspecialchars($artigo['conteudo'])); ?>
        </p>

        <div class="actions">

            <a class="reaction-btn"
               href="php/reagir.php?artigo_id=<?php echo $artigo['id']; ?>&tipo=util">
                📘 Útil <span><?php echo $reacoes['util']; ?></span>
            </a>

            <a class="reaction-btn"
               href="php/reagir.php?artigo_id=<?php echo $artigo['id']; ?>&tipo=interessante">
                💡 Interessante <span><?php echo $reacoes['interessante']; ?></span>
            </a>

            <a class="reaction-btn"
               href="php/reagir.php?artigo_id=<?php echo $artigo['id']; ?>&tipo=duvida">
                ❓ Dúvida <span><?php echo $reacoes['duvida']; ?></span>
            </a>

            <button class="btn-primary contact-btn">
                Contato com autor
            </button>

        </div>

    </article>

    <section class="content-card comments-card">

        <h2>Comentários</h2>

        <form class="comment-form"
              action="php/salvar_comentario.php"
              method="POST">

            <input type="hidden"
                   name="artigo_id"
                   value="<?php echo $artigo['id']; ?>">

            <textarea
                name="comentario"
                rows="3"
                placeholder="Escreva um comentário..."
                required></textarea>

            <button type="submit" class="btn-primary">
                Comentar
            </button>

        </form>

        <?php while ($comentario = mysqli_fetch_assoc($resultado_comentarios)) { ?>

            <div class="comment">

                <strong>
                    <?php echo htmlspecialchars($comentario['nome']); ?>
                </strong>

                <p>
                    <?php echo nl2br(htmlspecialchars($comentario['comentario'])); ?>
                </p>

            </div>

        <?php } ?>

    </section>

</main>

<div class="modal" id="contactModal">

    <div class="modal-card">

        <button class="close-modal">×</button>

        <h2>Contato com autor</h2>

        <p>
            Envie uma mensagem para
            <?php echo htmlspecialchars($artigo['nome']); ?>.
        </p>

        <form action="php/salvar_contato.php" method="POST">

            <input type="hidden"
                   name="artigo_id"
                   value="<?php echo $artigo['id']; ?>">

            <input type="hidden"
                   name="autor_id"
                   value="<?php echo $artigo['autor_id']; ?>">

            <textarea
                name="mensagem"
                rows="4"
                placeholder="Digite sua mensagem..."
                required></textarea>

            <button type="submit" class="btn-primary">
                Enviar mensagem
            </button>

        </form>

    </div>

</div>

<script src="js/script.js"></script>
</body>
</html>