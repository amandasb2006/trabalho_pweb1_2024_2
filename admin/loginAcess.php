<?php

require_once "../sql/db.class.php";

session_start();

$db = new Db('login');

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $login = $db->search($email, $password);

        if ($login) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('Location: ../index.php');
            exit;
        } else {
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit;
        }
    } else {
        header('Location: login.php');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}

?>