<?php 
include '..\database\connectdb.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .btn-tiffany {
            background-color: #0abab5; /* Цвет тифани */
            color: white;
            border: none;
        }
        .btn-tiffany:hover {
            background-color: #08a2a0;
            color: white;
        }
        .img-thumbnail {
            height: 100px;
            object-fit: cover; /* Для лучшего отображения изображений */
        }
        .modal-content {
            background: #f8f9fa; /* Светлый фон для модальных окон */
        }
    </style>
</head>
<body>
<?php include 'nav/nav_admin.php'; ?>
    <div class="container mt-4">
        <table class="table">
            <thead class="table-light">
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
                
                $query = "SELECT Product.Name, Product.Price, Product.Image, Category.Name AS CategoryName, Category.Category_id, Product.Id_product
                        FROM Product
                        JOIN Category ON Product.Category_id = Category.Category_id";
                $result = $mysqli->query($query);
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Name']}</td>
                                <td>{$row['CategoryName']}</td>
                                <td>{$row['Price']}</td>
                                <td><img src='{$row['Image']}' alt='Изображение товара' class='img-thumbnail'></td>
                                <td>
                                    <button class='btn btn-tiffany' data-bs-toggle='modal' data-bs-target='#editProductModal{$row['Id_product']}'>Редактировать</button>
                                    <form action='products_crud/delete_product.php' method='post' style='display: inline;'>
                                        <input type='hidden' name='id' value='{$row['Id_product']}'>
                                        <button type='submit' class='btn btn-danger' onclick='return confirm(\"Вы уверены, что хотите удалить этот товар?\");'>Удалить</button>
                                    </form>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Произошла ошибка при загрузке данных</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <?php

        // Запрос к базе данных для получения категорий
        $categoryQuery = "SELECT Category_id, Name FROM Category";
        $categoriesResult = $mysqli->query($categoryQuery);
        $categoryOptions = "";

        if ($categoriesResult) {
            while ($cat = $categoriesResult->fetch_assoc()) {
                $categoryOptions .= "<option value='{$cat['Category_id']}'>{$cat['Name']}</option>";
            }
        } else {
            $categoryOptions = "<option value=''>Ошибка загрузки категорий</option>";
        }
        ?>

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
                        <form action="products_crud/add_product.php" method="post">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Название</label>
                                <input type="text" class="form-control" id="productName" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Категория</label>
                                <select class="form-control" id="productCategory" name="category_id" required>
                                    <?= $categoryOptions ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Описание</label>
                                <textarea class="form-control" id="productDescription" name="description" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Стоимость</label>
                                <input type="number" class="form-control" id="productPrice" name="price" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="productImage" class="form-label">URL изображения</label>
                                <input type="text" class="form-control" id="productImage" name="image" required>
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

        <!-- Модальное окно редактирования товаров -->

        <?php
            $productQuery = "SELECT Product.Id_product, Product.Name, Product.Category_id, Product.Description, Product.Price, Product.Image, Category.Name AS CategoryName FROM Product JOIN Category ON Product.Category_id = Category.Category_id";
            $result = $mysqli->query($productQuery);

            if ($result) {
                while ($row = $result->fetch_assoc()) {

                    $categoryQuery = "SELECT Category_id, Name FROM Category";
                    $categories = $mysqli->query($categoryQuery);
                    $categoriesOptions = "";
                    while ($cat = $categories->fetch_assoc()) {
                        $selected = ($row['Category_id'] == $cat['Category_id']) ? "selected" : "";
                        $categoriesOptions .= "<option value='{$cat['Category_id']}' {$selected}>{$cat['Name']}</option>";
                    }

                    $productId = $row['Id_product'];
                    $productName = $row['Name'] ?? 'No name provided';
                    $productDescription = $row['Description'] ?? 'No description provided';
                    $productPrice = $row['Price'] ?? '0';
                    $productImage = $row['Image'] ?? 'No image available';

                    echo "
                    <div class='modal fade' id='editProductModal{$productId}' tabindex='-1' aria-labelledby='editProductModalLabel{$productId}' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='editProductModalLabel{$productId}'>Редактирование товара</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <form action='products_crud/edit_product.php' method='post'>
                                        <input type='hidden' name='id' value='{$productId}'>
                                        <div class='mb-3'>
                                            <label for='productName{$productId}' class='form-label'>Название</label>
                                            <input type='text' class='form-control' id='productName{$productId}' name='name' value='{$productName}'>
                                        </div>

                                        <div class='mb-3'>
                                            <label for='productCategory{$productId}' class='form-label'>Категория</label>
                                            <select class='form-control' id='productCategory{$productId}' name='category_id'>
                                                $categoriesOptions
                                            </select>
                                        </div>

                                        <div class='mb-3'>
                                            <label for='productDescription{$productId}' class='form-label'>Описание</label>
                                            <textarea class='form-control' id='productDescription{$productId}' name='description'>{$productDescription}</textarea>
                                        </div>

                                        <div class='mb-3'>
                                            <label for='productPrice{$productId}' class='form-label'>Стоимость</label>
                                            <input type='text' class='form-control' id='productPrice{$productId}' name='price' value='{$productPrice}'>
                                        </div>

                                        <div class='mb-3'>
                                            <label for='productImage{$productId}' class='form-label'>Изображение</label>
                                            <input type='text' class='form-control' id='productImage{$productId}' name='image' value='{$productImage}'>
                                        </div>
                                        
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
