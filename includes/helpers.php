<?php

// Muestra los errores del formulario
function showError($error, $field) {
    $alert = '';
    
    if (isset($error[$field]) && !empty($field)) {
        $alert = "<div class='alert alert-danger'>" . $error[$field] . '</div>';
    }
    
    return $alert;
}

// Borra los errores del formulario
function deleteError() {

    $erased = false;

    if (isset($_SESSION['errors']['name'])) {
        $_SESSION['errors']['name'] = null;
        $erased = true;
    }
    
    if (isset($_SESSION['errors']['email'])) {
        $_SESSION['errors']['email'] = null;
        $erased = true;
    }
    
    if (isset($_SESSION['errors']['phone'])) {
        $_SESSION['errors']['phone'] = null;
        $erased = true;
    }

    if (isset($_SESSION['complete'])) {
        $_SESSION['complete'] = null;
        $erased = true;
    }

    return $erased;
}

// Devuelve todos los usuarios de la base de datos ordenados desde el ultimo que se agregó
function getUsers($conecction){
    $sql = "SELECT * FROM usuarios ORDER BY id DESC;";
    $users = mysqli_query($conecction, $sql);

    $result = array();
    if ($users && mysqli_num_rows($users) >= 1) {
        $result = $users;
    }

    return $result;
}