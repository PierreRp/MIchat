get_messages.php

<?php
// Archivo get_messages.php

// Conectar a la base de datos
$servername = "xxxx";
$username = "xxxx";
$password = "xxx+";
$dbname = "xxxx";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los últimos 10 mensajes de la base de datos
$sql = "SELECT * FROM messages ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

$messages = array();

if ($result->num_rows > 0) {
    // Construir un arreglo de mensajes
    while ($row = $result->fetch_assoc()) {
        $messages[] = array(
            "username" => $row["username"],
            "message" => $row["message"]
        );
    }
}

echo json_encode($messages);

$conn->close();
?>
