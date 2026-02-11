<?php

echo "<h1>PHP File Functions - Complete Demonstration</h1>";

$file = "sample.txt";

/* ===================================================
   1. FILE READ / WRITE FUNCTIONS
=================================================== */

echo "<h2>1. File Read / Write</h2>";

/* fopen() */
$handle = fopen($file, "w");
echo "File opened using fopen()<br>";

/* fwrite() */
fwrite($handle, "Hello PHP\n");
fwrite($handle, "This is Task 2\n");
echo "Data written using fwrite()<br>";

/* fclose() */
fclose($handle);
echo "File closed using fclose()<br>";

/* fread() */
$handle = fopen($file, "r");
$content = fread($handle, filesize($file));
echo "<b>fread() Output:</b><br>";
echo nl2br($content);
fclose($handle);

/* file_get_contents() */
echo "<br><b>file_get_contents() Output:</b><br>";
echo nl2br(file_get_contents($file));

/* file_put_contents() */
file_put_contents($file, "Updated using file_put_contents()\n");
echo "<br>File updated using file_put_contents()<br>";

/* file() */
echo "<br><b>file() Output (Array):</b><br>";
print_r(file($file));


/* ===================================================
   2. FILE INFORMATION FUNCTIONS
=================================================== */

echo "<hr><h2>2. File Information</h2>";

echo "file_exists(): " . (file_exists($file) ? "Yes" : "No") . "<br>";
echo "filesize(): " . filesize($file) . " bytes<br>";
echo "filetype(): " . filetype($file) . "<br>";
echo "fileatime(): " . date("Y-m-d H:i:s", fileatime($file)) . "<br>";
echo "filemtime(): " . date("Y-m-d H:i:s", filemtime($file)) . "<br>";
echo "filectime(): " . date("Y-m-d H:i:s", filectime($file)) . "<br>";
echo "fileperms(): " . substr(sprintf('%o', fileperms($file)), -4) . "<br>";
echo "fileowner(): " . fileowner($file) . "<br>";
echo "filegroup(): " . filegroup($file) . "<br>";
echo "fileinode(): " . fileinode($file) . "<br>";


/* ===================================================
   3. FILE & FOLDER MANAGEMENT
=================================================== */

echo "<hr><h2>3. File & Folder Management</h2>";

/* copy() */
copy($file, "copy.txt");
echo "File copied using copy()<br>";

/* rename() */
rename("copy.txt", "renamed.txt");
echo "File renamed using rename()<br>";

/* mkdir() */
mkdir("newfolder");
echo "Folder created using mkdir()<br>";

/* is_file() */
echo "is_file(sample.txt): " . (is_file($file) ? "Yes" : "No") . "<br>";

/* is_dir() */
echo "is_dir(newfolder): " . (is_dir("newfolder") ? "Yes" : "No") . "<br>";

/* unlink() */
unlink("renamed.txt");
echo "File deleted using unlink()<br>";

/* rmdir() */
rmdir("newfolder");
echo "Folder deleted using rmdir()<br>";


/* ===================================================
   4. DIRECTORY HANDLING
=================================================== */

echo "<hr><h2>4. Directory Handling</h2>";

/* scandir() */
echo "<b>scandir():</b><br>";
print_r(scandir("."));

/* opendir() */
echo "<br><b>opendir(), readdir(), closedir():</b><br>";

$dir = opendir(".");

while(($entry = readdir($dir)) !== false) {
    echo $entry . "<br>";
}

/* closedir() */
closedir($dir);

/* getcwd() */
echo "<br><b>getcwd():</b><br>";
echo getcwd() . "<br>";

/* chdir() */
echo "<br><b>chdir():</b><br>";
if(is_dir("uploads")) {
    chdir("uploads");
    echo "Changed directory to uploads<br>";
    echo "New Path: " . getcwd();
} else {
    echo "uploads folder not found<br>";
}


/* ===================================================
   5. FILE LOCKING
=================================================== */

echo "<hr><h2>5. File Locking</h2>";

$lock = fopen("lockfile.txt", "w");

if(flock($lock, LOCK_EX)) {
    fwrite($lock, "File locked using flock()");
    flock($lock, LOCK_UN);
    echo "File locked and written successfully<br>";
} else {
    echo "Unable to lock file<br>";
}

fclose($lock);

echo "<hr><h3>All File Functions Executed Successfully</h3>";

?>
