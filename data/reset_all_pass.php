<?php
// Ajusta la ruta de db_access.php según la ubicación de este archivo
require_once __DIR__ . '/../db/db_access.php';

// Conexión a la base de datos
$conn = new Conexion();
$db = $conn->conectar();

// Traer todos los usuarios
$usuarios = $db->query("SELECT correo FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Usuarios y nuevas contraseñas temporales</h2><ul>";

foreach($usuarios as $u){
    $correo = $u['correo'];
    
    // Generar contraseña aleatoria de 6 caracteres
    $nueva = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);
    
    // Hashear la contraseña
    $hash = password_hash($nueva, PASSWORD_DEFAULT, ["cost"=>5]);
    
    // Actualizar la base de datos
    $stmt = $db->prepare("UPDATE usuarios SET password=? WHERE correo=?");
    $stmt->execute([$hash, $correo]);
    
    echo "<li>$correo : <strong>$nueva</strong></li>";
}

echo "</ul><p>¡Todas las contraseñas han sido reseteadas!</p>";
?>



<!-- Usuarios y nuevas contraseñas temporales
willqm12@gmail.com : uLOwvr
mariel@gmail.com : GAu0Dt
fede@gmail.com : Fi5pg9
chdario52@gmail.com : 7BrS1Q
alvaro@gmail.com : 69PbaJ
jenn@gmail.com : j9kgs8
alsisol@hotmail.com : 8cOrzF
alvarosiles499@gmail.com : iufzGv
prof.ina.web@gmail.com : GY9Qd8
aldasi2000@hotmail.com : 1fDp9E
alonso@gmail.com : 7QPIZz
¡Todas las contraseñas han sido reseteadas! -->