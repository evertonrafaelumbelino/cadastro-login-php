<?php

require __DIR__ . "/../includes/config.php";

function carregarUsuarios() {
    return file_get_contents(UsuariosJson);
}

function salvarUsuarios($novoUsuario) {
    if (file_exists(UsuariosJson)) {
        $usuarios = carregarUsuarios();
        $arrayUsuarios = json_decode($usuarios, true);
    } else {
        $arrayUsuarios = [];
    }

    $arrayUsuarios[] = $novoUsuario;

    $jsonArray = json_encode($arrayUsuarios, JSON_PRETTY_PRINT);

    file_put_contents(UsuariosJson, $jsonArray);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dadosNovoUsuario = [
        "nome" => $nome, 
        "email" => $email, 
        "senha" => $senha
    ];

    $usuarios = carregarUsuarios();
    $usuariosArray = json_decode($usuarios, true);

    if (!is_array($usuariosArray)) {
        $usuariosArray = [];
    }

    foreach ($usuariosArray as $dados) {
        if ($_POST['nome'] === $dados['nome']) {
            ?>

            <link rel="stylesheet" href="../assets/css/cadastro-login.css">
            
            <?php 
            echo "<h3>O nome " . "<strong>" . $_POST['nome'] . "</strong>" . " já está em uso, por favor volte ao formulário de cadastro e troque o seu nome de usuário.</h3>";
            
            echo '
            <a href="../index.php">
                <button type="button" class="voltar">Voltar a página inicial</button>
            </a>';
            exit;
        }
    }

    salvarUsuarios($dadosNovoUsuario);
} else {
    http_response_code(405);
    echo "Só é aceito método do tipo POST";
}
?>

<link rel="stylesheet" href="../assets/css/cadastro-login.css">
<link rel="stylesheet" href="../assets/css/media-query.css">

<body>
    <h1>Olá <strong><?php echo $nome;?></strong>, seja bem vindo(a) a sua nova conta!</h1>
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
</body>