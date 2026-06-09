<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}
?>

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

        <nav class="top-nav">
            <a href="feed.php">Feed</a>
            <a href="publicar.php">Publicar</a>
            <a href="perfil.php">Perfil</a>
            <a href="php/logout.php">Sair</a>
        </nav>
    </header>

    <main class="page-container">
        <section class="content-card">
            <h1>Publicar artigo</h1>

            <p class="subtitle">
                Compartilhe um artigo acadêmico com outros estudantes.
            </p>

            <form class="form"
                action="php/salvar_artigo.php"
                method="POST"
                enctype="multipart/form-data">

                <label for="titulo">Título do artigo:</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="autores">Autor(es):</label>
                <input
                    type="text"
                    id="autores"
                    name="autores"
                    placeholder="Ex: Breno Alves da Silva; Maria Souza"
                    required>

                <label for="palavras_chave">Palavras-chave:</label>
                <input
                    type="text"
                    id="palavras_chave"
                    name="palavras_chave"
                    placeholder="Ex: PHP, MySQL, Educação, Tecnologia"
                    required>

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
                <textarea id="resumo" name="resumo" rows="4" required></textarea>

                <label for="conteudo">Conteúdo do artigo:</label>
                <textarea id="conteudo" name="conteudo" rows="9" required></textarea>

                <label>Referências bibliográficas:</label>
                <textarea name="referencias" rows="5"
                    placeholder="Ex: Autor. Título. Editora, Ano."></textarea>

                <div class="checkbox-autoria">
                    <input type="checkbox"
                        name="declaracao_autoria"
                        required>

                    <label>
                        Declaro que este artigo é de minha autoria e que todas as fontes utilizadas foram devidamente citadas.
                    </label>
                </div>

                <label>Arquivo PDF do artigo:</label>
                <input type="file" name="pdf" accept=".pdf">

                <button type="submit" class="btn-primary">
                    Publicar
                </button>

            </form>
        </section>
    </main>

    <script src="js/script.js"></script>
</body>

</html>