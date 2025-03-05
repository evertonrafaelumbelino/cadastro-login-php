<?php
    require_once __DIR__ . "/../includes/config.php";

    function carregarUsuarios() {
        return file_get_contents(UsuariosJson);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuarios = carregarUsuarios();
        $usuariosArray = json_decode($usuarios, true);
        $resultado = false;

        foreach ($usuariosArray as $dados) {
            if (
                $dados['nome'] === $nome && 
                $dados['email'] === $email && 
                $dados['senha'] === $senha
            ) {
                ?>
                    <link rel="stylesheet" href="../assets/css/cadastro-login.css">
                    <link rel="stylesheet" href="../assets/css/media-query.css">

                    <main>
                        <h1>Olá <strong><?php echo $nome;?></strong>, seja bem vindo(a) novamente a sua conta!</h1>

                        <h3>Abaixo estão todas as configurações que você pode fazer na sua conta:</h3>

                        <h3>Opções da conta: </h3>

                        <button type="button" class="deletConta" id="deletarConta">Deletar conta</button>

                        <button type="button" class="maisDados" id="maisDados">Mais dados da conta</button>
                        <br>

                        <section id="conteudo">
                        
                        </section>

                        <h3>Voltar: </h3>
                        <a href="../index.php">
                            <button type="button" class="voltar">Voltar a página inicial</button>
                        </a>
                    </main>

                    <script src="../assets/js/cadastro-login.js"></script>
                    <script>
                        let secConteudo = document.getElementById('conteudo');
                        let maisDad = document.getElementById('maisDados')
                    
                        maisDad.addEventListener('click', () => {
                            secConteudo.innerHTML =
                            `
                            <h3>Abaixo estão todos os dados da sua conta:</h3>
                            <ul>
                                <li><strong>Nome:</strong> <?php echo $nome; ?> </li>
                                <li><strong>Email:</strong> <?php echo $email; ?></li>
                                <li><strong>Senha:</strong> <?php echo $senha; ?></li>
                            </ul>`;
                        })
                    </script>
                <?php

                $resultado = true;
                return $resultado;
            }
        }
        if (!$resultado) {
            ?>
                <link rel="stylesheet" href="../assets/css/cadastro-login.css">
                <link rel="stylesheet" href="../assets/css/media-query.css">

                <main>
                    <h3>Dados de login inválidos, verifique se os dados foram digitados corretamente, ou se a conta realmente existe</h3>

                    <a href="../index.php">
                        <button type="button" class="voltar">Voltar a página inicial</button>
                    </a>
                </main>
            <?php
            exit;
        }
    }
?>