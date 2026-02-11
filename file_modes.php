<?php
echo "<h1>Task 3: PHP File Operation Modes</h1>";

$filename = "mode_demo.txt";

/* -----------------------------
   r → Read only
----------------------------- */
echo "<h2>Mode: r (Read only)</h2>";
if(!file_exists($filename)){
    file_put_contents($filename, "Initial content\n");
}
$handle = fopen($filename, "r");
echo "Reading content:<br>";
echo nl2br(fread($handle, filesize($filename)));
fclose($handle);

/* -----------------------------
   w → Write only (erase old data)
----------------------------- */
echo "<h2>Mode: w (Write only, erase old data)</h2>";
$handle = fopen($filename, "w");
fwrite($handle, "This overwrites previous content\n");
fclose($handle);
echo "Content overwritten using w mode<br>";

/* -----------------------------
   a → Append only
----------------------------- */
echo "<h2>Mode: a (Append only)</h2>";
$handle = fopen($filename, "a");
fwrite($handle, "Appending new line using a mode\n");
fclose($handle);
echo "New line appended<br>";

/* -----------------------------
   x → Create new file (fails if exists)
----------------------------- */
echo "<h2>Mode: x (Create new, fail if exists)</h2>";
$newfile = "new_file.txt";
if(file_exists($newfile)) unlink($newfile); // delete first to demo
$handle = fopen($newfile, "x");
fwrite($handle, "Created using x mode\n");
fclose($handle);
echo "File created using x mode<br>";

/* -----------------------------
   r+ → Read & Write
----------------------------- */
echo "<h2>Mode: r+ (Read & Write)</h2>";
$handle = fopen($filename, "r+");
$content = fread($handle, filesize($filename));
fwrite($handle, "Adding using r+ mode\n");
fclose($handle);
echo "Read & wrote using r+ mode<br>";

/* -----------------------------
   w+ → Read & Write (erase old data)
----------------------------- */
echo "<h2>Mode: w+ (Read & Write, erase old data)</h2>";
$handle = fopen($filename, "w+");
fwrite($handle, "w+ mode erases old data and writes new content\n");
fseek($handle, 0); // move pointer to start
echo "Reading new content: <br>";
echo nl2br(fread($handle, filesize($filename)));
fclose($handle);

/* -----------------------------
   a+ → Read & Append
----------------------------- */
echo "<h2>Mode: a+ (Read & Append)</h2>";
$handle = fopen($filename, "a+");
fwrite($handle, "Appending using a+ mode\n");
fseek($handle, 0);
echo "Reading content after append:<br>";
echo nl2br(fread($handle, filesize($filename)));
fclose($handle);

/* -----------------------------
   x+ → Create new for Read & Write
----------------------------- */
echo "<h2>Mode: x+ (Create new, Read & Write)</h2>";
$handle = fopen("xplus_demo.txt", "x+");
fwrite($handle, "x+ mode content\n");
fseek($handle, 0);
echo "Reading content:<br>";
echo nl2br(fread($handle, filesize("xplus_demo.txt")));
fclose($handle);

echo "<h3>All fopen() modes demonstrated successfully!</h3>";

?>
