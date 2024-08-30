<?php
// Include any required libraries and initialize variables
require 'vendor/autoload.php'; // For Composer dependencies if needed

// Retrieve the POST data
$data = json_decode(file_get_contents('php://input'), true);
$phoneNumber = $data['phoneNumber'] ?? '';
$amount = $data['amount'] ?? '';
$pin = $data['pin'] ?? ''; // This should not be sent to the server in a real implementation

// Define M-Pesa API credentials and URLs
$mpesaAPIUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'; // Use the live URL for production
$shortcode = 'your_shortcode';
$lipanampesaOnlineShortcode = 'your_shortcode';
$lipanampesaOnlineShortcodePassword = 'your_shortcode_password';
$consumerKey = 'your_consumer_key';
$consumerSecret = 'your_consumer_secret';

// Function to get an access token from M-Pesa
function getAccessToken($consumerKey, $consumerSecret) {
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $headers = [
        'Authorization: Basic ' . base64_encode($consumerKey . ':' . $consumerSecret)
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response)->access_token;
}

// Get access token
$accessToken = getAccessToken($consumerKey, $consumerSecret);

// Set up payment request
$headers = [
    'Authorization: Bearer ' . $accessToken,
    'Content-Type: application/json'
];

$timestamp = date('YmdHis');
$payload = [
    "BusinessShortCode" => $lipanampesaOnlineShortcode,
    "Password" => base64_encode($lipanampesaOnlineShortcode . $lipanampesaOnlineShortcodePassword . $timestamp),
    "Timestamp" => $timestamp,
    "TransactionType" => "CustomerPayBillOnline",
    "Amount" => $amount,
    "PartyA" => $phoneNumber,
    "PartyB" => $shortcode,
    "PhoneNumber" => $phoneNumber,
    "CallBackURL" => "https://yourcallbackurl.com/callback",
    "AccountNumber" => "12345",
    "TransactionDesc" => "Payment for booking"
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $mpesaAPIUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$responseArray = json_decode($response, true);

// Return response to the client
if ($http_code == 200) {
    echo json_encode(['success' => true, 'message' => 'Payment processed successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Payment processing failed']);
}
?>
