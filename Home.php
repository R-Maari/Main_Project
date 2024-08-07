<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: student.html");
    exit();
}

$email = $_SESSION['email'];
$welcomeMessage = "Welcome to the Home Page"; // Default message

if ($email === 'nec0822058@nttf.co.in') {
    $welcomeMessage = "Welcome to R Maridurai";
}
if ($email === 'nec0822024@nttf.co.in') {
    $welcomeMessage = "Welcome to Janani";
}
if ($email === 'nec0822013@nttf.co.in') {
    $welcomeMessage = "Welcome to Joy Chiristina";
}
if ($email === 'ttc0822042@nttf.co.in') {
    $welcomeMessage = "Welcome to Archana";
}
if ($email === 'ttc0822041@nttf.co.in') {
    $welcomeMessage = "Welcome to Riswan";
}

if ($email === 'nec0822072@nttf.co.in') {
    $welcomeMessage = "Welcome to Sanjai A";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <meta http-equiv="refresh" content="10;url=student-apply.html">
   <link rel="Stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($welcomeMessage); ?></h1>
    <p>You are logged in as <?php echo htmlspecialchars($email); ?>.</p>
    <a href="logout.php">Logout</a>

    
</body>
</html>
