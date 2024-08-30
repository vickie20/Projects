document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Default credentials
    const defaultUsername = 'admin';
    const defaultPassword = 'admin123';

    if (username === defaultUsername && password === defaultPassword) {
        window.location.href = 'dashboard.html';
    } else {
        document.getElementById('error-message').textContent = 'Invalid username or password';
        document.getElementById('error-message').style.display = 'block';
    }
});
