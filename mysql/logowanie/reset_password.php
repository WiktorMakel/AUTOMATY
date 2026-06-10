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

    $user = $_POST['username'];
    $new_password = $_POST['new_password'];

    $hashed = password_hash($new_password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
    $stmt->bind_param("ss", $hashed, $user);

    if ($stmt->execute()) {

        if ($stmt->affected_rows > 0) {
            echo "Hasło zmienione<br>";
            echo '<a href="index.php"><button>Powrót na stronę główną</button></a>';
        } else {
            echo "Nie znaleziono użytkownika";
            echo '<a href="index.php"><button>Powrót na stronę główną</button></a>';
        }

    } else {
        echo "Błąd<br>";
        echo '<a href="index.php"><button>Powrót na stronę główną</button></a>';
    }
}
?>