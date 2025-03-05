let divConteudo = document.getElementById('conteudo');
let sectionMain = document.getElementById('main');
let divButtons = document.getElementById('buttons');
let btnCadastrar = document.getElementById('cadastrar');
let btnLogin = document.getElementById('login');
let btnInfo = document.getElementById('btnInfo');
let sectionInfo = document.getElementById('info');

btnCadastrar.addEventListener('click', () => {
    btnLogin.style.borderBottom = 'none';
    btnCadastrar.style.borderBottom = '2px solid white';
    divConteudo.innerHTML = 
    `
        <form action="/public/cadastro.php" method="POST">
            <div id="formulario">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="inputNES" placeholder="Nome com no mínimo 4 letras" required minlength="4" maxlength="20">
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="inputNES" placeholder="Email ex: insiraemail@gmail.com" required maxlength="60">
                <br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="inputNES" placeholder="Senha com no mínimo 6 caracteres" required minlength="6" maxlength="20">
            </div>
    
            <div id="divSubmit">
                <input type="submit" value="Cadastrar" class="btnSubmit">
            </div>
        </form>
    `;
});

btnCadastrar.addEventListener('mouseenter', () => {
    btnCadastrar.style.backgroundColor = 'white';
    btnCadastrar.style.color = 'black';
});

btnCadastrar.addEventListener('mouseleave', () => {
    btnCadastrar.style.backgroundColor = '#2E3138';
    btnCadastrar.style.color = 'white';
});

btnLogin.addEventListener('click', () => {
    btnCadastrar.style.borderBottom = 'none';
    btnLogin.style.borderBottom = '2px solid white';
    divConteudo.innerHTML = 
    `
        <form action="/public/login.php" method="POST">
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
                <input type="submit" value="Login" class="btnSubmit">
            </div>
        </form>
    `;
});

btnLogin.addEventListener('mouseenter', () => {
    btnLogin.style.backgroundColor = 'white';
    btnLogin.style.color = 'black';
});

btnLogin.addEventListener('mouseleave', () => {
    btnLogin.style.backgroundColor = '#2E3138';
    btnLogin.style.color = 'white';
});

btnInfo.addEventListener('click', () => {
    sectionInfo.innerHTML = 
    `
        <p>Os dados dos usuários são armazenados em um arquivo JSON.</p>

        <p>Este sistema executa funcionalidades simples como, cadastro, login, deletar e ler dados do usuário</p>
    `;
    sectionInfo.style.padding = "10px";
    sectionInfo.style.margin = "10px";
    sectionInfo.style.borderRadius = "10px";
});