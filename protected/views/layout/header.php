<head>
    <meta charset="utf-8">
    <title>ADVBoard</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/authorization_and_registration.css">
</head>
<body>
    <header>
        <a href="/"><img src="/img/final_logo.png" alt="our-logo" class="logo"></a>
        <nav class="main-menu">
            <ul class="main-menu-ul">
                <li><a class="main-menu-item" href="/">Главная</a></li>
                <li><a class="main-menu-item" href="/categories">Категории</a></li>
                <li><a class="main-menu-item" href="/about">О сайте</a></li>
                <? if(!empty($_SESSION['nickname'])):?>
                    <li>
                        <a href="#" class="main-menu-item"><?=$_SESSION['nickname']?></a>
                        <!--
                        <ul class="dropdown">
                            <li><a href="">Мой профиль</a></li>
                            <li><a href="">Мои объявления</a></li>
                            <? if ($_SESSION['usergroup'] == 1): ?>
                                <li><a href="">Все объявления</a></li>
                            <? endif; ?>
                        </ul>-->
                    </li>
                <? endif; ?>
            </ul>
        </nav>
        <? if(empty($_SESSION['nickname'])): ?>
            <a href="/authorization" style="margin: 1%;"><img src="/img/enter.jpg" alt="enter-img" class="enter-img"></a>
        <? endif; ?>
        <? if(!empty($_SESSION['nickname'])):?>
            <a href="#" class="logout-div"><img src="/img/logout.jpg" alt="logout-img" class="logout-img"></a>
        <? endif; ?>
    </header>
</body>




