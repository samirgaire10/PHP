<?php
// Define the file path
$filePath = 'user_data.json';

// Check if user_data.json exists
if (file_exists($filePath)) {
    header("Location: blog.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 50px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        h1 {
            color: #343a40;
            text-align: center;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #495057;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #80bdff;
            outline: none;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        .buttons input {
            width: 48%;
        }
        input[type="submit"],
        input[type="button"] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #0056b3;
        }
        .consent {
            margin-top: 20px;
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>User Data Form</h1>
        <form action="userdata.php" method="POST">
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

            <label for="favorites">Favorite Things:</label>
            <input type="text" id="favorites" name="favorites" required>

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