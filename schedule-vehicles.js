document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('schedule-form');

    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(form);

        fetch('schedule_vehicle.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(result => {
            alert(result); // Show result message
            form.reset(); // Reset the form
            // Optionally refresh the scheduled vehicles table
            fetchScheduledVehicles();
        })
        .catch(error => console.error('Error:', error));
    });

    function fetchScheduledVehicles() {
        fetch('fetch_scheduled_vehicles.php')
            .then(response => response.text())
            .then(result => {
                document.getElementById('schedule-table-container').innerHTML = result;
            })
            .catch(error => console.error('Error:', error));
    }

    fetchScheduledVehicles(); // Initial fetch of scheduled vehicles
});
