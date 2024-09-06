<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="Images/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imamia Mission London UK</title>
    <link rel="stylesheet" href="View_ECM.css">
    <script src="https://kit.fontawesome.com/3bf10b99f3.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #414141;
        }

        #customers tr:hover {background-color: #625f5f;}
    </style>
</head>
<body>
    <section class="nav">
        <div class="nav-brand">
            <h1 class="nav-title">Imamia Mission<br>London UK</h1>
        </div>
        <div class="nav-menu">
            <ul class="nav-links">
                <li class="nav-link"><a href="./admin.html">Home</a></li>
                <li class="nav-link"><a href="./View_ECM.php">Committee Members</a></li>
                <li class="nav-link active"><a href="./View_Jaloos.php">Jaloos Volunteer Responses</a></li>
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
            die("Connection failed: ". $conn->connect_error);
        }

        $sql = "select * from Jaloos_Form_Responses";
        $result = $conn->query($sql);

        echo "<table border = 1 style='font-size: 1.2em;' id='customers'><tr><th>ID</th><th>Timestamp</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Profession</th><th>Age</th><th>Gender</th><th>First Aid Trained</th><th><a href='JCreate.php' style='font-size: 20px; background-color: white; padding: 3px 5px; text-decoration: none; color: #258d14; border-radius: 5px;'>Insert</a></th></tr>";

        while ($row = $result->fetch_assoc()){
            echo "
                <tr ".($row["fat"] == 'Yes'? "style='background-color: yellow; color: black'" : "")." >
                    <td>".$row["id"]."</td>
                    <td>".$row["timestamp"]."</td>
                    <td>".$row["first_name"]."</td>
                    <td>".$row["last_name"]."</td>
                    <td>".$row["phone_no"]."</td>
                    <td>".$row["profession"]."</td>
                    <td>".$row["age"]."</td>
                    <td>".$row["gender"]."</td>
                    <td>".$row["fat"]."</td>
                    <td>
                        <a style='font-size: 20px; background-color: #0e6cc4; padding: 5px; text-decoration: none; color: #fff; border-radius: 3px;' href='JEdit.php?id=$row[id]'>Edit</a>
                        &nbsp
                        <a style='font-size: 20px; background-color: #e0261f; padding: 5px; text-decoration: none; color: #fff; border-radius: 3px;' href='JDelete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
            ";
        }

        echo "</form></table>";
   ?>
    </section>
    <form action="export_to_excel.php" method="get">
        <button type="submit">Download as Excel</button>
    </form>
    <script src="script.js"></script>
</body>
</html>