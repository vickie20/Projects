function showSection(sectionId) {
    const sections = document.querySelectorAll('.dashboard-section');
    sections.forEach(section => {
        if (section.id === sectionId) {
            section.classList.add('active');
        } else {
            section.classList.remove('active');
        }
    });
}

document.getElementById('logout-btn').addEventListener('click', () => {
    window.location.href = 'login.html';
});
