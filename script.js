document.addEventListener("DOMContentLoaded", function() {
    const seatLayout = document.getElementById("seatLayout");
    const bookingForm = document.getElementById("bookingForm");

    // Function to generate seat layout dynamically
    function generateSeatLayout() {
        // Example seat rows for 14-seater or 11-seater
        const seatRows = [
            [ 'C2', 'F3', 'I4','L5'],
            ['A1','D2','G3','J4','M5'],
            ['B1','E2','H3','K4','N5'],
           // ['D1', 'D2', 'D3', 'D4'],
        ];

        seatLayout.innerHTML = '';
        seatRows.forEach((row, index) => {
            const rowDiv = document.createElement("div");
            rowDiv.className = `seat-row ${index === 1 ? 'middle' : ''}`;
            row.forEach(seat => {
                const seatDiv = document.createElement("div");
                seatDiv.className = "seat";
                seatDiv.innerHTML = `
                    <input type="checkbox" id="${seat}" name="seats" value="${seat}">
                    <label for="${seat}">${seat}</label>
                `;
                seatDiv.addEventListener("click", function() {
                    const checkbox = this.querySelector("input[type='checkbox']");
                    checkbox.checked = !checkbox.checked;
                    this.classList.toggle("selected");
                });
                rowDiv.appendChild(seatDiv);
            });
            seatLayout.appendChild(rowDiv);
        });
    }

    generateSeatLayout();

    bookingForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(bookingForm);
        const selectedSeats = Array.from(formData.getAll('seats')).filter(seat => seat); // Filter out empty values

        // Calculate total price (example)
        const pricePerSeat = 500;
        const totalPrice = selectedSeats.length * pricePerSeat;

        // Redirect to payment page with query parameters
        window.location.href = `payment.html?seats=${selectedSeats.join(',')}&totalPrice=${totalPrice}`;
    });
});
