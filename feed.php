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
            <a href="index.php">Sair</a>
        </nav>
    </header>

    <main class="layout">
        <aside class="sidebar-left">
            <section class="profile-card">
                <div class="avatar">B</div>
                <h3>Breno Silva</h3>
                <p>Engenharia da Computação</p>
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
            <article class="post-card">
                <div class="post-header">
                    <div class="avatar small">A</div>
                    <div>
                        <h4>Ana Martins</h4>
                        <span>Pedagogia • há 2 horas</span>
                    </div>
                </div>

                <a href="artigo.php" class="post-title">A importância da tecnologia na educação</a>

                <p>Este artigo apresenta como ferramentas digitais podem ajudar no aprendizado dos alunos dentro e fora da sala de aula.</p>

                <div class="tags">
                    <span>#Educação</span>
                    <span>#Tecnologia</span>
                </div>

                <div class="actions">
                    <button class="reaction-btn">📘 Útil <span>12</span></button>
                    <button class="reaction-btn">💡 Interessante <span>8</span></button>
                    <button class="reaction-btn">❓ Dúvida <span>3</span></button>
                    <a href="artigo.php" class="action-link">💬 Comentar</a>
                    <button class="share-btn">🔗 Compartilhar</button>
                </div>
            </article>
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
