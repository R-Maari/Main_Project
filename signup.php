<?php
$email = $_POST["email"];
$pass = $_POST["pass"];
$otp = $_POST["otp"];




$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

$conn = mysqli_connect("localhost", "root", "", "kaveri");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO authentication (email, pass, otp) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $hashed_pass, $otp);
    $stmt->execute();
    echo "<script>";
    echo "alert('Successfully Signed Up ');";
    echo "window.location.href = 'login.html';";
    echo "</script>";
    $stmt->close();
    $conn->close();
}
?>
