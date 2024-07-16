<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $note = trim($_POST["note"]);

    if (!empty($note)) {
        // Extract the first few words for the filename
        $words = explode(' ', $note);
        $filenameWords = array_slice($words, 0, 3); // Change the number of words here if needed
        $filename = implode('_', $filenameWords);
        
        // Remove any characters not suitable for filenames
        $filename = preg_replace('/[^a-zA-Z0-9_]/', '_', $filename);
        
        $filename = strtolower($filename) . ".txt";
        
        file_put_contents($filename, $note . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    header("Location: note.php");
    exit();
}
?>