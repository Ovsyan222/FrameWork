<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        .header {
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
        }

        .user-info {
            text-align: right;
        }

        .user-info a {
            margin-left: 15px;
        }

        /* Navigation - SIMPLE SPACE-BETWEEN */
        .main-nav {
            background: #34495e;
            padding: 0;
        }

        .main-nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .main-nav li {
            flex: 1;
            text-align: center;
        }

        .main-nav a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px 10px;
            transition: background-color 0.3s;
            border-right: 1px solid #2c3e50;
        }

        .main-nav li:last-child a {
            border-right: none;
        }

        .main-nav a:hover {
            background: #2c3e50;
        }

        /* Main Content */
        .main-content {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            min-height: 400px;
        }

        /* Footer */
        footer {
            background: #34495e;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto; /* Это важно */
        }

        /* Common Elements */
        a, a:visited {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #db34cdff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background: #b92995ff;
            text-decoration: none;
        }

        .btn-danger {
            background: #e74c3c;
            color: #fff;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .btn-success {
            background: #ae279cff;
            color: #fff;
        }

        .btn-success:hover {
            background: #8c219aff;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2c3e50;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        /* Articles */
        .article {
            border-bottom: 1px solid #eee;
            padding: 20px 0;
        }

        .article:last-child {
            border-bottom: none;
        }

        .article h2 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .article-meta {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Comments */
        .comment {
            border: 1px solid #eee;
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .comment-author {
            font-weight: bold;
            color: #2c3e50;
        }

        .comment-date {
            color: #7f8c8d;
            font-size: 12px;
        }

        .comment-actions {
            margin-top: 10px;
        }

        .comment-actions a {
            margin-right: 15px;
            font-size: 14px;
        }
    </style>
    <link rel="stylesheet" href="/styles/styles.php">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-top">
                <div class="logo">Мой блог</div>
                <div class="user-info">
                    <?php if (!empty($user)): ?>
                        Привет, <strong><?= $user->getNickname() ?></strong> | 
                        <a href="/FrameWork/www/users/logout">Выйти</a>
                    <?php else: ?>
                        Войдите на сайт | 
                        <a href="/FrameWork/www/users/login">Вход</a> | 
                        <a href="/FrameWork/www/users/register">Регистрация</a>
                    <?php endif; ?>
                </div>
            </div>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="/FrameWork/www/">Главная</a></li>
                    <li><a href="/FrameWork/www/articles/add">Добавить статью</a></li>
                    <li><a href="/FrameWork/www/users/login">Авторизация</a></li>
                    <li><a href="/FrameWork/www/users/register">Регистрация</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="main-content">