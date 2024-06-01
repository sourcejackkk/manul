<?php
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];

// Проверка на пустые поля
if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)){
    session_start();
    $_SESSION['message'] = "Заполните все поля";
    header("Location: index.php");
    exit();
} 
// Проверка длины логина
elseif(strlen($login) < 3) {
    session_start();
    $_SESSION['message'] = "Логин должен быть длиннее 3 символов";
    header("Location: index.php");
    exit();
} 
// Проверка длины пароля
elseif(strlen($pass) < 6) {
    session_start();
    $_SESSION['message'] = "Пароль должен быть длиннее 6 символов";
    header("Location: index.php");
    exit();
} 
// Проверка наличия символа "@" в адресе электронной почты
elseif (!strpos($email, '@')) {
    session_start();
    $_SESSION['message'] = "Введите настоящий адрес электронной почты";
    header("Location: index.php");
    exit();
} 
else {
    if($pass != $repeatpass){
        session_start();
        $_SESSION['message'] = "Пароли не совпадают";
        header("Location: index.php");
        exit();
    } else {
        $sql = "INSERT INTO `users` (login, pass, email) VALUES ('$login', '$pass', '$email')";
        if ($conn->query($sql) === TRUE) {
            // Успешная регистрация, устанавливаем сообщение для отображения на главной странице
            session_start();
            $_SESSION['message'] = "Успешная регистрация. Теперь вы можете авторизоваться.";
            header("Location: index.php");
            exit();
        } else {
            echo "Ошибка: " . $conn->error;
        }
    }
}
?>
