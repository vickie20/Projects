document.addEventListener('DOMContentLoaded', function() {
    const vehicleSelect = document.getElementById('vehicle');
    const seatElements = document.querySelectorAll('.seat');
    const bookNowButton = document.getElementById('book-now');
    const selectedSeatsInput = document.getElementById('selectedSeatsInput');
    const routeSelect = document.getElementById('route');
    const pickupSelect = document.getElementById('pickup');
    const dropSelect = document.getElementById('drop');
    const dateInput = document.getElementById('travel-date');
    const timeSelect = document.getElementById('travel-time');

    // Show/hide seat layouts based on vehicle selection
    vehicleSelect.addEventListener('change', function() {
        const selectedVehicle = this.value;
        document.getElementById('14-seater').classList.toggle('hidden', selectedVehicle !== '14-seater');
        document.getElementById('11-seater').classList.toggle('hidden', selectedVehicle !== '11-seater');
    });

    // Handle seat selection
    seatElements.forEach(seat => {
        seat.addEventListener('click', function() {
            if (!this.classList.contains('driver-seat')) {
                this.classList.toggle('selected');
            }
        });
    });

    // Handle Book Now button click
    bookNowButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Collect selected seats
        const selectedSeats = Array.from(document.querySelectorAll('.seat.selected')).map(seat => seat.id).join(', ');
        selectedSeatsInput.value = selectedSeats; // Set the hidden input value

        // Validate form fields
        if (!routeSelect.value || !pickupSelect.value || !dropSelect.value || !dateInput.value || !timeSelect.value || !vehicleSelect.value) {
            alert('Please fill all the required fields.');
            return;
        }

        // Call the function to proceed to payment
        proceedToPayment();
    });
});
