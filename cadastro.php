<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcadConnect | Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-page">

    <main class="auth-container">
        <section class="auth-card wide">
            <div class="brand">
                <h1>Cadastro</h1>
                <p>Crie seu perfil acadêmico para publicar artigos.</p>
            </div>

            <form class="form grid-form" action="feed.php" method="POST">
                <div>
                    <label for="nome">Nome completo:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <div>
                    <label for="confirmar">Confirmar senha:</label>
                    <input type="password" id="confirmar" name="confirmar" required>
                </div>

                <div>
                    <label for="curso">Curso:</label>
                    <input type="text" id="curso" name="curso" placeholder="Ex: Engenharia da Computação">
                </div>

                <div>
                    <label for="instituicao">Instituição:</label>
                    <input type="text" id="instituicao" name="instituicao" placeholder="Ex: Feevale">
                </div>

                <div>
                    <label for="area">Área de interesse:</label>
                    <select id="area" name="area">
                        <option>Selecione uma área</option>
                        <option>Programação</option>
                        <option>Engenharia</option>
                        <option>Educação</option>
                        <option>Matemática</option>
                        <option>Saúde</option>
                        <option>Pesquisa científica</option>
                    </select>
                </div>

                <div class="full">
                    <label for="bio">Bio curta:</label>
                    <textarea id="bio" name="bio" rows="3" placeholder="Fale um pouco sobre você"></textarea>
                </div>

                <button type="submit" class="btn-primary full">Cadastrar</button>

                <p class="form-footer full">
                    Já tem conta?
                    <a href="index.php">Entrar</a>
                </p>
            </form>
        </section>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
