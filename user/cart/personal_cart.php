<?php
session_start();

// Проверяем, авторизован ли пользователь. Если нет, перенаправляем на страницу авторизации
if (!isset($_SESSION['user_id'])) {
    header('Location: http://barshikweb/user/auth/auth.php');
    exit;
}

include '../../database/connectdb.php';

// После проверки авторизации извлекаем user_id из сессии для использования в запросе
$userId = $_SESSION['user_id'];

// Запрос на получение данных о продуктах в корзине пользователя
$query = "
    SELECT p.Name, p.Price, p.Description, p.Image
    FROM Basket b
    JOIN Product p ON b.id_product = p.Id_product
    WHERE b.User_id = ?
";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$stmt->close(); // Закрытие statement
$mysqli->close(); // Закрытие соединения с базой данных
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина пользователя</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Ваша корзина</h2>
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="<?= $product['Image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($product['Name']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($product['Name']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($product['Description']) ?></p>
                    <p class="card-text">Цена: <?= htmlspecialchars($product['Price']) ?>₽</p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
