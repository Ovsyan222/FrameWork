<?php include __DIR__ . '/../header.php'; ?>

<h1>Подтверждение удаления</h1>

<div style="border: 1px solid #eee; padding: 20px; margin: 20px 0;">
    <p><strong>Комментарий от:</strong> <?= $comment->getAuthor()->getNickname() ?></p>
    <p><strong>Текст:</strong> <?= nl2br(htmlspecialchars($comment->getText())) ?></p>
    <p><strong>Дата:</strong> <?= $comment->getCreatedAt() ?></p>
</div>

<p>Вы уверены, что хотите удалить этот комментарий?</p>

<form action="/FrameWork/www/comments/<?= $comment->getId() ?>/delete" method="post">
    <button type="submit" style="background: #e74c3c; color: white; padding: 10px 20px; border: none; cursor: pointer;">
        Да, удалить
    </button>
    <a href="/FrameWork/www/articles/<?= $comment->getArticle()->getId() ?>" style="margin-left: 15px;">
        Нет, вернуться к статье
    </a>
</form>

<?php include __DIR__ . '/../footer.php'; ?>