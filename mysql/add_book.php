<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteka";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'], $_POST['author'])) {
    $title = $conn->real_escape_string($_POST["title"]);
    $author = $conn->real_escape_string($_POST["author"]);

    $sql = "INSERT INTO books (title, author) VALUES ('$title', '$author')";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<p style='color:red;'>Błąd: " . $conn->error . "</p>";
    }
}

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $sql_delete = "DELETE FROM books WHERE id = $delete_id";
    if ($conn->query($sql_delete) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<p style='color:red;'>Błąd podczas usuwania: " . $conn->error . "</p>";
    }
}

$sql = "SELECT id, title, author FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka</title>
</head>
<body>
    <h2>Dodaj książkę do biblioteki</h2>
    <form method="POST" action="">
        <label>Tytuł:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Autor:</label><br>
        <input type="text" name="author" required><br><br>

        <button type="submit">Dodaj książkę</button>
    </form>

    <h2>Lista książek w bibliotece</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>ID</th><th>Tytuł</th><th>Autor</th><th>Akcje</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["author"]) . "</td>";
            echo "<td>
                    <a href='?delete_id=" . $row["id"] . "' onclick=\"return confirm('Czy na pewno chcesz usunąć tę książkę?');\">Usuń</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Brak książek w bibliotece.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
