<?php
// Iniciar la sesión
session_start();

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si el formulario de inicio de sesión ha sido enviado
if (isset($_POST['login'])) {

    // Obtener los datos del formulario de inicio de sesión
    $documento = mysqli_real_escape_string($conn, $_POST['documento']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['password']);

    // Consultar la base de datos para verificar el usuario y la contraseña
    $query = "SELECT * FROM usuarios WHERE documento = '$documento'";
    $result = mysqli_query($conn, $query);

    // Verificar si se encontró el usuario
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verificar si la contraseña es correcta
        if (password_verify($contrasena, $row['contrasena'])) {
            // Iniciar la sesión y establecer las variables de sesión
            $_SESSION['documento'] = $row['documento'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['rol'] = $row['id_rol'];
            // Redirigir al usuario a la página de inicio correspondiente según el rol
            if ($_SESSION['rol'] == '1') {
               echo "<script> alert('bienvenido al sistema') </script>";
                header('Location: dashboard_admin.php');
            } elseif ($_SESSION['rol'] == '3') {
               echo "<script> alert('bienvenido al sistema') </script>";
                header('Location: dashboard_usuario.php');
            }
        } else {
            // Contraseña incorrecta
            echo "<script> alert('contraseña invalida') </script>";
        }
    } else {
        // Usuario no encontrado
        echo "<script> alert('usuario no existe') </script>";
    }
}
?>
