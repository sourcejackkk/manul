<?php
session_start();
session_destroy(); // Уничтожаем все данные сессии
header("Location: index.php"); // Перенаправляем пользователя на главную страницу
exit(); // Добавляем exit() для завершения скрипта
?>