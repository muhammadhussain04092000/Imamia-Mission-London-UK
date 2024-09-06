<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="Images/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imamia Mission London UK</title>
    <link rel="stylesheet" href="View_ECM.css">
    <script src="https://kit.fontawesome.com/3bf10b99f3.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="nav">
        <div class="nav-brand">
            <h1 class="nav-title">Imamia Mission<br>London UK</h1>
        </div>
        <div class="nav-menu">
            <ul class="nav-links">
                <li class="nav-link"><a href="./admin.html">Home</a></li>
                <li class="nav-link active"><a href="./View_ECM.php">Committee Members</a></li>
                <li class="nav-link"><a href="./View_Jaloos.php">Jaloos Volunteer Responses</a></li>
                <li class="nav-link"><a href="./View_Contact.php">Contact Form Responses</a></li>
                <li class="nav-link"><a href="./Logout.php">Log Out</a></li>
        </div>
    </section>
    <section class="scroll">
    <?php
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            // Redirect to login page if not authenticated
            header("Location: index.html");
            exit;
        }
        
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "IMLU";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from ECM";
        $result = $conn->query($sql);

        echo "<table border = 1 style='font-size: 1.2em;' id='customers'><tr><th>Name</th><th>Role</th><th>Date of Appointment</th><th>Other Trusteeships</th></tr>";

        while ($row = $result->fetch_assoc()){
            echo "<td>".$row["name"]."</td><td>".$row["role"]."</td><td>".$row["date"]."</td><td>".$row["other"]."</td></tr>";
        }

        echo "</table>";
    ?>
    </section>
    <script src="script.js"></script>
</body>
</html>