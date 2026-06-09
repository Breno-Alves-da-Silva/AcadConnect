# AcadConnect

AcadConnect é uma rede social acadêmica desenvolvida como projeto da disciplina de Introdução à Engenharia.

O sistema tem como objetivo permitir que estudantes publiquem artigos acadêmicos, interajam com outros usuários e compartilhem conhecimento de forma organizada, ética e acessível.

---

## Objetivo do projeto

O projeto foi criado para oferecer uma plataforma acadêmica onde usuários possam:

- Publicar artigos acadêmicos
- Anexar a versão oficial do artigo em PDF
- Informar autores, palavras-chave e referências bibliográficas
- Comentar publicações
- Reagir aos conteúdos
- Pesquisar artigos, autores e temas
- Entrar em contato com autores
- Gerenciar um perfil acadêmico

---

## Funcionalidades

### Usuários

- Cadastro de usuários
- Login e logout
- Sessões em PHP
- Perfil acadêmico
- Edição de perfil
- Upload de foto/avatar

### Artigos

- Publicação de artigos
- Visualização individual
- Edição de artigos
- Exclusão de artigos
- Upload de PDF
- Visualização e download de PDF
- Campo de autores
- Campo de palavras-chave
- Campo de referências bibliográficas
- Contador de visualizações

### Ética acadêmica

- Declaração de autoria obrigatória
- Aviso de responsabilidade acadêmica
- Campo para referências bibliográficas
- Indicação de que o autor é responsável pelo conteúdo publicado

### Interações

- Comentários em artigos
- Sistema de reações:
  - Útil
  - Interessante
  - Dúvida
- Contato com autor
- Contador de comentários

### Feed

- Feed dinâmico
- Pesquisa por título, resumo, categoria e autor
- Exibição de reações
- Exibição de quantidade de comentários
- Layout responsivo

---

## Tecnologias utilizadas

### Front-end

- HTML5
- CSS3
- JavaScript

### Back-end

- PHP

### Banco de dados

- MySQL

### Ambiente de desenvolvimento

- XAMPP
- VS Code
- Git/GitHub

---

## Estrutura do projeto

```txt
Projeto_introducao-engenharias/
│
├── css/
│   └── style.css
│
├── js/
│   └── script.js
│
├── php/
│   ├── conexao.php
│   ├── login.php
│   ├── logout.php
│   ├── cadastrar_usuario.php
│   ├── salvar_artigo.php
│   ├── atualizar_artigo.php
│   ├── deletar_artigo.php
│   ├── salvar_comentario.php
│   ├── reagir.php
│   ├── reagir_feed.php
│   ├── salvar_contato.php
│   └── atualizar_perfil.php
│
├── uploads/
│
├── index.php
├── cadastro.php
├── feed.php
├── perfil.php
├── artigo.php
├── publicar.php
├── editar_artigo.php
├── editar_perfil.php
└── README.md
