<?php include __DIR__ . '/../header.php'; ?>
    <h1>Ошибка авторизации</h1>
    <p><?= $error ?? 'Для выполнения этого действия необходимо авторизоваться' ?></p>
    <p><a href="/FrameWork/www/users/login">Войти на сайт</a></p>
<?php include __DIR__ . '/../footer.php'; ?>