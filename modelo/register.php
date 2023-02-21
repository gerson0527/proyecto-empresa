<?php 
include('conexion.php');

// función de registro
function register() {
    global $conn;

    if (isset($_POST["register"])) {
        // VALIDACIÓN DE CAMPOS VACÍOS
        if (empty($_POST["documento"]) || empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["repassword"])) {
            echo "<script> alert('llene todos los campos') </script>";
        }

        $documento = $_POST["documento"];
        $firstname = $_POST["nombre"];
        $lastname = $_POST["apellido"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];

        // VALIDACIÓN DE CONTRASEÑA
        if ($password != $repassword) {
            echo "<script> alert('las contraseña no coinciden') </script>";
        }

        // VALIDACIÓN DE DOCUMENTO DE USUARIO DUPLICADO
        $sql = "SELECT * FROM usuarios WHERE documento = '$documento'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        
        if ($count > 0) {
            echo "<script> alert('ya se encuentra registrado ese usuario') </script>";
        }
       // INSERTAR NUEVO USUARIO
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (documento, nombre, apellido, email, contrasena, id_rol) VALUES ('$documento', '$firstname', '$lastname', '$email', '$hashed_password', '3')";

        if (mysqli_query($conn, $sql)) {
             $error = "<script>alert('Registro exitoso!'); window.location='index.php';</script>";
        } else {
            $error = "<script>alert('Error del registro'); window.location='index.php';</script>";
        }   
    }
    return $error;
}

// ejecutar la función de registro si se presionó el botón de registro
if (isset($_POST["register"])) {
    $error = register();
}

if ($conn) {
    mysqli_close($conn);
}
?>
