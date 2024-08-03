<?php
$email = ($_POST["email"]); 
$pass = $_POST["pass"];

$conn = mysqli_connect("localhost", "root", "", "nttf");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
  
    $stmt = $conn->prepare("SELECT pass FROM necstudent WHERE (email) = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($pass, $row['pass'])) {
            echo "<script>";
            echo "alert('Login Successful');";
            echo "window.location.href = 'Home.html';";
            echo "</script>";
        } else {
            // Invalid password
            echo "<script>";
            echo "alert('Incorrect password. Please try again.');";
            echo "window.location.href = 'student.html';";
            echo "</script>";
        }
    } else {
        // User not found
        echo "<script>";
        echo "alert('User not found. Please check your email.');";
        echo "window.location.href = 'student.html';";
        echo "</script>";
    }
    $stmt->close();
    $conn->close();
}
?>
