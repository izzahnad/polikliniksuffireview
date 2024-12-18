<?php
// Database connection settings
$servername = "localhost"; // Adjust if not localhost
$username = "root";
$password = "";
$dbname = "clinic_reviews";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = intval($_POST['rating']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (rating, feedback) VALUES ('$rating', '$feedback')";
    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

