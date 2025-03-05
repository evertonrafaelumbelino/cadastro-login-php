<?php

require __DIR__ . "/../includes/config.php";

function carregarUsuarios() {
    return file_get_contents(UsuariosJson);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarios = carregarUsuarios();
    $usuariosArray = json_decode($usuarios, true);

    if (!is_array($usuariosArray)) {
        $usuariosArray = [];
    }

    foreach ($usuariosArray as $dados) {
        if (
            $dados['nome'] === $nome && 
            $dados['email'] === $email && 
            $dados['senha'] === $senha
        ) {
            $indiceNome = array_search($nome, array_column($usuariosArray, 'nome'));

            $usuarioRemover = array_splice($usuariosArray, $indiceNome, 1);

            file_put_contents(UsuariosJson, json_encode($usuariosArray, JSON_PRETTY_PRINT));

            ?>

            <link rel="stylesheet" href="../assets/css/cadastro-login.css">
            <link rel="stylesheet" href="../assets/css/media-query.css">

            <h2>Conta com o nome <strong> <?php echo $nome; ?> </strong> deletada com sucesso.</h2>

            <a href="../index.php">
                <button type="button" class="voltar">Voltar a página inicial</button>
            </a>
            <?php
            exit;
        }
    }
    ?>
    <link rel="stylesheet" href="../assets/css/cadastro-login.css">
    <link rel="stylesheet" href="../assets/css/media-query.css">

    <h3>Conta inválida ou não existente, verifique se digitou corretamente os dados da conta, ou se a conta realmente existe.</h3>
    
    <a href="../index.php">
        <button type="button" class="voltar">Voltar a página inicial</button>
    </a>
    <?php
}
?>