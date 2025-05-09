<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "dmelanybeauty";

try {
    // Crear conexión
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurar el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO contactos (nombre, email, telefono, servicio, mensaje, fecha_contacto) 
                           VALUES (:nombre, :email, :telefono, :servicio, :mensaje, NOW())");

    // Vincular parámetros
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $stmt->bindParam(':servicio', $_POST['servicio']);
    $stmt->bindParam(':mensaje', $_POST['mensaje']);

    // Ejecutar la consulta
    $stmt->execute();

    // Redirigir con mensaje de éxito
    header("Location: contactos.html?status=success");
} catch(PDOException $e) {
    // En caso de error, redirigir con mensaje de error
    header("Location: contactos.html?status=error");
}

// Cerrar la conexión
$conn = null;
?>