<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $note = trim($_POST["note"]);

    if (!empty($note)) {
        file_put_contents("notes.txt", $note . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    header("Location: note.php");
    exit();
}

?>
