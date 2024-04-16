<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление заказами</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .btn-edit {
            color: #fff;
            background-color: #0d6efd; /* Синий цвет для кнопки Изменить */
            border-color: #0d6efd;
            margin-bottom: 10px;
        }
        .btn-delete {
            color: #fff;
            background-color: #dc3545; /* Красный цвет для кнопки Удалить */
            border-color: #dc3545;
        }
    </style>
</head>
<body>
<?php include '../nav/nav_admin.php'; ?>
    <div class="container mt-4">
        <h2>Управление заказами</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID заказа</th>
                    <th scope="col">ID пользователя</th>
                    <th scope="col">Дата заказа</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Общая стоимость</th>
                    <th scope="col">Использованные бонусы</th>
                    <th scope="col">Начисленные бонусы</th>
                    <th scope="col">ID продукта</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $orders = [
                    ['id' => 1, 'user_id' => 101, 'date' => '2023-04-01', 'status' => 'Оплачено', 'total' => 1500, 'used_bonuses' => 100, 'accrued_bonuses' => 50, 'product_id' => 501],
                    ['id' => 2, 'user_id' => 102, 'date' => '2023-04-02', 'status' => 'Обработка', 'total' => 2500, 'used_bonuses' => 200, 'accrued_bonuses' => 100, 'product_id' => 502]
                ];
                foreach ($orders as $order) {
                    echo "<tr>
                            <td>{$order['id']}</td>
                            <td>{$order['user_id']}</td>
                            <td>{$order['date']}</td>
                            <td>{$order['status']}</td>
                            <td>{$order['total']}</td>
                            <td>{$order['used_bonuses']}</td>
                            <td>{$order['accrued_bonuses']}</td>
                            <td>{$order['product_id']}</td>
                            <td>
                                <button class='btn btn-edit action-btn' data-bs-toggle='modal' data-bs-target='#editOrderModal-{$order['id']}'>Изменить</button>
                                <button class='btn btn-delete'>Удаление</button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrderModal">
            Добавить заказ
        </button>

        <!-- Модальное окно для добавления заказа -->
        <div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addOrderModalLabel">Добавление нового заказа</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <!-- Форма для добавления нового заказа -->
                            <div class="mb-3">
                                <label for="userId" class="form-label">ID пользователя</label>
                                <input type="number" class="form-control" id="userId">
                            </div>
                            <div class="mb-3">
                                <label for="orderDate" class="form-label">Дата заказа</label>
                                <input type="date" class="form-control" id="orderDate">
                            </div>
                            <div class="mb-3">
                                <label for="orderStatus" class="form-label">Статус заказа</label>
                                <select class="form-control" id="orderStatus">
                                    <option>Обработка</option>
                                    <option>Оплачено</option>
                                    <option>Отменено</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="totalPrice" class="form-label">Общая стоимость</label>
                                <input type="number" class="form-control" id="totalPrice">
                            </div>
                            <div class="mb-3">
                                <label for="usedBonuses" class="form-label">Использованные бонусы</label>
                                <input type="number" class="form-control" id="usedBonuses">
                            </div>
                            <div class="mb-3">
                                <label for="accruedBonuses" class="form-label">Начисленные бонусы</label>
                                <input type="number" class="form-control" id="accruedBonuses">
                            </div>
                            <div class="mb-3">
                                <label for="productId" class="form-label">ID продукта</label>
                                <input type="number" class="form-control" id="productId">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-primary">Сохранить заказ</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Модальное окно для редактирования заказа (пример для заказа с ID=1) -->
        <div class="modal fade" id="editOrderModal-1" tabindex="-1" aria-labelledby="editOrderModalLabel-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editOrderModalLabel-1">Редактирование заказа</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <!-- Поля формы могут быть автоматически заполнены текущими значениями заказа -->
                            <div class="mb-3">
                                <label for="orderStatus-1" class="form-label">Статус заказа</label>
                                <select class="form-control" id="orderStatus-1">
                                    <option>Обработка</option>
                                    <option selected>Оплачено</option>
                                    <option>Отменено</option>
                                </select>
                            </div>
                            <!-- Другие поля... -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>
</html>
