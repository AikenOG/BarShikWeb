<?php
session_start();

// Подключаемся к базе данных
include '../database/connectdb.php';

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header('Location: http://barshikweb/user/auth/auth.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Запрос на получение данных пользователя
$userQuery = "SELECT User_id, Email, Bonus_points, role, contact_info, name FROM users WHERE User_id = ?";
$userStmt = $mysqli->prepare($userQuery);
$userStmt->bind_param("i", $userId);
$userStmt->execute();
$userResult = $userStmt->get_result();
$userData = $userResult->fetch_assoc();

if (!$userData) {
    echo 'Данные пользователя не найдены.';
    exit;
}

// Запрос на получение заказов пользователя
$orderQuery = "SELECT o.Id_order, o.Date_of_order, o.Total_price, o.Status, GROUP_CONCAT(p.Name ORDER BY p.Name SEPARATOR ', ') AS Products
               FROM Orders o
               JOIN Order_Product op ON o.Id_order = op.Id_order
               JOIN Product p ON op.Id_product = p.Id_product
               WHERE o.User_id = ?
               GROUP BY o.Id_order
               ORDER BY o.Date_of_order DESC";
$orderStmt = $mysqli->prepare($orderQuery);
$orderStmt->bind_param("i", $userId);
$orderStmt->execute();
$orderResult = $orderStmt->get_result();

?>



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

<style>
    .table th, .table td {
        vertical-align: middle; /* Выравниваем содержимое по вертикали */
        text-align: center; /* Выравниваем содержимое по центру */
    }
    .badge {
        width: 90px; /* Фиксированная ширина для статуса */
    }
    .img-writing {
        width: 24px;
        height: 24px;
    }
    /* Настройка ширины столбцов, если нужно */
    .table .col-order { width: 10%; }
    .table .col-date { width: 15%; }
    .table .col-products { width: 35%; }
    .table .col-sum { width: 15%; }
    .table .col-status { width: 10%; }
    .table .col-feedback { width: 15%; }
</style>

<?php include "../header.php"; ?>
    <main class="py-4">
    <div class="container">
        <h2 class="text-personal-account mb-4">Личный кабинет</h2>
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="../../design/img/free-icon-boy-4537069.png" class="img-fluid rounded-circle" alt="Профиль пользователя">
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Редактирование профиля</h5>
                        <form action="update_profile.php" method="post">
                            <div class="mb-3">
                                <label for="userName" class="form-label">Имя</label>
                                <input type="text" id="userName" name="userName" class="form-control" placeholder="Введите ваше имя" value="<?= htmlspecialchars($userData['name']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email</label>
                                <input type="email" id="userEmail" name="userEmail" class="form-control" placeholder="Введите ваш email" value="<?= htmlspecialchars($userData['Email']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="userDeliveryAddress" class="form-label">Адрес доставки</label>
                                <input type="text" id="userDeliveryAddress" name="userDeliveryAddress" class="form-control" placeholder="Введите ваш адрес доставки" value="<?= htmlspecialchars($userData['contact_info']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="userBonuses" class="form-label">Бонусы</label>
                                <input type="text" id="userBonuses" name="userBonuses" class="form-control" value="<?= $userData['Bonus_points'] ?>" readonly>
                            </div>
                            <button type="submit" name="edit" class="btn btn-primary w-100">Изменить</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history-zacaz">
                <h3 class="order mb-4">Заказы</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Заказ</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Состав заказа</th>
                                <th scope="col">Сумма</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Отзыв</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $orderResult->fetch_assoc()): ?>
                                <tr>
                                    <td>Заказ #<?= htmlspecialchars($row['Id_order']) ?></td>
                                    <td><?= date('d.m.Y', strtotime($row['Date_of_order'])) ?></td>
                                    <td>
                                        <ul class="list-unstyled">
                                        <?php foreach (explode(', ', $row['Products']) as $product): ?>
                                            <li><?= htmlspecialchars($product) ?></li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </td>
                                    <td><?= number_format($row['Total_price'], 2, '.', ' ') ?> р</td>
                                    <td>
                                        <!-- Применяем соответствующий класс в зависимости от статуса -->
                                        <?php if ($row['Status'] == 'Отменен'): ?>
                                            <span class="badge bg-danger"><?= htmlspecialchars($row['Status']) ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-success"><?= htmlspecialchars($row['Status']) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#feedback">
                                            <img src="../../design/img/writing.png" alt="Write feedback" class="img-fluid" style="width: 24px; height: 24px;">
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
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

