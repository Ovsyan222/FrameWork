<?php include __DIR__ . '/../header.php'; ?>

<h1>Добавление статьи</h1>

<?php if (!empty($error)): ?>
    <div style="color: red; padding: 10px; background: #ffeaea; border: 1px solid red; margin-bottom: 15px;">
        <?= $error ?>
    </div>
<?php endif; ?>

<form action="/FrameWork/www/articles/add" method="post">
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Название статьи:</label>
        <input type="text" id="name" name="name" value="<?= $_POST['name'] ?? '' ?>" 
               style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="text" style="display: block; margin-bottom: 5px; font-weight: bold;">Текст статьи:</label>
        <textarea id="text" name="text" style="width: 100%; height: 300px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required><?= 
            $_POST['text'] ?? '' 
        ?></textarea>
    </div>
    
    <button type="submit" style="padding: 10px 20px; background: #27ae60; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Добавить статью
    </button>
</form>

<p><a href="/FrameWork/www/">Вернуться на главную</a></p>

<?php include __DIR__ . '/../footer.php'; ?>