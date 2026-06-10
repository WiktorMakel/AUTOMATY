<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logowanie";

session_start();

$username_input = $_POST['username'];
$password_input = $_POST['password'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username_input);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    if (password_verify($password_input, $row['password'])) {

        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $row;

        header("Location: dashboard.php");
        exit();

    } else {
        echo "Złe hasło<br>";
        echo '<a href="index.php"><button>Powrót na stronę główną</button></a>';
    }

} else {
    echo "Nie znaleziono użytkownika<br>";
    echo '<a href="index.php"><button>Powrót na stronę główną</button></a>';    
}
?>