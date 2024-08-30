document.addEventListener('DOMContentLoaded', function() {
    // Function to show a specific section
    function showSection(sectionId) {
        document.querySelectorAll('.dashboard-section').forEach(section => {
            section.style.display = 'none';
        });
        document.getElementById(sectionId).style.display = 'block';
    }

    // Load bookings into the table
    function loadBookings() {
        fetch('get_bookings.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('booking-table-container').innerHTML = data;
            });
    }

    // Event listener for section links
    document.querySelectorAll('nav a').forEach(link => {
        link.addEventListener('click', function(event) {
            const sectionId = this.getAttribute('onclick').match(/'(.+?)'/)[1];
            showSection(sectionId);
            if (sectionId === 'manage-bookings') {
                loadBookings();
            }
        });
    });

    // Initial load
    showSection('manage-bookings');
});
