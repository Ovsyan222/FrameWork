
<?php include __DIR__ . '/../header.php'; ?>

<?php if (!empty($user) && $user->isAdmin()): ?>
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="/FrameWork/www/articles/add" 
           style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            📝 Добавить статью
        </a>
    </div>
<?php endif; ?>

<?php foreach ($articles as $article): ?>
    <div style="border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 5px;">
        <h2><a href="/FrameWork/www/articles/<?= $article->getId() ?>" style="text-decoration: none;">
            <?= $article->getName() ?>
        </a></h2>
        <p><?= mb_substr($article->getText(), 0, 200) ?>...</p>
        <p><small>Автор: <?= $article->getAuthor()->getNickname() ?></small></p>
        
        <!-- Кнопки управления статьей -->
        <?php if (!empty($user) && ($user->getId() === $article->getAuthor()->getId() || $user->isAdmin())): ?>
            <div style="margin-top: 10px; padding-top: 10px; border-top: 1px solid #eee;">
                <a href="/FrameWork/www/articles/<?= $article->getId() ?>/edit" 
                   style="font-size: 0.9em; color: #3498db; text-decoration: none;">✏️ Редактировать</a>
                |
                <a href="/FrameWork/www/articles/<?= $article->getId() ?>/delete" 
                   onclick="return confirm('Вы уверены, что хотите удалить статью \"<?= htmlspecialchars($article->getName()) ?>\"?')"
                   style="font-size: 0.9em; color: #e74c3c; text-decoration: none;">🗑️ Удалить</a>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>