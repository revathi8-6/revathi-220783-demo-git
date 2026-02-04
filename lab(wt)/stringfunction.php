$str = "Hello World from PHP";
$username = "chanti";
$fullname = "revathi";
<?php
echo "<h2>PHP String Functions Demonstration</h2>";

// Original strings
$str = "Hello World from PHP";
$username = "chanti";
$fullname = "revathi";

// Basic String Functions
echo "<b>Basic String Functions</b><br>";
echo "Original string: $str<br>";
echo "strlen(): " . strlen($str) . "<br>";
echo "str_word_count(): " . str_word_count($str) . "<br>";
echo "strrev(): " . strrev($str) . "<br><br>";

// Case Conversion
echo "<b>Case Conversion</b><br>";
echo "strtoupper(): " . strtoupper($str) . "<br>";
echo "strtolower(): " . strtolower($str) . "<br>";
echo "ucfirst(): " . ucfirst($fullname) . "<br>";
echo "ucwords(): " . ucwords($fullname) . "<br><br>";

// Search & Replace
echo "<b>Search & Replace</b><br>";
echo "strpos('World'): " . strpos($str,"World") . "<br>";
echo "str_replace('World','PHP',$str): " . str_replace("World","PHP",$str) . "<br><br>";

// Substring & Trimming
echo "<b>Substring & Trimming</b><br>";
echo "substr(): " . substr($str,0,5) . "<br>";
echo "trim(): '" . trim("  hello  ") . "'<br>";
echo "ltrim(): '" . ltrim("  hello") . "'<br>";
echo "rtrim(): '" . rtrim("hello  ") . "'<br><br>";

// String Comparison
echo "<b>String Comparison</b><br>";
echo "strcmp('a','A'): " . strcmp("a","A") . "<br>";
echo "strcasecmp('a','A'): " . strcasecmp("a","A") . "<br><br>";

// Special Characters & Security
echo "<b>Special Characters & Security</b><br>";
echo "htmlspecialchars('<b>Hi</b>'): " . htmlspecialchars("<b>Hi</b>") . "<br>";
echo "addslashes('O\'Revathi'): " . addslashes("O'Revathi") . "<br><br>";
?>
