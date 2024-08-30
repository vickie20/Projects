document.addEventListener('DOMContentLoaded', function () {
    // Fetch data from URL parameters
    const urlParams = new URLSearchParams(window.location.search);

    const route = urlParams.get('route');
    const pickup = urlParams.get('pickup');
    const drop = urlParams.get('drop');
    const travelDate = urlParams.get('travel_date');
    const travelTime = urlParams.get('travel_time');
    const vehicle = urlParams.get('vehicle');
    const seats = urlParams.get('seats'); // Ensure 'seats' parameter is passed in URL
    const amountDue = (vehicle === '14-seater') ? '450 Ksh' : '500 Ksh';

    // Display the data on the payment page
    document.getElementById('display-route').textContent = route || 'N/A';
    document.getElementById('display-pickup').textContent = pickup || 'N/A';
    document.getElementById('display-drop').textContent = drop || 'N/A';
    document.getElementById('display-date').textContent = travelDate || 'N/A';
    document.getElementById('display-time').textContent = travelTime || 'N/A';
    document.getElementById('display-vehicle').textContent = vehicle || 'N/A';
    document.getElementById('display-seats').textContent = seats && seats.length > 0 ? seats : 'No seats selected';
    document.getElementById('display-amount').textContent = amountDue;

    // Add event listener for the 'Pay Now' button (if needed)
    document.getElementById('pay-now').addEventListener('click', function () {
        // Handle the payment process
        alert('Proceeding to payment gateway...'); // Placeholder action
    });
});
