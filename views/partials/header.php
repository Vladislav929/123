<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мебельный салон</title>
    <link rel="stylesheet" href="/meubelny-salon/assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Мебельный салон</h1>
            <nav>
                <ul>
                    <li><a href="/meubelny-salon/home">Главная</a></li>
                    <li><a href="/meubelny-salon/catalog">Каталог</a></li>
                    <?php if(isset($_SESSION['user_id'])) : ?>
                        <li><a href="/meubelny-salon/admin">Админ панель</a></li>
                        <li><a href="/meubelny-salon/logout">Выйти</a></li>
                    <?php else : ?>
                        <li><a href="/meubelny-salon/login">Войти</a></li>
                        <li><a href="/meubelny-salon/register">Регистрация</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
