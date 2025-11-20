<?php include __DIR__ . '/../header.php'; ?>

<h1><?= $article->getName() ?></h1>
<p><?= $article->getText() ?></p>
<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>

<!-- Форма добавления комментария -->
<?php if (!empty($user)): ?>
    <div style="margin: 20px 0; padding: 20px; border: 1px solid #ddd;">
        <h3>Добавить комментарий</h3>
        <?php if (!empty($error)): ?>
            <div style="color: red;"><?= $error ?></div>
        <?php endif; ?>
        <form action="/FrameWork/www/articles/<?= $article->getId() ?>/comments" method="post">
            <textarea name="text" style="width: 100%; height: 100px;" required><?= $_POST['text'] ?? '' ?></textarea>
            <br>
            <button type="submit">Отправить комментарий</button>
        </form>
    </div>
<?php else: ?>
    <p><a href="/FrameWork/www/users/login">Войдите</a>, чтобы оставить комментарий</p>
<?php endif; ?>

<!-- Список комментариев -->
<div id="comments" style="margin-top: 30px;">
    <h3>Комментарии (<?= $article->getCommentsCount() ?>)</h3>
    <?php foreach ($comments as $comment): ?>
        <div id="comment<?= $comment->getId() ?>" style="border: 1px solid #eee; padding: 15px; margin: 10px 0;">
            <div style="font-weight: bold;">
                <?= $comment->getAuthor()->getNickname() ?>
                <span style="font-size: 0.8em; color: #666;">
                    (<?= $comment->getCreatedAt() ?>)
                </span>
                
                <!-- Ссылки управления для автора комментария или администратора -->
                <?php if (!empty($user) && ($user->getId() === $comment->getAuthor()->getId() || $user->getRole() === 'admin')): ?>
    <span style="font-size: 0.8em; margin-left: 10px;">
        <a href="/FrameWork/www/comments/<?= $comment->getId() ?>/edit">Редактировать</a>
        |
        <form action="/FrameWork/www/comments/<?= $comment->getId() ?>/delete" method="post" style="display: inline;">
            <button type="submit" 
                    onclick="return confirm('Вы уверены, что хотите удалить этот комментарий?')"
                    style="color: red; border: none; background: none; cursor: pointer; text-decoration: underline; padding: 0; font: inherit;">
                Удалить
            </button>
        </form>
    </span>
<?php endif; ?>
            </div>
            <div style="margin-top: 10px;">
                <?= nl2br(htmlspecialchars($comment->getText())) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../footer.php'; ?>