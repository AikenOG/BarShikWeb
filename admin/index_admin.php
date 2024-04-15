<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include 'nav/nav_admin.php'; ?>
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Стоимость</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '..\database\connectdb.php'; // Убедитесь, что этот файл существует и настроен правильно
                $query = "SELECT * FROM Product";
                $result = $mysqli->query($query);
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['Name']}</td>
                            <td>{$row['Category_id']}</td>
                            <td>{$row['Price']}</td>
                            <td><img src='{$row['Image']}' alt='Изображение товара' class='img-thumbnail' style='width: 100px;'></td>
                            <td>
                                <button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editProductModal{$row['Id_product']}'>Редактировать</button>
                                <button class='btn btn-danger' onclick='confirmDelete({$row['Id_product']})'>Удалить</button>
                            </td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            Добавление товара
        </button>

        <!-- Модальное окно для добавления товара -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Добавление нового товара</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="add_product.php" method="post">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Название</label>
                                <input type="text" class="form-control" id="productName" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Категория</label>
                                <input type="text" class="form-control" id="productCategory" name="category">
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Стоимость</label>
                                <input type="text" class="form-control" id="productPrice" name="price">
                            </div>
                            <div class="mb-3">
                                <label for="productImage" class="form-label">Изображение</label>
                                <input type="text" class="form-control" id="productImage" name="image">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if ($result) {
            $result->data_seek(0); // Перемотка результатов запроса в начало
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='modal fade' id='editProductModal{$row['Id_product']}' tabindex='-1' aria-labelledby='editProductModalLabel{$row['Id_product']}' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='editProductModalLabel{$row['Id_product']}'>Редактирование товара</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <form action='edit_product.php' method='post'>
                                    <input type='hidden' name='id' value='{$row['Id_product']}'>
                                    <div class='mb-3'>
                                        <label for='productName{$row['Id_product']}' class='form-label'>Название</label>
                                        <input type='text' class='form-control' id='productName{$row['Id_product']}' name='name' value='{$row['Name']}'>
                                    </div>
                                    <!-- Другие поля формы для редактирования -->
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Закрыть</button>
                                        <button type='submit' class='btn btn-primary'>Сохранить изменения</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
        ?>

    </div>
</body>
</html>
