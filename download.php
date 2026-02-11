<?php
$uploadDir = "uploads/";

if (isset($_GET['file'])) {

    $fileName = basename($_GET['file']);
    $filePath = $uploadDir . $fileName;

    if (file_exists($filePath)) {

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . $fileName . "\"");
        header("Content-Length: " . filesize($filePath));

        readfile($filePath);
        exit();
    } else {
        echo "File not found!";
    }
}
?>
