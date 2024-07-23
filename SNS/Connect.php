<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../style.css">
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
                <li><a href="../user/userdata.php">
                        <?php
                        $username = 'Guest User';
                        $filePath = '../user/user_data.json';

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
               
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <main class="content">

            <h1> <?php  echo "<p>Welcome to, $username `s   SNS Page</p>"; ?> </h1>






        </main>



        
        <footer class="footer">
            <div class="footer-container">
                <div class="footer-links">
                    <a href="../index.php">Home</a>
                    <a href="https://github.com/samirgaire10/">Github</a>
                    <a href="https://samirgaire10.github.io/Portfolio/">Portfolio</a>
                </div>
                <p>&copy; 2024 samirgaire10 . All Rights Reserved.</p>
            </div>
        </footer>
</body>

</html>