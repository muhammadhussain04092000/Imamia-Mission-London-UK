<?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "IMLU";
    $id = $_POST["id"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming you have a unique identifier for the row, let's call it 'id'
    if ($row["id"] == $id) {
        $deleteQuery = "DELETE FROM ECM WHERE id = $id";

        if ($conn->query($deleteQuery) === TRUE) {
            header("Location: ./View_ECM.php");
        } else {
            echo "Error deleting row: " . $conn->error;
        }
    } else {
        echo "Error";
    }

    $conn->close();
?>
