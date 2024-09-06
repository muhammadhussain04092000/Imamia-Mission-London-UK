<?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "IMLU";

        $connection = new mysqli($servername, $username, $password, $dbname);

        $sql = "DELETE FROM Jaloos_Form_Responses WHERE id=$id";
        $connection->query($sql);
    }

    header("Location: View_Jaloos.php");
    exit;
?>