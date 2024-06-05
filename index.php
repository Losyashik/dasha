<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <script src="./assets/scripts/jquery-3.6.3.js"></script>
    <title>Фитнес-центр “Sila”</title>
</head>

<body>
    <header class="header">
        <nav class="header__topbar topbar">
            <button type="button" class="topbar__burger"><img src="./assets/images/icons/burger.png" alt=""></button>
            <ul class="topbar__ul">
                <li class="topbar__li"><a href="#" class="topbar__nav-link link">Главная</a></li>
                <li class="topbar__li"><a href="#programs" class="topbar__nav-link link">Программы</a></li>
                <li class="topbar__li"><a href="./gallery.php" class="topbar__nav-link link">Галерея</a></li>
                <li class="topbar__li"><a href="#info" class="topbar__nav-link link">О нас</a></li>
                <li class="topbar__li"><a href="#contacts" class="topbar__nav-link link">Контакты</a></li>
            </ul>
            <a href="tel:+78313392626" class="topbar__contacts link">+7 (8313) 39 26 26</a>
        </nav>
        <div class="header-content header__content">
            <h1 class="header-content__hading">Фитнес-центр “Sila”</h1>
            <p class="header-content__title">Переключите внимание с того, как выглядит ваше<br /> тело, на то что оно
                может
                делать.</p>
            <a href="#application" class="header-content__link link">Отправить заявку</a>
        </div>
    </header>
    <main class="main">
        <section class="location">
            <h1 class="location__heading ">Лучший фитнес-центр Нижегородской области</h1>
            <h3 class="location__subtitle">10 минут от города Дзержинск</h3>
        </section>
        <section class="programs section" id="programs">
            <h1 class="programs__heading heading">Программы и услуги</h1>
            <main class="programs-main programs__main ">
                <?php
                $link = mysqli_connect('', 'root', '', 'sila');
                $res = $link->query("SELECT * FROM programs");
                for ($data = []; $row = $res->fetch_assoc(); $data[] = $row);
                foreach ($data as $elem) {
                ?>
                    <article class="programs-main__item">
                        <img class="background" src="<?= $elem['image'] ?>" alt="Йога">
                        <div class="information">
                            <h4 class="information__name">
                                <?= $elem['name'] ?>
                            </h4>
                            <p class="information__discription">
                                <?= $elem['description'] ?>
                            </p>

                        </div>
                        <a href="./program.php?id=<?= $elem['id'] ?>" class="information__button">Подробнее</a>
                    </article>

                <?php } ?>
            </main>
        </section>

        <section class="info" id="info">
            <section class="advantages info__advantages" id="advantages">
                <article class="advantages__item first">
                    <p>Уникальный озонированный бассейн
                        с панорамным видом на реку.
                        Оснащен гидромассажной зоной для
                        спины и стоп, зонами отдыха с
                        шезлонгами.</p>
                </article>
                <article class="advantages__item second">
                    <div class="second__text">
                        <h3>2 дорожки по 24 метра</h3>
                        <p>Для спортивного плавания</p>
                    </div>
                    <div class="second__image">
                        <img src="./assets/images/advantages/second.jpg" alt="">
                    </div>
                </article>
                <article class="advantages__item third">
                    <div class="third__image">
                        <h3>Банный спа-комплекс</h3>
                        <p>Насладившись плаванием или
                            водными активностями, Вы можете
                            отдохнуть в нашей Spa-зоне, которая
                            находится вблизи самого бассейна.</p>
                    </div>
                    <div class="thrid__description">
                        <div class="thrid__description-block">
                            <p>Включает в себя финскую сауну, хаммам, инфрокрасную кабину, а также купель с холодной
                                водой</p>
                        </div>
                        <div class="thrid__description-block"><img src="./assets/images/advantages/third1.jpg" alt="">
                        </div>
                        <div class="thrid__description-block"><img src="./assets/images/advantages/third2.jpg" alt="">
                        </div>
                    </div>
                </article>
                <article class="advantages__item fourth">
                    <p>Оборудованный тренажерный зал с
                        кардио-зоной, тренажерами для
                        изолированной проработки мышц,
                        зона работы со свободными весами и
                        зона</p>
                </article>
            </section>
            <section class="instructors info__instructors">
                <h2 class="instructors__heading info__subtitle">Для вас работает команда проффесионалов</h2>
                <main class="instructors-main instructors__main">
                    <article class="instructors-main__item">
                        <div class="img"><img src="./assets/images/instructors/Sveta.jpg" alt=""></div>
                        <h3>Дроздова Светлана</h3>
                        <p>Инструктор водных программ</p>
                    </article>
                    <article class="instructors-main__item">
                        <div class="img"><img src="./assets/images/instructors/Nataliya.jpg" alt=""></div>
                        <h3>Заварзина Наталья</h3>
                        <p>Инструктор групповых программ</p>
                    </article>
                    <article class="instructors-main__item">
                        <div class="img"><img src="./assets/images/instructors/Kseniya.jpg" alt=""></div>
                        <h3>Недобитко Ксения</h3>
                        <p>Персональный тренер</p>
                    </article>
                    <article class="instructors-main__item">
                        <div class="img"><img src="./assets/images/instructors/Alena.jpg" alt=""></div>
                        <h3>Воробьева Алёна</h3>
                        <p>Инструктор водных и групповых программ</p>
                    </article>
                    <article class="instructors-main__item">
                        <div class="img"><img src="./assets/images/instructors/Ludmila.webp" alt=""></div>
                        <h3>Гришина Людмила</h3>
                        <p>Инструктор секции дзюдо и тренажерного зала</p>
                    </article>
                    <article class="instructors-main__item">
                        <div class="img"><img src="./assets/images/instructors/Ivan.jpg" alt=""></div>
                        <h3>Ильичев Иван</h3>
                        <p>Инструктор тренажерного зала и групповых программ</p>
                    </article>
                </main>
            </section>
        </section>
        <section class="application" id="application">
            <h1 class="application__heading heading">Записаться на тренеровку или купить абонемент</h1>
            <form action="" class="application__form aplication-form">
                <input type="text" name="name" placeholder="Представьтесь">
                <input type="tel" name="numberPhone" placeholder="Номер телефона">
                <select name="category" title="Категория">
                    <option value="0" selected>Выберете категорию</option>
                    <?php foreach ($data as $elem) { ?>
                        <option value="<?= $elem['id'] ?>"><?= $elem['name'] ?></option>
                    <?php } ?>
                </select>
                <button type="submit">Отправить заявку</button>
            </form>
        </section>
        <section class="contacts" id="contacts">
            <h1 class="contacts__heading heading">Контакты</h1>
            <main class="contacts__main contacts-main">
                <article class="contacts-main__map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2219.3758973758017!2d43.35537967725716!3d56.202463257267034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414e398925c2d785%3A0xfda5e63a9154cf39!2z0YPQuy4g0KHQvtCy0LXRgtGB0LrQsNGPLCAxLCDQltC10LvQvdC40L3Qviwg0J3QuNC20LXQs9C-0YDQvtC00YHQutCw0Y8g0L7QsdC7LiwgNjA2MDQ0!5e0!3m2!1sru!2sru!4v1683807606791!5m2!1sru!2sru" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></article>
                <article class="contacts-main__information">
                    <h2>Режим работы фитнес-центра</h2>
                    <p>Ежедневно: 07:00 - 23:00</p>
                    <a href="">+ 7 (8313) 39 26 26</a>
                    <a href="">+ 7 903 604 20 06</a>
                    <a href="">+ 7 905 667 09 28</a>
                    <a href="" class="mail">fitnes@Sila.ru</a>
                    <p class="address">606044, Нижегородская обл. г. Дзержинск, п. Желнино, ул. Советская, д.1а</p>
                </article>
            </main>

        </section>
    </main>
    <?php include_once("./assets/componetnts/footer.php") ?>
    <div class="modal">
        Ваша заявка принята<br />Менеджер свяжется с вами в течении часа
    </div>
    <script>
        
        $(`.modal`).click(() => {
            $(`.modal`).removeClass(`modal--active`);
        })
        $(`.aplication-form`).submit((e) => {
            e.preventDefault();
            data = {
                name: $(`[name='name']`).val(),
                numberPhone: $(`[name='numberPhone']`).val(),
                program: $(`[name='category']`).val()
            }
            $.ajax({
                method: 'post',
                url: "./assets/backend/addApplication.php",
                data,
                success: (res) => {
                    $(`.modal`).addClass(`modal--active`);
                    $(`.aplication-form`)[0].reset();
                    setTimeout(()=>{
                        $(`.modal`).removeClass(`modal--active`);
                    },3000)
                }
            })
        })
    </script>
    
</body>

</html>