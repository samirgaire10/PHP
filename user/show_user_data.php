<?php
// Define the file path
$filePath = 'user_data.json';

// Initialize user data
$userData = array(
    'username' => 'Guest User',
    'age' => '',
    'sex' => '',
    'email' => '',
    'favorites' => '',
    'twitter' => '',
    'github' => ''
);

// Check if user_data.json exists
if (file_exists($filePath)) {
    $jsonData = file_get_contents($filePath);
    $userData = json_decode($jsonData, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Submitted</title>
    <link rel="stylesheet" href="../style.css">

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

        h2 {
            color: #343a40;
            text-align: center;
        }

        p {
            color: #495057;
            font-size: 1.1em;
            margin: 10px 0;
        }

        .button {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
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
                <li><a href="show_user_data.php">
                    <p>Welcome, <?php echo htmlspecialchars($userData['username']); ?>!</p>
                </a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <h2>User Data</h2>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($userData['username']); ?></p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($userData['age']); ?></p>
        <p><strong>Sex:</strong> <?php echo htmlspecialchars($userData['sex']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
        <p><strong>Github:</strong> <?php echo htmlspecialchars($userData['github']); ?></p>
        <p><strong>Twitter:</strong> <?php echo htmlspecialchars($userData['twitter']); ?></p>
        <p><strong>Favorite Things:</strong> <?php echo htmlspecialchars($userData['favorites']); ?></p>
        <a href="../index.php" class="button">Save and Go</a>
    </div>
</body>

</html>