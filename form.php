<?php
// Validate and process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Validate input fields
    if (empty($fullName) || empty($phoneNumber) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are mandatory. Please fill in all the fields.";
    } else {
        // Insert into the database
        $host = "your_host";
        $username = "your_username";
        $password = "your_password";
        $database = "your_database";

        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $ipAddress = $_SERVER["REMOTE_ADDR"];
        $timestamp = date("Y-m-d H:i:s");

        $sql = "INSERT INTO contact_form (fullName, phoneNumber, email, subject, message, ipAddress, timestamp) VALUES ('$fullName', '$phoneNumber', '$email', '$subject', '$message', '$ipAddress', '$timestamp')";

        if ($conn->query($sql) === TRUE) {
            // Send email notification
            $to = "siteowner@example.com";
            $subjectEmail = "New Form Submission";
            $messageEmail = "A new form submission has been received:\n\nFull Name: $fullName\nPhone Number: $phoneNumber\nEmail: $email\nSubject: $subject\nMessage: $message";

            mail($to, $subjectEmail, $messageEmail);

            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>
