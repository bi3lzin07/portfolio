// Lógica de login e cadastro
document.getElementById('login-form')?.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const email = document.getElementById('login-email').value;
    const senha = document.getElementById('login-senha').value;
    
    const user = JSON.parse(localStorage.getItem('user'));

    if (user && user.email === email && user.senha === senha) {
        localStorage.setItem('loggedIn', 'true');
        window.location.href = 'index.html';
    } else {
        alert('E-mail ou senha incorretos');
    }
});

document.getElementById('cadastro-form')?.addEventListener('submit', function(event) {
    event.preventDefault();

    const nome = document.getElementById('cadastro-nome').value;
    const email = document.getElementById('cadastro-email').value;
    const senha = document.getElementById('cadastro-senha').value;

    localStorage.setItem('user', JSON.stringify({ nome, email, senha }));
    window.location.href = 'login.html';
});

// Logout
document.getElementById('logout')?.addEventListener('click', function(event) {
    event.preventDefault();
    localStorage.removeItem('loggedIn');
    window.location.href = 'login.html';
});
