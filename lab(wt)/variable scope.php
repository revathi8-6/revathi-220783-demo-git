<?php
echo "<h2>PHP Variables & Scope Demonstration</h2>";

// ---------------------------
// Datatypes
// ---------------------------

// 1. String
$name = "John Doe";
echo "String: Name = $name <br>";

// 2. Integer
$age = 21;
echo "Integer: Age = $age <br>";

// 3. Float
$gpa = 8.75;
echo "Float: GPA = $gpa <br>";

// 4. Boolean
$is_registered = true;
echo "Boolean: Registered? " . ($is_registered ? "Yes" : "No") . "<br>";

// 5. Array
$subjects = ["Math", "Physics", "Chemistry"];
echo "Array: Subjects = ";
foreach ($subjects as $subject) {
    echo $subject . " ";
}
echo "<br><br>";

// local scope
function localScope() {
    $localVar = "I am local";
    echo "Inside localScope(): $localVar<br>";
}
localScope();
// echo $localVar; // ERROR! Cannot access outside

//global scope
$globalVar = "I am global";

function globalScope() {
    global $globalVar;
    echo "Inside globalScope(): $globalVar<br>";
}
globalScope();

//static scope
function staticScope() {
    static $count = 0;
    $count++;
    echo "Inside staticScope(): Count = $count<br>";
}
staticScope(); // 1
staticScope(); // 2
staticScope(); // 3

