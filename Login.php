<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "IMLU";
    $name = $_POST["name"];
    $u_name = $_POST["u_name"];
    $pwd_name = $_POST["pwd_name"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "select * from Admin_Login";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()){
        if ($row["username"] == $u_name && $row["password"] == $pwd_name){
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header("Location: admin.html");
        } else {
            echo "<script>alert('Invalid Credentials. Please try again later')</script>";
            header("Location: index.html");
        }
    }

    // if($flag == 0){
    //     header("Location: index.html");
    //     echo "<script>alert('Username or Password is incorrect. Please try again later')</script>";
    // }
?>