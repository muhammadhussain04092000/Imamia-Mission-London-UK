<?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "IMLU";
    $email = $_POST["email"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assuming you have a unique emailentifier for the row, let's call it 'email'
        if (isset($_POST['email']) && is_numeric($_POST['email'])) {
            $email = $_POST['email'];

            // SQL to delete a row with a specific 'email' from your_table
            $deleteQuery = "DELETE FROM Contact_Form_Responses WHERE email = $email";

            if ($conn->query($deleteQuery) === TRUE) {
                echo "<script>alert('Data Deleted Successfully')</script>";
            } else {
                echo "<script>alert('Error deleting data')</script>";
            }
        } else {
            echo "<script>alert('Unable to fetch deleting data')</script>";
        }
    }
?>