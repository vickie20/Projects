<?php
// Retrieve POST data from M-Pesa
$callbackData = file_get_contents('php://input');
$data = json_decode($callbackData, true);

// Check if the payment was successful
if ($data['Body']['stkCallback']['ResultCode'] == 0) {
    $seatNumber = $_POST['seatNumber']; // This should be passed from the client-side
    $uniqueCode = uniqid('TICKET_');
    $paymentDate = date('Y-m-d H:i:s');
    
    // Save ticket details to database or perform other actions
    // Example output:
    echo "Payment successful. Ticket details: <br>";
    echo "Seat Number: $seatNumber <br>";
    echo "Unique Code: $uniqueCode <br>";
    echo "Date of Payment: $paymentDate";
} else {
    // Handle payment failure
    echo "Payment failed.";
}
?>
