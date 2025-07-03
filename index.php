<?php
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Site Completo em PHP e HTML</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eaeaea;
            color: #222;
            line-height: 1.6;
        }
        header {
            background-color: #0d6efd;
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 3px 5px rgba(0,0,0,0.1);
        }
        nav {
            background-color: #083e8a;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }
        nav a:hover { color: #ffc107; }
        main {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1, h2 {
            margin-bottom: 20px;
            color: #0d6efd;
        }
        p { margin-bottom: 20px; font-size: 1.1rem; }
        ul { list-style-type: square; margin-left: 20px; margin-bottom: 30px; }
        form {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            margin: 0 auto 40px;
            box-shadow: inset 0 0 5px #ccc;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #0d6efd;
            outline: none;
        }
        input[type="submit"] {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 1.1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0843b9;
        }
        .mensagem {
            max-width: 400px;
            margin: 0 auto 40px;
            padding: 15px;
            background-color: #d1e7dd;
            border: 1px solid #badbcc;
            color: #0f5132;
            border-radius: 6px;
            font-weight: 600;
            text-align: center;
        }
        footer {
            text-align: center;
            padding: 20px 10px;
            background-color: #0d6efd;
            color: white;
            font-size: 0.9rem;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            box-shadow: 0 -3px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<header>
    <h1>Meu Site Completo em PHP e HTML</h1>
</header>

<nav>
    <a href="#home">Home</a>
    <a href="#sobre">Sobre</a>
    <a href="#contato">Contato</a>
</nav>

<main>

    <section id="home">
        <h2>Bem-vindo(a)!</h2>
        <p>Hoje é <strong><?php echo date('d/m/Y'); ?></strong>.</p>

        <?php
            $hora = date('H');
            if ($hora < 12) {
                echo "<p>Bom dia! Que seu dia seja incrível e produtivo.</p>";
            } elseif ($hora < 18) {
                echo "<p>Boa tarde! Espero que seu dia esteja ótimo.</p>";
            } else {
                echo "<p>Boa noite! Hora de descansar e recarregar as energias.</p>";
            }
        ?>

        <p>Veja abaixo algumas vantagens do PHP:</p>
        <?php
            $vantagens = [
                "Fácil aprendizado e sintaxe parecida com C e Perl.",
                "Grande comunidade e vasto ecossistema de bibliotecas.",
                "Ampla compatibilidade com servidores e sistemas operacionais.",
                "Suporte robusto para bancos de dados (MySQL, PostgreSQL, etc).",
                "Código aberto e gratuito."
            ];
        ?>
        <ul>
            <?php
                foreach ($vantagens as $item) {
                    echo "<li>$item</li>";
                }
            ?>
        </ul>
    </section>

    <section id="sobre">
        <h2>Sobre este site</h2>
        <p>Este site é um exemplo básico que combina HTML, CSS e PHP para criar páginas dinâmicas e responsivas. Você pode editar o código para aprender mais sobre como integrar programação server-side com estrutura front-end.</p>
    </section>

    <section id="contato">
        <h2>Formulário de Contato</h2>

        <?php
            $nome = $email = "";
            $mensagemSucesso = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome = htmlspecialchars(strip_tags(trim($_POST["nome"] ?? "")));
                $email = htmlspecialchars(strip_tags(trim($_POST["email"] ?? "")));

                if ($nome && $email) {
                    $mensagemSucesso = "Obrigado, <strong>$nome</strong>! Recebemos seu contato e responderemos em breve.";
                } else {
                    $mensagemSucesso = "<span style='color: red;'>Por favor, preencha nome e e-mail corretamente.</span>";
                }
            }

            if ($mensagemSucesso) {
                echo "<div class='mensagem'>$mensagemSucesso</div>";
            }
        ?>

        <form method="POST" action="#contato" novalidate>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="<?php echo $nome; ?>" placeholder="Seu nome completo" />

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required value="<?php echo $email; ?>" placeholder="seu@email.com" />

            <input type="submit" value="Enviar" />
        </form>
    </section>

</main>

<footer>
    &copy; <?php echo date('Y'); ?> Meu Site Completo PHP & HTML
</footer>

</body>
</html>
?>