<? if ($_COOKIE['pswd_clear']){
        header("Location: /");
    }
?>

<div class="container">
    <div class="inner-container">
        <h3 class="authorization-header">Вход в личный кабинет</h3>
        <form class="authorization-form" enctype="multipart/form-data"  action="" method="POST">
            <input type="email" id="email-field" name="email" placeholder="E-mail" value="<?=$_POST['email'];?>" required>
            <label class="hint-text">Введите ваш email-адрес</label>
            <input type="password" id="password-field" name="password" placeholder="Пароль" required>
            <label class="hint-text">Введите ваш пароль</label>
            <input type="submit" id="enter-btn" value="Войти">
        </form>
        <a href="/registration" class="registration-link">Регистрация</a>
        <? if(!$_COOKIE['pswd_clear'] && !empty($_POST)):?>
            <label class="hint-text" style="color: red;">Неверный email-адрес или пароль</label>
        <? endif; ?>
    </div>
</div>