<?php
$connection = new mysqli("localhost", "root", "", "logowanie");

if ($connection->connect_error) {
    die("Błąd połączenia: " . $connection->connect_error);
}

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if (!$username || !$password) {
    die("Brak danych z formularza.");
}


$username = $_POST['username'];
$password = $password = $_POST['password'];

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "Użytkownik został zarejestrowany!";
} else {
    echo "Błąd: " . $stmt->error;
}

$stmt->close();
$connection->close();
?>