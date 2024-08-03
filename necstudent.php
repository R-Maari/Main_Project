<?php


session_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "nttf"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: home.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $stmt = $conn->prepare("SELECT * FROM necstudent WHERE email = ? AND pass = ?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href='student.html';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

