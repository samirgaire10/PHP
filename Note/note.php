<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Taking App</title>
    <link rel="stylesheet" href="../style.css">


    <style>
     .note {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
            position: relative;
            white-space: pre-wrap; /* Preserve new lines */
        }

        .note p {
            margin: 0;
        }

        .delete-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>


</head>

<body>

<div class="wrapper">
        <main class="content">
            <center>
                <h1>Note Taking App</h1>
                <form action="save_note.php" method="post">
                    <label for="note">Enter your note:</label><br>
                    <textarea id="note" name="note" rows="10" cols="100" required></textarea><br>
                    <button type="submit">Save Note</button>
                </form>

                <h2>Saved Notes</h2>
            </center>
            <?php
            $delimiter = "---END OF NOTE---";
            $files = glob("*.txt");
            foreach ($files as $file) {
                $content = file_get_contents($file);
                $notes = explode($delimiter, $content);
                foreach ($notes as $note) {
                    $note = trim($note);
                    if (!empty($note)) {
                        echo "<div class='note'><p>" . htmlspecialchars($note) . "</p>
                            <form action='delete_note.php' method='post' style='display:inline;'>
                                <input type='hidden' name='filename' value='" . htmlspecialchars($file) . "'>
                                <input type='hidden' name='note' value='" . htmlspecialchars($note) . "'>
                                <button type='submit' class='delete-button'>Delete</button>
                            </form>
                        </div>";
                    }
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
                <p>&copy; 2024 samirgaire10. All Rights Reserved.</p>
            </div>
        </footer>
    </div>

    
</body>

</html>