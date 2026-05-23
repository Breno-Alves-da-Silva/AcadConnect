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

    <main class="article-layout">
        <article class="content-card article-card">
            <div class="post-header">
                <div class="avatar small">A</div>
                <div>
                    <h4>Ana Martins</h4>
                    <span>Pedagogia • publicado há 2 horas</span>
                </div>
            </div>

            <h1>A importância da tecnologia na educação</h1>

            <div class="tags">
                <span>#Educação</span>
                <span>#Tecnologia</span>
            </div>

            <p>A tecnologia tem se tornado cada vez mais presente no ambiente educacional.</p>
            <p>Plataformas digitais, vídeos, fóruns e sistemas de aprendizagem ajudam o aluno a estudar de forma mais interativa.</p>

            <div class="actions">
                <button class="reaction-btn">📘 Útil <span>12</span></button>
                <button class="reaction-btn">💡 Interessante <span>8</span></button>
                <button class="reaction-btn">❓ Dúvida <span>3</span></button>
                <button class="share-btn">🔗 Compartilhar</button>
                <button class="btn-primary contact-btn">Contato com autor</button>
            </div>
        </article>

        <section class="content-card comments-card">
            <h2>Comentários</h2>

            <form class="comment-form">
                <textarea rows="3" placeholder="Escreva um comentário..."></textarea>
                <button type="button" class="btn-primary add-comment-btn">Comentar</button>
            </form>

            <div class="comments-list">
                <div class="comment">
                    <strong>João Pereira</strong>
                    <p>Muito bom. Acho interessante relacionar isso com ensino híbrido.</p>
                </div>
            </div>
        </section>
    </main>

    <div class="modal" id="contactModal">
        <div class="modal-card">
            <button class="close-modal">×</button>
            <h2>Contato com autor</h2>
            <p>Envie uma mensagem para Ana Martins.</p>
            <textarea rows="4" placeholder="Digite sua mensagem..."></textarea>
            <button class="btn-primary">Enviar mensagem</button>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
