<?php
session_start();
include("php/conexao.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$busca = "";

if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
}

$sql = "SELECT artigos.*, usuarios.nome, usuarios.curso 
        FROM artigos
        INNER JOIN usuarios ON artigos.usuario_id = usuarios.id
        WHERE artigos.titulo LIKE '%$busca%'
        OR artigos.resumo LIKE '%$busca%'
        OR artigos.categoria LIKE '%$busca%'
        OR usuarios.nome LIKE '%$busca%'
        ORDER BY artigos.data_publicacao DESC";

$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcadConnect | Feed</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="topbar">
    <a class="logo" href="feed.php">
        <span>A</span> AcadConnect
    </a>

    <form class="top-search" action="feed.php" method="GET">
        <input
            type="text"
            name="busca"
            placeholder="Pesquisar artigos, autores ou temas..."
            value="<?php echo htmlspecialchars($busca); ?>">
    </form>

    <nav class="top-nav">
        <a href="feed.php">Feed</a>
        <a href="publicar.php">Publicar</a>
        <a href="perfil.php">Perfil</a>
        <a href="php/logout.php">Sair</a>
    </nav>
</header>

<main class="layout">

    <aside class="sidebar-left">
        <section class="profile-card">
            <div class="avatar">
                <?php echo strtoupper(substr($_SESSION['usuario_nome'], 0, 1)); ?>
            </div>

            <h3><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></h3>
            <p><?php echo htmlspecialchars($_SESSION['usuario_curso']); ?></p>

            <a class="btn-primary small-btn" href="publicar.php">
                Publicar artigo
            </a>
        </section>
    </aside>

    <section class="feed">

        <?php if ($busca != "") { ?>
            <div class="content-card">
                <p>
                    Resultados para:
                    <strong><?php echo htmlspecialchars($busca); ?></strong>
                </p>
            </div>
        <?php } ?>

        <?php while ($artigo = mysqli_fetch_assoc($resultado)) { ?>

            <?php
            $sql_reacoes_feed = "SELECT tipo, COUNT(*) as total 
                                 FROM reacoes 
                                 WHERE artigo_id = '" . $artigo['id'] . "'
                                 GROUP BY tipo";

            $resultado_reacoes_feed = mysqli_query($conexao, $sql_reacoes_feed);

            $reacoes_feed = [
                'util' => 0,
                'interessante' => 0,
                'duvida' => 0
            ];

            while ($linha_reacao = mysqli_fetch_assoc($resultado_reacoes_feed)) {
                $reacoes_feed[$linha_reacao['tipo']] = $linha_reacao['total'];
            }

            $sql_comentarios_feed = "SELECT COUNT(*) as total 
                                     FROM comentarios 
                                     WHERE artigo_id = '" . $artigo['id'] . "'";

            $resultado_comentarios_feed = mysqli_query($conexao, $sql_comentarios_feed);

            $dados_comentarios = mysqli_fetch_assoc($resultado_comentarios_feed);

            $total_comentarios = $dados_comentarios['total'];
            ?>

            <article class="post-card">

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

                <a href="artigo.php?id=<?php echo $artigo['id']; ?>" class="post-title">
                    <?php echo htmlspecialchars($artigo['titulo']); ?>
                </a>

                <p><?php echo htmlspecialchars($artigo['resumo']); ?></p>

                <div class="tags">
                    <span>#<?php echo htmlspecialchars($artigo['categoria']); ?></span>
                </div>

                <div class="actions">

                    <a class="reaction-btn"
                       href="php/reagir_feed.php?artigo_id=<?php echo $artigo['id']; ?>&tipo=util">
                        📘 Útil <span><?php echo $reacoes_feed['util']; ?></span>
                    </a>

                    <a class="reaction-btn"
                       href="php/reagir_feed.php?artigo_id=<?php echo $artigo['id']; ?>&tipo=interessante">
                        💡 Interessante <span><?php echo $reacoes_feed['interessante']; ?></span>
                    </a>

                    <a class="reaction-btn"
                       href="php/reagir_feed.php?artigo_id=<?php echo $artigo['id']; ?>&tipo=duvida">
                        ❓ Dúvida <span><?php echo $reacoes_feed['duvida']; ?></span>
                    </a>

                    <a href="artigo.php?id=<?php echo $artigo['id']; ?>" class="action-link">
                        💬 Comentar <span><?php echo $total_comentarios; ?></span>
                    </a>

                </div>

            </article>

        <?php } ?>

    </section>

</main>

<script src="js/script.js"></script>
</body>
</html>