<?php

if (isset($_POST)) {
    
    // Conexión a la base de datos
    require_once 'connection.php';
    
    // Recorger los valores del formulario de registro
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($db, trim($_POST['phone'])) : false;
    
    // Array de errores
    $errors = array();
    
    // Validar los datos antes de guardarlos en la base de datos
    // Validar campo nombre
    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
        $name_valid = true;
    } else {
        $name_valid = false;
        $errors['name'] = "El nombre no es válido";
    }
    // Validar el email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valid = true;
    } else {
        $email_valid = false;
        $errors['email'] = "El email no es válido";
    }
    // Validar el teléfono
    if (!empty($phone) && is_numeric($phone)) {
        $phone_valid = true;
    } else {
        $phone_valid = false;
        $errors['phone'] = "El teléfono no es válido";
    }
    
    if (count($errors) == 0) {
        
        // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
        $sql = "INSERT INTO usuarios VALUES(NULL, '$name', '$email', '$phone', CURDATE());";
        $save = mysqli_query($db, $sql);
        
        if ($save) {
            $_SESSION['complete'] = "Agregado con éxito";
        } else {
            $_SESSION['errors']['general'] = "Falló al guardar el usuario";
        }
    } else {
        $_SESSION['errors'] = $errors;
    }
    
}

header('Location: ../index.php');
