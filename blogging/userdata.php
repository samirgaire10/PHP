<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $age = htmlspecialchars($_POST['age']);
    $sex = htmlspecialchars($_POST['sex']);
    $email = htmlspecialchars($_POST['email']);
    $favorites = htmlspecialchars($_POST['favorites']);
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
            <h2>Hello, <?php echo $username; ?></h2>
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Age:</strong> <?php echo $age; ?></p>
            <p><strong>Sex:</strong> <?php echo $sex; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Favorite Things:</strong> <?php echo $favorites; ?></p>
            <a href="blog.php" class="button">Submmit</a>
        </div>
    </body>

    </html>

    <?php
} else {
    header("Location: form.html");
    exit();
}
?>