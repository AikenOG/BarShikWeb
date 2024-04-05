<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../design\css\style-header.css">
    <link rel="stylesheet" href="../../design\css\style-personal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Личный кабинет</title>
</head>
<body>
<?php include "../header.php"; ?>
    <main class="py-4">
        <div class="container">
            <h2 class="text-personal-account mb-4">Личный кабинет</h2>
            <div class="row">
                <div class="col-md-6 text-center">
                    <!-- Место для изображения пользователя -->
                    <img src="../../design\img/free-icon-boy-4537069.png" class="img-fluid rounded-circle" alt="Профиль пользователя">
                </div>
                <div class="col-md-6">
                    <!-- Карточка для формы -->
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Редактирование профиля</h5>
                            <form action="" method="post">
                        <div class="mb-3">
                            <label for="userName" class="form-label">Имя</label>
                            <input type="text" id="userName" class="form-control" placeholder="Введите ваше имя">
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" id="userEmail" class="form-control" placeholder="Введите ваш email">
                        </div>
                        <div class="mb-3">
                            <label for="userBonuses" class="form-label">Бонусы</label>
                            <input type="text" id="userBonuses" class="form-control" value="0" readonly>
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary w-100">Изменить</button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history-zacaz">
                <h3 class="order mb-3">Заказы</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Заказ</th>
                                <th>Дата</th>
                                <th>Состав заказа</th>
                                <th>Сумма</th>
                                <th>Статус</th>
                                <th>Отзыв</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                                <tr>
                                    <td>Заказ #1</td>
                                    <td>03.04.2024</td>
                                    <td>
                                        <ol>
                                        <li>Краб</li>
                                        <li>OZ Energy</li>
                                        </ol>
                                     </td>
                                    <td>17.250 р </td>
                                    <td>Доставлен ✅</td>
                                    <td><a href=""   data-bs-toggle="modal" data-bs-target="#feedback" ><img src="../../design\img\writing.png" alt="" class="img-writing"></a></td>
                                </tr>
                                <tr>
                                    <td>Заказ #2</td>
                                    <td>04.04.2024</td>
                                    <td>
                                        <ol>
                                        <li>OZ Bread</li>
                                        <li>Лосось</li>
                                        </ol>
                                     </td>
                                    <td>11.172 р </td>
                                    <td>Доставлен ✅</td>
                                    <td><a href=""   data-bs-toggle="modal" data-bs-target="#feedback" ><img src="../../design\img\writing.png" alt="" class="img-writing"></a></td>

                                </tr>
                                <tr>
                                    <td>Заказ #3</td>
                                    <td>05.04.2024</td>
                                    <td>
                                        <ol>
                                        <li>Сникерс</li>
                                        <li>Мясо дельфина</li>
                                        </ol>
                                     </td>
                                    <td>10.761 р</td>
                                    <td>В пути 📦</td>
                                    <td><a href=""   data-bs-toggle="modal" data-bs-target="#feedback" ><img src="../../design\img\writing.png" alt="" class="img-writing"></a></td>

                                </tr>
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer id="footer">
    <div class="container">
        <div class="connection">
            <div class="connect">
            <p>Связь с нами</p> 
            <div class="../../design\img-connection">
                <img src="../../design\img/free-icon-odnoklassniki-2504930.png" alt=""class="icon-whatsapp">
                <img src="../../design\img\icons8-vk-com-48.png" alt="" srcset="">
                <img src="../../design\img\iconfinder-social-media-applications-23whatsapp-4102606_113811.png" class="icon-whatsapp">
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
    <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Оставьте отзыв</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Сообщение:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Оставить отзыв</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Здесь можно добавить JavaScript, если нужно
    </script>
</body>
</html>

