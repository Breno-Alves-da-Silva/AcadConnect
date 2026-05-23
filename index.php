<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcadConnect | Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-page">

    <main class="auth-container">
        <section class="auth-card">
            <div class="brand">
                <h1>AcadConnect</h1>
                <p>Conectando alunos, artigos e conhecimento.</p>
            </div>

            <form class="form" action="feed.php" method="POST">
                <h2>Entrar</h2>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="seuemail@exemplo.com" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>

                <button type="submit" class="btn-primary">Entrar</button>

                <p class="form-footer">
                    Ainda não tem conta?
                    <a href="cadastro.php">Criar cadastro</a>
                </p>
            </form>
        </section>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
