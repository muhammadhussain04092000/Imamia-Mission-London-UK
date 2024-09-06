<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "IMLU";
    $role = $_POST["role"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $old_pwd = $_POST["old_pwd"];
    $pwd = $_POST["pwd"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE Admin_Login SET role=$role, email=$email, phone_no=$tel, password=$pwd WHERE password=$old_pwd";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./Profile.html");
        echo "<script>alert('Profile Updated Successfully')</script>";
    } else {
        header("Location: ./Profile.html");
        echo "<script>alert('Old Password is incorrect.Please try again later')</script>";
    }

    $conn->close();
?>