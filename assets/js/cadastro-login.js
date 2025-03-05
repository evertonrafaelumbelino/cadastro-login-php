let deletarConta = document.getElementById('deletarConta');
let maisDados = document.getElementById('maisDados');
let sectConteudo = document.getElementById('conteudo');

deletarConta.addEventListener('click', () => {
    sectConteudo.innerHTML = 
    `
        <h3>Insira os dados da conta que deseja deletar:</h3>

        <form action="deletar.php" method="POST">
            <div id="formulario">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="inputNES" placeholder="Insira o nome da conta" required minlength="4" maxlength="20">
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="inputNES" placeholder="Insira o email da conta" required maxlength="60">
                <br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="inputNES" placeholder="Insira a senha da conta" required minlength="6" maxlength="20">
            </div>
    
            <div id="divSubmit">
                <input type="submit" value="Deletar" class="btnSubmit" id="deletar">
            </div>
        </form>
    `;
});