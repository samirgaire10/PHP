<?php
// Define the file path
$filePath = 'user_data.json';

// Check if user_data.json exists
if (file_exists($filePath)) {
    header("Location: blog.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $favorites = $_POST['favorites'];
    $privacy_policy = isset($_POST['privacy_policy']) ? true : false;

    // Create an associative array with the data
    $userData = array(
        'username' => $username,
        'age' => $age,
        'sex' => $sex,
        'email' => $email,
        'favorites' => $favorites,
        'privacy_policy' => $privacy_policy
    );

    // Convert the array to JSON format
    $jsonData = json_encode($userData, JSON_PRETTY_PRINT);

    // Save the JSON data to a file
    file_put_contents($filePath, $jsonData);

    // Display a success message or redirect the user
    echo "User data has been saved successfully.";
} else {
    header("Location: form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Submitted</title>
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
    <div class="container result">
        <h2>Hello, <?php echo htmlspecialchars($username); ?></h2>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
        <p><strong>Sex:</strong> <?php echo htmlspecialchars($sex); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Favorite Things:</strong> <?php echo htmlspecialchars($favorites); ?></p>
        <a href="./blog.php" class="button">Save and Go</a>
    </div>
</body>

</html>