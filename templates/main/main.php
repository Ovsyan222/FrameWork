<?php include __DIR__ . '/../header.php'; ?>

<h1 style="width: 700px; text-align: center; margin-bottom: 30px; color: #2c3e50;">Последние статьи</h1>

<?php if (!empty($user) && $user->isAdmin()): ?>
    <div style="text-align: center; margin-bottom: 30px;">
        <a href="/FrameWork/www/articles/add" class="btn btn-success">+ Добавить статью</a>
    </div>
<?php endif; ?>

<?php foreach ($articles as $article): ?>
    <div class="article">
        <h2>
            <a href="/FrameWork/www/articles/<?= $article->getId() ?>">
                <?= $article->getName() ?>
            </a>
        </h2>
        <div class="article-meta">
            Автор: <?= $article->getAuthor()->getNickname() ?>
        </div>
        <p><?= mb_substr($article->getText(), 0, 200) ?>...</p>
        
        <?php if (!empty($user) && ($user->getId() === $article->getAuthor()->getId() || $user->isAdmin())): ?>
            <div style="margin-top: 15px;">
                <a href="/FrameWork/www/articles/<?= $article->getId() ?>/edit" class="btn">Редактировать</a>
                
                <!-- ПРАВИЛЬНАЯ ССЫЛКА -->
                <a href="/FrameWork/www/articles/<?= $article->getId() ?>/delete" 
                class="btn btn-danger" 
                onclick="return confirm('Вы уверены, что хотите удалить эту статью?')">
                    Удалить
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>