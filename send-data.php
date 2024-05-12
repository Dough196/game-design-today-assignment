<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $postData = file_get_contents("php://input");

    

    // Forward the data to webhook.site
    $ch = curl_init('https://webhook.site/37a686c1-dd07-4827-87e6-8ddf7c5d525a');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Return the response from webhook.site
    echo $response;
} else {
    // Handle other request methods if needed
    http_response_code(405); // Method Not Allowed
    echo "Method Not Allowed";
}
?>