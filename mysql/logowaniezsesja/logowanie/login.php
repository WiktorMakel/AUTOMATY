<?php
$connection = new mysqli("localhost", "root", "", "logowanie");

if ($connection->connect_error) {
    die("Błąd połączenia: " . $connection->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if ($password, $user['password']) {
        echo "Zalogowano pomyślnie!";
    } else {
        echo "Błędne hasło.";
    }
} else {
    echo "Użytkownik nie istnieje.";
}

$stmt->close();
$connection->close();
?>
