<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="Images/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imamia Mission London UK</title>
    <link rel="stylesheet" href="PT.css">
    <link rel="stylesheet" href="View_ECM.css">
    <script src="https://kit.fontawesome.com/3bf10b99f3.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="nav">
        <div class="nav-brand">
            <h1 class="nav-title">Imamia Mission<br>London UK</h1>
        </div>
        <div class="nav-menu">
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon">&#9776;</label>
            <ul class="nav-links">
                <li class="nav-link"><a href="./index.html">Home</a></li>
                <li class="nav-link"><a href="./About.html">About Us</a></li>
                <li class="nav-link"><a href="./EC.html">Executive Committee</a></li>
                <li class="nav-link"><a href="./Donate.html">Donate to Us</a></li>
                <li class="nav-link active"><a href="./PT.php">Prayer Times</a></li>
                <li class="nav-link"><a href="./BE.html">Building Extension</a></li>
                <li class="nav-link"><a href="./Programmes.html">Programmes</a></li>
                <li class="nav-link"><a href="#" onclick="document.getElementById('login').style.display='block'" style="width:auto;">Login</a></li>
                <li class="nav-link"><a href="#" onclick="document.getElementById('contact').style.display='block'" style="width:auto;">Contact Us</a></li>
            </ul>
        </div>
    </section>
    <section class="scroll">
        <section class="modal" id="login">
            <form class="modal-content animate" action="Login.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="./Images/img_avatar2.png" alt="Avatar" class="avatar">
                </div>
                <div class="container">
                    <label><b>Name</b></label>
                    <input type="text" placeholder="Enter Name" name="name" required>
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="u_name" required>
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="pwd_name" required>
                    <button type="submit">Login</button>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#" style="color: #258d14;">password?</a></span>
                </div>
            </form>
        </section>
        <section class="modal" id="contact">
            <form class="modal-content animate" action="Contact.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('contact').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                <div class="container">
                    <label><b>Name</b></label>
                    <input type="text" placeholder="Enter your name" name="name" required>
                    <label><b>Email</b></label>
                    <input type="email" placeholder="Enter your email address" name="email" required>
                    <label><b>Phone Number</b></label>
                    <input type="tel" placeholder="Enter your phone number" name="tel" required>
                    <label><b>Message</b></label>
                    <textarea name="message" cols="30" rows="10" placeholder="Enter your message..." required></textarea>
                    <button type="submit">Submit</button>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('contact').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </section>

        <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "PT";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM September";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border=1 style='font-size: 1.2em;' width='100%' id='customers'>";
                echo "<tr><th>Date</th><th>Dawn</th><th>Sunrise</th><th>Noon</th><th>Maghrib</th><th>Midnight</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["date"]."</td><td>".$row["dawn"]."</td><td>".$row["rise"]."</td><td>".$row["noon"]."</td><td>".$row["maghrib"]."</td><td>".$row["midnight"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>

        <section class="footer">
            <div class="copyright">
                <label>© All Rights Reserved</label>
            </div>
            <div class="media-container">
                <a href="https://www.facebook.com/imamiamissionlondon"><i class="fa-brands fa-square-facebook fa-2xl" style="color: #ffffff;"></i></a>
                <a href="mailto:imamiamissionuk@gmail.com"><i class="fa-solid fa-square-envelope fa-2xl" style="color: #ffffff;"></i></a>
                <a href="tel:02085549988"><i class="fa-solid fa-square-phone fa-2xl" style="color: #ffffff;"></i></a>
            </div>
        </section>
    </section>
    <script src="script.js"></script>
</body>
</html>
