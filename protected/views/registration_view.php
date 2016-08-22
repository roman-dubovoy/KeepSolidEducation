<div class="container">
    <div class="inner-container">
        <h3 class="registration-header">Создать учетную запись</h3>
        <form class="registration-form" enctype="multipart/form-data" action="" method="POST">
            <input type="text" id="surname-field" name="surname" placeholder="Фамилия" value="<?=$_POST['surname']?>" required>
            <label class="hint-text">Введите вашу фамилию</label>
            <input type="text" id="name-field" name="name" placeholder="Имя" value="<?=$_POST['name']?>" required>
            <label class="hint-text">Введите ваше имя</label>
            <input type="tel" id="tel-field" name="tel_number" placeholder="Номер телефона" value="<?=$_POST['tel_number']?>">
            <label class="hint-text">Введите ваш номер телефона(без +38)</label>
            <input type="email" id="email-field" name="email" placeholder="E-mail" value="<?=$_POST['email']?>" required>
            <label class="hint-text">
                <? if(!$_SESSION['email_exists']){
                    echo '<span>Введите ваш email-адрес</span>';
                }
                else{
                    echo '<span style="color: red;">Данный email-адрес занят</span>';
                }
                ?>
            </label>
            <input type="password" id="password-field" name="password" placeholder="Пароль" value="<?=$_POST['password']?>" required>
            <label class="hint-text">Введите ваш пароль(от 4 до 12 символов)</label>
            <input type="submit" id="reg-btn" value="Зарегистрироваться" name="registry">
        </form>
    </div>
</div>