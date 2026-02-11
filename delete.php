<?php
$uploadDir = "uploads/";

if (isset($_GET['file'])) {

    $fileName = basename($_GET['file']);
    $filePath = $uploadDir . $fileName;

    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

header("Location: index.php");
exit();
?>
