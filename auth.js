document.addEventListener('DOMContentLoaded', () => {
    const regForm = document.getElementById('regForm');
    const loginForm = document.getElementById('loginForm');

    if (regForm) {
        regForm.addEventListener('submit', (event) => {
            event.preventDefault();
            
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const password = document.getElementById('password').value;
            
            if (!email || !phone || !password) {
                alert('Please fill in all fields.');
                return;
            }
            
            // Store user data in localStorage (for demo purposes)
            localStorage.setItem('user', JSON.stringify({ email, phone, password }));
            
            alert('Registration successful!');
            regForm.reset();
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', (event) => {
            event.preventDefault();
            
            const loginEmail = document.getElementById('loginEmail').value;
            const loginPassword = document.getElementById('loginPassword').value;
            
            if (!loginEmail || !loginPassword) {
                alert('Please fill in all fields.');
                return;
            }
            
            const storedUser = JSON.parse(localStorage.getItem('user'));
            
            if (storedUser && storedUser.email === loginEmail && storedUser.password === loginPassword) {
                alert('Login successful!');
                // Redirect to booking page or perform other actions
                window.location.href = 'booking.html'; // Assuming booking.html is the next page
            } else {
                alert('Invalid email or password.');
            }
        });
    }
});
