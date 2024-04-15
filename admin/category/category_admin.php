<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление категориями</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include '../nav/nav_admin.php'; ?>
    <div class="container mt-4">
        <h2>Управление категориями товаров</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название категории</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <!-- Список категорий -->
                <?php
                $categories = ["Соки", "Кофе", "Газированные напитки", "Молочные напитки", "Вода", "Детские напитки"];
                foreach ($categories as $index => $category) {
                    echo "<tr>
                            <td>" . ($index + 1) . "</td>
                            <td>$category</td>
                            <td>
                                <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#editCategoryModal-$index'>Редактировать</button>
                                <button class='btn btn-danger'>Удалить</button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            Добавить категорию
        </button>

        <!-- Модальное окно для добавления категории -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Добавление новой категории</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Название категории</label>
                                <input type="text" class="form-control" id="categoryName">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-primary">Сохранить категорию</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Модальные окна для редактирования каждой категории -->
        <?php
        foreach ($categories as $index => $category) {
            echo "<div class='modal fade' id='editCategoryModal-$index' tabindex='-1' aria-labelledby='editCategoryModalLabel-$index' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='editCategoryModalLabel-$index'>Редактирование категории</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class='mb-3'>
                                        <label for='categoryName-$index' class='form-label'>Название категории</label>
                                        <input type='text' class='form-control' id='categoryName-$index' value='$category'>
                                    </div>
                                </form>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Закрыть</button>
                                <button type='button' class='btn btn-primary'>Сохранить изменения</button>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        ?>

    </div>
</body>
</html>
