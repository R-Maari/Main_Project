<?php
$name = $_POST["name"]; 
$pass = $_POST["pass"];

$conn = new mysqli("localhost", "root", "", "nttfplacement");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT pass FROM Users WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Debugging output
        echo "Entered password: " . $pass . "<br>";
        echo "Stored hashed password: " . $row['pass'] . "<br>";

        // Verify password
        if (password_verify($pass, $row['pass'])) {
            echo "<script>";
            echo "alert('Login Successful');";
            echo "window.location.href = 'shop.html';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Incorrect password. Please try again.');";
            echo "window.location.href = 'login.html';";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert('User not found. Please check your email.');";
        echo "window.location.href = 'login.html';";
        echo "</script>";
    }
    $stmt->close();
    $conn->close();
}
?>
