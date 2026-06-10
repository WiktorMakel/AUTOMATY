<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logowanie";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    print_r($_POST);

    $user = $_POST['username'];
    $pass = $_POST['password'];

    echo "<br>USER: " . $user;
    echo "<br>PASS: " . $pass;

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    echo "<br>Znaleziono: " . $stmt->num_rows;

    if ($stmt->num_rows > 0) {
        die("Taki użytkownik już istnieje!");
    }

    $hashed = password_hash($pass, PASSWORD_DEFAULT);

    echo "<br>HASH: " . $hashed;

    $stmt = $conn->prepare("INSERT INTO users(username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $hashed);

    if ($stmt->execute()) {
        echo "<br>Rejestracja OK<br>";
        echo '<a href="index.php"><button>Powrót na stronę główną</button></a>';
    } else {
        echo "<br>Błąd: <br>" . $stmt->error;
        echo '<a href="index.php"><button>Powrót na stronę główną</button></a>';
    }
}
?>