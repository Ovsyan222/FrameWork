<?php include __DIR__ . '/../header.php'; ?>
<div style="text-align: center;">
    <h1>Регистрация</h1>
    <?php if (!empty($error)): ?>
        <div style="background-color: red; color: white; padding: 10px; margin: 15px; border-radius: 5px;">
            <?= $error ?>
        </div>
    <?php endif; ?>
    
    <form action="/FrameWork/www/users/register" method="post" style="max-width: 400px; margin: 0 auto;">
        <div style="margin-bottom: 15px; text-align: left;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Nickname:</label>
            <input type="text" name="nickname" value="<?= $_POST['nickname'] ?? '' ?>" 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 15px; text-align: left;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
            <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 20px; text-align: left;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Пароль:</label>
            <input type="password" name="password" 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <button type="submit" style="background: #3498db; color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
            Зарегистрироваться
        </button>
    </form>
</div>
<?php include __DIR__ . '/../footer.php'; ?>