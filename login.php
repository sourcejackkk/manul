<?php
session_start();
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

if (empty($login) || empty($pass)) {
    $_SESSION['message'] = "Заполните все поля";
    header("Location: index.php"); // Перенаправляем обратно на главную страницу
    exit();
} else {
    // Защита от SQL инъекций
    $login = $conn->real_escape_string($login);
    $pass = $conn->real_escape_string($pass);
    
    $sql = "SELECT * FROM `users` WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['message'] = "Добро пожаловать, " . $row['login'];
            $_SESSION['login'] = $row['login']; // Устанавливаем сессионную переменную login
            header("Location: index.php"); // Перенаправляем обратно на главную страницу
            exit();
        }
    } else {
        $_SESSION['message'] = "Нет такого пользователя";
        header("Location: index.php"); // Перенаправляем обратно на главную страницу
        exit();
    }
}
?>
