<?php include __DIR__ . '/../header.php'; ?>

<h1>Редактирование комментария</h1>

<?php if (!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>

<form action="/FrameWork/www/comments/<?= $comment->getId() ?>/edit" method="post">
    <div>
        <label for="text">Текст комментария:</label>
        <textarea id="text" name="text" style="width: 100%; height: 150px;" required><?= 
            htmlspecialchars($_POST['text'] ?? $comment->getText()) 
        ?></textarea>
    </div>
    <br>
    <button type="submit">Сохранить изменения</button>
</form>

<p><a href="/FrameWork/www/articles/<?= $comment->getArticle()->getId() ?>">Вернуться к статье</a></p>

<?php include __DIR__ . '/../footer.php'; ?>