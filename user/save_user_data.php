<?php
// Define the file path
$filePath = 'user_data.json';

// Check if user_data.json exists
if (file_exists($filePath)) {
    header("Location: show_user_data.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $privacy_policy = isset($_POST['privacy_policy']) ? true : false;
    $twitter = isset($_POST['twitter']) ? $_POST['twitter'] : " ";
    $github = isset($_POST['github']) ? $_POST['github'] : " ";
    $favorites = isset($_POST['favorites']) ? $_POST['favorites'] : " ";

    // Create an associative array with the data
    $userData = array(
        'username' => $username,
        'age' => $age,
        'sex' => $sex,
        'email' => $email,
        'favorites' => $favorites,
        'twitter' => $twitter,
        'github' => $github,
        'privacy_policy' => $privacy_policy
    );

    // Convert the array to JSON format
    $jsonData = json_encode($userData, JSON_PRETTY_PRINT);

    // Save the JSON data to a file
    file_put_contents($filePath, $jsonData);

    // Redirect to show user data
    header("Location: show_user_data.php");
    exit();
} else {
    header("Location: form.php");
    exit();
}
?>