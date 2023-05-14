<?php
if (!empty($_SESSION['sila_user'])) {
    header("Location:./main.php");
}
if (isset($_POST['login']) and isset($_POST['password'])) {
    $link = mysqli_connect('', 'root', '', 'sila');
    echo 1;
    $res = $link->query("SELECT id,login,password FROM users WHERE login = '" . $_POST['login'] . "'");
    if ($res->num_rows) {
        $user = $res->fetch_assoc();
        if (password_verify($_POST['password'], $user['password'])) {
            session_start();
            $_SESSION['sila_user'] = $user['id'];
            header('Location:./main.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <style>
        body {
            margin: 0;
        }

        .login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;

        }

        .login_form {
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            background: #6f7aad;
            padding: 20px;
            box-sizing: border-box;
        }

        h2 {
            margin: 0;
        }

        .form_body {
            width: 80%;

        }

        .form_body input {
            display: block;
            width: 100%;
            font-size: 1.5em;
            border-radius: 10px;
            margin: 1vh 0;
        }

        .error {
            text-align: center;
            color: #f00;
            width: 80%;
            transition: all .2s;
        }

        button {
            width: 40%;
            font-size: 1.2em;
            border-radius: 10px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="login">
        <form method="post" class="login_form">
            <h2>Вход</h2>
            <div class="form_body"><input type="text" name="login"><input type="password" name="password"></div>
            <div class="error"></div>
            <button type="submit">Вход</button>
        </form>
    </div>
    <script>

    </script>
</body>

</html>