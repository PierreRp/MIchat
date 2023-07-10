<?php
// Archivo send_message.php

// Verificar si se ha enviado un mensaje
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $message = $_POST["message"];
    if (!empty($username) && !empty($message)) {
        // Conectar a la base de datos
        $servername = "xxxx";
        $dbusername = "xxxx";
        $dbpassword = "xxx+";
        $dbname = "xxxx";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        // Insertar el mensaje en la base de datos
        $sql = "INSERT INTO messages (username, message) VALUES ('$username', '$message')";
        if ($conn->query($sql) === true) {
            // Mensaje insertado correctamente
            echo "Mensaje enviado.";
        } else {
            echo "Error al enviar el mensaje: " . $conn->error;
        }

        $conn->close();
    }
}
?>
