<?php
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['login'])) {
    // Перенаправляем на главную страницу или выводим сообщение об ошибке
    $_SESSION['message'] = "Необходимо авторизоваться, чтобы скачать файл.";
    header("Location: index.php");
    exit();
}

// Путь к файлу для скачивания
$file = 'secured_files/ttt.txt';

// Проверяем существование файла
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit();
} else {
    echo "Файл не найден.";
}
