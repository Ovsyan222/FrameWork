<?php include __DIR__ . '/../header.php'; ?>

<h1>Редактирование статьи</h1>

<?php if (!empty($error)): ?>
    <div style="color: red; padding: 10px; background: #ffeaea; border: 1px solid red; margin-bottom: 15px;">
        <?= $error ?>
    </div>
<?php endif; ?>

<form action="/FrameWork/www/articles/<?= $article->getId() ?>/edit" method="post">
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Название статьи:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($article->getName()) ?>" 
               style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="text" style="display: block; margin-bottom: 5px; font-weight: bold;">Текст статьи:</label>
        <textarea id="text" name="text" style="width: 100%; height: 300px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required><?= 
            htmlspecialchars($article->getText()) 
        ?></textarea>
    </div>
    
    <div>
        <button type="submit" style="padding: 10px 20px; background: #3498db; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Сохранить изменения
        </button>
        <a href="/FrameWork/www/articles/<?= $article->getId() ?>" style="margin-left: 15px; color: #666;">Отмена</a>
    </div>
</form>

<?php include __DIR__ . '/../footer.php'; ?>