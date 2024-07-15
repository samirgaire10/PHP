<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Taking App</title>
    <link rel="stylesheet" href="../style.css">

</head>

<body>



    <div class="wrapper">
        <main class="content">





            <h1>Note Taking App</h1>
            <form action="save_note.php" method="post">
                <label for="note">Enter your note:</label><br>
                <textarea id="note" name="note" rows="4" cols="50" required></textarea><br>
                <button type="submit">Save Note</button>
            </form>
            <h2>Saved Notes</h2>
            <?php
            if (file_exists("notes.txt")) {
                $notes = file("notes.txt", FILE_IGNORE_NEW_LINES);
                foreach ($notes as $note) {
                    echo "<p>" . htmlspecialchars($note) . "</p>";
                }
            }
            ?>




        </main>

        <footer class="footer">
            <div class="footer-container">
                <div class="footer-links">
                    <a href="../index.html">Home</a>
                    <a href="https://github.com/samirgaire10/">Github</a>
                    <a href="https://samirgaire10.github.io/Portfolio/">Portfolio</a>
                </div>
                <p>&copy; 2024 samirgaire10 . All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>