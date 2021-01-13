<header>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <ul class="nav">
            <li><h5 class="p-2">Загрузка файлов</h5></li>
            <?php if (isset($_COOKIE['login'])) : ?>
                <li><a class="btn btn-link nav-link p-2" href="/home">Главная</a></li>
                <li>
                    <form action="/user/dashboard" method="post">
                        <input type="hidden" name="exit_btn">
                        <button class="btn btn-link nav-link p-2" type="submit"><?=$_COOKIE['login']?>(выйти)</button>
                    </form>
                </li>
            <?php else : ?>
                <li><a class="btn btn-link nav-link p-2" href="/home">Главная</a></li>
                <li><a class="btn btn-link nav-link p-2" href="/user/auth">Войти</a></li>
                <li><a class="btn btn-link nav-link p-2" href="/home">Зарегистрироваться</a></li>
            <?php endif; ?>
        </ul>
    </div>
</header>