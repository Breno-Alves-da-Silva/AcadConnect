<?php
session_start();
include("php/conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: index.php");
    exit();
}

$sql = "SELECT artigos.*, usuarios.nome, usuarios.curso 
        FROM artigos
        INNER JOIN usuarios ON artigos.usuario_id = usuarios.id
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

        <div class="top-search">
            <input type="text" placeholder="Pesquisar artigos, autores ou temas...">
        </div>

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
                <div class="avatar">B</div>
                <h3><?php echo $_SESSION['usuario_nome']; ?></h3>
                <p><?php echo $_SESSION['usuario_curso']; ?></p>
                <a class="btn-primary small-btn" href="publicar.php">Publicar artigo</a>
            </section>

            <section class="side-card">
                <h3>Menu</h3>
                <a href="perfil.php">📄 Meus artigos</a>
                <a href="#">💬 Comentários</a>
                <a href="#">⭐ Salvos</a>
            </section>
        </aside>

        <section class="feed">
        <?php while($artigo = mysqli_fetch_assoc($resultado)){ ?>

    <article class="post-card">
        <div class="post-header">
            <div class="avatar small">
                <?php echo strtoupper(substr($artigo['nome'], 0, 1)); ?>
            </div>

            <div>
                <h4><?php echo $artigo['nome']; ?></h4>
                <span><?php echo $artigo['curso']; ?> • <?php echo $artigo['data_publicacao']; ?></span>
            </div>
        </div>

        <a href="artigo.php?id=<?php echo $artigo['id']; ?>" class="post-title">
            <?php echo $artigo['titulo']; ?>
        </a>

        <p><?php echo $artigo['resumo']; ?></p>

        <div class="tags">
            <span>#<?php echo $artigo['categoria']; ?></span>
        </div>

        <div class="actions">
            <button class="reaction-btn">📘 Útil <span>0</span></button>
            <button class="reaction-btn">💡 Interessante <span>0</span></button>
            <button class="reaction-btn">❓ Dúvida <span>0</span></button>
            <a href="artigo.php?id=<?php echo $artigo['id']; ?>" class="action-link">💬 Comentar</a>
            <button class="share-btn">🔗 Compartilhar</button>
        </div>
    </article>

        <?php } ?>
        </section>

        <aside class="sidebar-right">
            <section class="side-card">
                <h3>Categorias</h3>
                <span class="tag-block">#Programação</span>
                <span class="tag-block">#Engenharia</span>
                <span class="tag-block">#Educação</span>
                <span class="tag-block">#Matemática</span>
            </section>

            <section class="side-card">
                <h3>Autor em destaque</h3>
                <p><strong>Ana Martins</strong></p>
                <p>Pedagogia</p>
                <button class="btn-primary contact-btn">Entrar em contato</button>
            </section>
        </aside>
    </main>

    <div class="modal" id="contactModal">
        <div class="modal-card">
            <button class="close-modal">×</button>
            <h2>Contato com autor</h2>
            <p>Envie uma mensagem demonstrando interesse pelo artigo.</p>
            <textarea rows="4" placeholder="Digite sua mensagem..."></textarea>
            <button class="btn-primary">Enviar mensagem</button>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
