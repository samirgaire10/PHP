<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./style.css">
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
                <li><a href="user/userdata.php">
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

    <div class="wrapper">
        <main class="content">
            <div class="projects-container">
                <div class="project">
                    <a href="./todo/todolist.php">
                        <img src="./icons/todo.png" alt="Todo App Icon">
                        <p>Todo App</p>
                    </a>
                </div>
                <div class="project">
                    <a href="./Note/note.php">
                        <img src="./icons/note.png" alt="Note App Icon">
                        <p>Note App</p>
                    </a>
                </div>
                <div class="project">
                    <a href="./maps/maps.php">
                        <img src="./icons/hospital.png" alt="maps App Icon">
                        <p>Emergency map</p>
                    </a>
                </div>
                <div class="project">
                    <a href="./blogging/blog.php">
                        <img src="./icons/blog.png" alt="blog App Icon">
                        <p>My Blogging</p>
                    </a>
                </div>

                <div class="project">
                    <a href="SNS/Connect.php">
                        <img src="icons/sns.png" alt="SNS">
                        <p>SNS</p>
                    </a>
                </div>

                <div class="project">
                    <a href="./user/form.php">
                        <img src="./icons/profile.png" alt="User Registration Icon">
                        <p>User Registration</p>
                    </a>
                </div>
            </div>

        </main>

        <footer class="footer">
            <div class="footer-container">
                <div class="footer-links">
                    <a href="./index.php">Home</a>
                    <a href="https://github.com/samirgaire10/">Github</a>
                    <a href="https://samirgaire10.github.io/Portfolio/">Portfolio</a>
                </div>
                <p>&copy; 2024 samirgaire10 . All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>