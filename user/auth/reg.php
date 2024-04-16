<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../design/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Регистрация</title>
    <style>
        

        .form-reg {
            width: 100%;
            max-width: 393px;
            padding: 69px;
            margin: 200px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-reg h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-reg input {
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
            width: 100%;
        }

        .form-reg button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #0abab5;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-reg button:hover {
            background-color: #089a9a;
        }

        .form-reg p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .form-reg p a {
            color: #0abab5;
            text-decoration: none;
        }

        .form-reg p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include "../../header.php"; ?>
    <div class="form-reg">
        <h2>Регистрация</h2>
        <form action="../../../database/reg_db.php" method="post">
            <input required type="email" name="email" placeholder="Email" class="form-control mb-3">
            <input required type="password" name="password" placeholder="Пароль" class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Регистрация</button>
            <p>Есть аккаунт? <a href="auth.php">Авторизируйтесь</a></p>
        </form>
    </div>
</body>
</html>
