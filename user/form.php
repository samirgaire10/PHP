<?php
// Define the file path
$filePath = 'user_data.json';

// Check if user_data.json exists
if (file_exists($filePath)) {
    header("Location: show_user_data.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">

    <title>User Data Form</title>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>

<nav id="desktop-nav">
        <div class="logo">
            <a href="https://samirgaire10.github.io/Portfolio/" target="_blank" rel="noopener noreferrer">ガイレ サミル</a>
        </div>
        <div>
            <ul class="nav-links">
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Github</a></li>
                <li><a href="userdata.php">
                <?php
                $username = 'Guest User';
                $filePath = './user/user_data.json';

                if (file_exists($filePath)) {
                    $jsonData = file_get_contents($filePath);
                    $data = json_decode($jsonData, true);
                    
                    if (isset($data['username'])) {
                        $username = $data['username'];
                    }
                }

                echo "<p>Welcome, $username!</p>";
            ?>


                </a></li>
                <!-- <li><a href="#projects">Projects</a></li> 
                <li><a href="./lg/jp.html">Japanese</a></li> -->
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>User Data Form</h1>
        <form action="save_user_data.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="sex">Sex:</label>
            <select id="sex" name="sex" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>


           
            <label for="github">Github:</label>
            <input type="text" id="github" name="github" >


            <label for="twitter">Twitter:</label>
            <input type="text" id="twitter" name="twitter" >

            <div class="consent">
                <label for="privacy_policy">
                    <input type="checkbox" id="privacy_policy" name="privacy_policy" required>
                    I consent to the privacy policy
                </label>
            </div>

            <div class="buttons">
                <input type="button" value="Back" onclick="goBack()">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>