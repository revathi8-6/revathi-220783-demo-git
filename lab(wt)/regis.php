<?php
include "db.php";

if (isset($_POST['register'])) {
    // Get values from form
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM signup WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "This email is already registered!";
    } else {
        // Insert new user
        $insert = mysqli_query($conn,
            "INSERT INTO signup (fullname, email, password)
             VALUES ('$fullname', '$email', '$password')"
        );

        if ($insert) {
            echo "Registration successful!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<h2>Register</h2>
<form method="POST">
    Fullname: <input type="text" name="fullname" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button name="register">Register</button>
</form>


<?php
include "db.php"; // Database connection

if (isset($_POST['register'])) {

    // Clean & format input
    $fullname = ucwords(trim(htmlspecialchars($_POST['fullname'])));
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Input validation
    if (strlen($fullname) < 3) die("Full name too short! Must be at least 3 characters.");
    if (strlen($password) < 6) die("Password too short! Must be at least 6 characters.");
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("Invalid email format!");

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $query = "INSERT INTO signup (fullname, email, password)
              VALUES ('$fullname', '$email', '$hashed_password')";

    if (mysqli_query($conn, $query)) {
        echo "Registration successful! Welcome, $fullname";
    } else {
        die("Database error: " . mysqli_error($conn));
    }
}
?>

<!-- Registration Form -->
<form method="POST">
    Full Name: <input type="text" name="fullname" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button name="register">Register</button>
</form>
