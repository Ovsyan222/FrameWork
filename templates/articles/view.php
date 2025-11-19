<?php include __DIR__ . '/../header.php'; ?>

<h1><?= htmlspecialchars($article->getName()) ?></h1>
<p><?= htmlspecialchars($article->getText()) ?></p>

<div style="margin-top: 20px; padding: 10px; background: #f5f5f5; border-radius: 5px;">
    <strong>Автор:</strong>
    <?php 
    $author = $article->getAuthor();
    if ($author !== null): ?>
        <?= htmlspecialchars($author->getNickname()) ?>
    <?php else: ?>
        Неизвестный автор (ID: <?= $article->getAuthorId() ?? 'не указан' ?>)
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../footer.php'; ?>