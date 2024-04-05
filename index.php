<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design\css\style.css">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- //*для слайдера*// -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body >
<?php include "header.php"; ?>
<main>
    <div class="catalog">
            <div class="cat-text"><h2>Каталог</h2></div>
            <div class="category">
                <button class="button-category">Соки</button>
                <button class="button-category">Кофе</button>
                <button class="button-category">Газированные напитки</button>
                <button class="button-category">Молочные напитки</button>
                <button class="button-category">Вода</button>
                <button class="button-category">Детские напитки</button>
            </div>
            <div class="bloc-drinks">
                
                <div class="drink">
                            <div class="tovar">
                        <img src="design\img\coffee.jpg" alt="">
                        <h4>Латте</h3>
                        <p>230р</p>
                        <button class=" button-tovar">Добавить в корзину</button>
                            </div>
                            <div class="tovar">
                    <img src="design\img\water.jpg" alt="">
                    <h4>Вода</h3>
                    <p>99.99р</p>
                        <button class=" button-tovar">Добавить в корзину</button>
                            </div>
                            <div class="tovar">
                    <img src="design\img\Sok.png" alt="">
                    <h4>Сок</h3>
                    <p>110р</p>
                        <button class=" button-tovar">Добавить в корзину</button>
                            </div>
                    </div>
                
            </div>
            <button class="podrobnee">Подробнее</button>
    </div>
<!-- часть с текстом -->
<div class="description">
    <div class="text-discription">
        <h3>Закажите свежие напитки прямо к себе домой!</h3>
        <p >Наша компания рада предложить вам богатый выбор освежающих напитков для тех, кто ценит уникальный вкус и комфорт.</p>
        <p>У нас в ассортименте - свежевыжатые фруктовые соки, ароматный чай и кофе, натуральные молочные продукты, а также энергетические и спортивные напитки.</p>
    </div>
    <div class="bloc-img-description">
        <img src="design\img\Group 8192.png" alt="" class="logo">
        <img src="design\img\Group 8195.png" alt="" class="img-description">
    </div>
</div>

<div class="reviews">
    <h2 class="text-reviews">Отзывы</h2>
    <div class="slider">
    <div class="slide">
        <div class="otzv">
            <img class= "user-img" src="design\img\free-icon-boy-4537069.png" alt="">
            <p>Отличный кофе! Очень ароматный и насыщенный вкус. Упаковка красивая и удобная. Я очень доволен покупкой и 
            с удовольствием буду заказывать этот кофе снова. Рекомендую всем любителям кофе!</p>
        </div>
        <div class="otzv">
            <img class= "user-img" src="design\img\free-icon-boy-4537069.png" alt="">
            <p>Заказываю через это приложение не первый раз. 
                Товарами доволен и доставка быстрая.Рекомендую!</p>
        </div>
        <div class="otzv">
            <img class= "user-img" src="design\img\free-icon-boy-4537069.png" alt="">
            <p>Отличный кофе! Очень ароматный и насыщенный вкус. Упаковка красивая и удобная. Я очень доволен покупкой и 
            с удовольствием буду заказывать этот кофе снова. Рекомендую всем любителям кофе!</p>
        </div>
    </div>
    <div class="slide">
    <div class="otzv">
            <img class= "user-img" src="design\img\free-icon-boy-4537069.png" alt="">
            <p>Очень ароматный и насыщенный вкус. Упаковка красивая и удобная. Я очень доволен покупкой и 
            с удовольствием буду заказывать этот кофе снова. Рекомендую всем любителям кофе!</p>
        </div>
        <div class="otzv">
            <img class= "user-img" src="design\img\free-icon-boy-4537069.png" alt="">
            <p>Заказываю через это приложение не первый раз. 
                Товарами доволен и доставка быстрая.Рекомендую!</p>
        </div>
        <div class="otzv">
            <img class= "user-img" src="design\img\free-icon-boy-4537069.png" alt="">
            <p>Отличный кофе! Очень ароматный и насыщенный вкус. Упаковка красивая и удобная. Я очень доволен покупкой и 
            с удовольствием буду заказывать этот кофе снова. Рекомендую всем любителям кофе!</p>
        </div>
    </div>
    </div>

</div>

</main>
    <!-- подвал -->
<footer id="footer">
    <div class="container">
        <div class="connection">
            <div class="connect">
            <p>Связь с нами</p> 
            <div class="design\img-connection">
                <img src="design\img/instagram.png" alt=""class="icon-whatsapp">
                <img src="design\img\icons8-vk-com-48.png" alt="" srcset="">
                <img src="design\img\iconfinder-social-media-applications-23whatsapp-4102606_113811.png" class="icon-whatsapp">
            </div>
            </div>
            <div class="clock-work">
                    <p>Часы  работы:</p>
                    <p>10:00 - 23:00</p>
                </div>
            </div>
        <hr> 
        <p class="copirater">© 2023 Копирование запрещено. Все права защищены.</p> 
    </div>
</footer>
</body>
</html>

<script>
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;

    function nextSlide() {
        slides[currentSlide].style.display = 'none';
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].style.display = 'flex';
    }

    setInterval(nextSlide, 9000);
</script>