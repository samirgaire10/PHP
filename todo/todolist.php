<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do List</title>
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

        <h1>Simple To-Do List</h1>
<center>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="task" placeholder="Enter a task...">
        <button type="submit">Add Task</button>
    </form>
    </center>
    <ul>
        <?php
        // Function to read tasks from file
        function readTasksFromFile($filename) {
            $tasks = [];
            if (file_exists($filename)) {
                $tasks = file($filename, FILE_IGNORE_NEW_LINES);
            }
            return $tasks;
        }

        // Function to save tasks to file
        function saveTasksToFile($filename, $tasks) {
            file_put_contents($filename, implode("\n", $tasks));
        }

        $tasksFile = 'tasks.txt';

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newTask = trim($_POST['task'] ?? '');
            if (!empty($newTask)) {
                $tasks = readTasksFromFile($tasksFile);
                $tasks[] = $newTask;
                saveTasksToFile($tasksFile, $tasks);
            }
        }

        // Handle task deletion
        if (isset($_POST['delete'])) {
            $deleteIndex = $_POST['delete'];
            $tasks = readTasksFromFile($tasksFile);
            if (isset($tasks[$deleteIndex])) {
                unset($tasks[$deleteIndex]);
                saveTasksToFile($tasksFile, $tasks);
            }
        }

        // Display tasks
        $tasks = readTasksFromFile($tasksFile);
        foreach ($tasks as $index => $task) {
            echo '<li><span>' . htmlspecialchars($task) . '</span> 
                <form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                    <input type="hidden" name="delete" value="'.$index.'">
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
                </li>';
        }
        ?>
    </ul>




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