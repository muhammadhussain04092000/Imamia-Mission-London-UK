<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "IMLU";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $message = $_POST["message"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Contact_Form_Responses(timestamp, name, email, phone_number, message) VALUES (current_timestamp(),'$name','$email','$tel','$message')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index.html");
        echo "<script>alert('Contact Form Submitted Successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>