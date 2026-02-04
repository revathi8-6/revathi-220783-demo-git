<?php
include "db.php";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check if email exists
    $query = mysqli_query($conn, "SELECT * FROM signup WHERE email='$email'");
    if (mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);

        // Verify password
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome, " . $user['fullname'];
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "Email not registered!";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button name="login">Login</button>
</form>


<?php
include "db.php"; 

if (isset($_POST['login'])) {

    // Clean input
    $email_input = trim($_POST['email']);
    $password_input = $_POST['password'];

    // Fetch user from database
    $query = "SELECT * FROM signup WHERE email='$email_input'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        die("Email not found!");
    }

    $user = mysqli_fetch_assoc($result);

    // Compare email case-insensitively
    if (strcasecmp($email_input, $user['email']) !== 0) {
        die("Email does not match!");
    }

    // Verify password
    if (!password_verify($password_input, $user['password'])) {
        die("Incorrect password!");
    }

    // Successful login
    echo "Welcome, " . $user['fullname'];
}
?>

<!-- Login Form -->
<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button name="login">Login</button>
</form>
