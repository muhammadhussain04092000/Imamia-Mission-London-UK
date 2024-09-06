<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "IMLU";
    $name = $_POST["name"];
    $names = explode(" ", $name);
    $first_letters = array_map(function($name) {
        return $name[0];
    }, $names);
    echo $first_letters;
    $id = '#'.$first_letters[0].$first_letters[1].rand(1000,9999);
    $role = $_POST["role"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $u_name = $_POST["u_name"];
    $pwd_name = $_POST["pwd_name"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Admin_Login(id, name, role, email, phone_no, username, password) VALUES ('$id','$name','$role','$email','$tel','$u_name','$pwd_name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./Add_ECM.html");
        echo "<script>alert('Executive Committee Member added successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>