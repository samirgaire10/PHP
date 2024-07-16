<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST['filename'];

    if (file_exists($filename)) {
        unlink($filename);
    }

    header("Location: note.php");
    exit();
}
?>