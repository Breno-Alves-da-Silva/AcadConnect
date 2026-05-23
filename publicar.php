<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcadConnect | Publicar</title>
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
        <section class="content-card">
            <h1>Publicar artigo</h1>
            <p class="subtitle">Compartilhe um resumo acadêmico com outros estudantes.</p>

            <form class="form" action="feed.php" method="POST">
                <label for="titulo">Título do artigo:</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="categoria">Categoria:</label>
                <select id="categoria" name="categoria">
                    <option>Programação</option>
                    <option>Engenharia</option>
                    <option>Educação</option>
                    <option>Matemática</option>
                    <option>Saúde</option>
                    <option>Pesquisa científica</option>
                </select>

                <label for="resumo">Resumo:</label>
                <textarea id="resumo" name="resumo" rows="4"></textarea>

                <label for="conteudo">Conteúdo do artigo:</label>
                <textarea id="conteudo" name="conteudo" rows="9"></textarea>

                <button type="submit" class="btn-primary">Publicar</button>
            </form>
        </section>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
