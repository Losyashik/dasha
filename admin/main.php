<?php
session_start();
if (empty($_SESSION['sila_user'])) {
    header("Location:./");
}
$link = mysqli_connect('', 'root', '', 'sila');

if (isset($_POST['programDelete'])) {
    $img = $link->query("SELECT image FROM programs WHERE id = " . $_POST['programDelete'])->fetch_assoc()['image'];
    if (file_exists("./../$img")) {
        if (!unlink("./../$img")) {
            echo "error";
        }
    }
    $query = "DELETE FROM programs WHERE `id` = " . $_POST['programDelete'];
    $link->query($query) or die($link->error);
}
if (isset($_POST['applicationDelete'])) {
    $query = "DELETE FROM `application` WHERE `id` = " . $_POST['applicationDelete'];
    $link->query($query) or die($link->error);
}
if (isset($_POST['userDelete'])) {
    $query = "DELETE FROM `users` WHERE `id` = " . $_POST['userDelete'];
    $link->query($query) or die($link->error);
}

if (isset($_GET['exit'])) {
    session_unset();
    header("Location:./../");
}
if (isset($_POST['name']) and isset($_POST['login']) and isset($_POST['password']) and isset($_POST['passwordDbl'])) {

    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_dbl = $_POST['passwordDbl'];

    if ($password == $password_dbl) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (`name`, `login`, `password`, `passwordView`) VALUES ('$name', '$login', '$password', '$password_dbl')";
        $link->query($query);
    }
}



?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <style>
        #editor {
            border: 1px solid;
        }

        .table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        .table_ceil,
        .table_row {
            border: 1px solid;
            padding: 1vh 1vw;
        }

        .table_ceil img {
            max-width: 300px;
        }

        .form {
            display: flex;
            align-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form__body {
            width: 40%;
            display: flex;
            flex-direction: column;
        }

        .form__body * {
            margin: 1vh;
        }
    </style>
</head>

<body>
    <form>
        <button name="exit" type="submit">Выход</button>
    </form>
    <main class="main_admin">
        <section class="works">
            <div class="form">
                <h2>Добавление программ тренировок</h2>
                <form method="post" class="form__body" id="app" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Название">
                    <textarea name="discription" id="" cols="30" rows="10"></textarea>
                    <label>Изображение на главной странице <input type="file" name="image" id=""></label>
                    <div id="editor"></div>
                    <label>3 изображения для описания <input type="file" name="images[]" id="" multiple max="3"></label>
                    <button type="submit" name="addWork">Добавить</button>
                </form>
            </div>
            <h1>Программы тренировок</h1>
            <table class="work_list table">
                <tr class="administrators_list__row table_row">
                    <th class="administrators_list__ceil table_ceil">Изображение</th>
                    <th class="administrators_list__ceil table_ceil">Имя</th>
                    <th class="administrators_list__ceil table_ceil">Краткое описание</th>
                    <th class="administrators_list__ceil table_ceil">Удаление</th>
                </tr>
                <?php
                $result = $link->query("SELECT * FROM `programs`") or die($link->error);
                for ($data = []; $row = $result->fetch_assoc(); $data[] = $row);
                foreach ($data as $elem) {
                    echo
                    '<tr class="work_list__row table_row">
                    <td class="work_list__ceil table_ceil"><img src="../' . $elem['image'] . '" alt=""></td>
                    <td class="work_list__ceil table_ceil">' . $elem['name'] . '</td>
                    <td class="work_list__ceil table_ceil">' . $elem['description'] . '</td>
                    <td class="work_list__ceil table_ceil">
                        <form method="post"><button type="submit" name="programDelete" value="' . $elem['id'] . '">Удалить</button></form>
                    </td>
                </tr>';
                }
                ?>
            </table>
        </section>
        <section class="application">
            <h2>Заявки</h2>
            <table class="application_list table">
                <tr class="administrators_list__row table_row">
                    <th class="administrators_list__ceil table_ceil">Имя</th>
                    <th class="administrators_list__ceil table_ceil">Эл.Почта</th>
                    <th class="administrators_list__ceil table_ceil">Адрес</th>
                    <th class="administrators_list__ceil table_ceil">Удаление</th>
                </tr>
                <?php
                $result = $link->query("SELECT * FROM `application` ORDER BY `time` ASC");
                for ($data = []; $row = $result->fetch_assoc(); $data[] = $row);
                foreach ($data as $elem) {
                    echo
                    '<tr class="aplication_list__row table_row">
                        <td class="application_list_ceil table_ceil">' . $elem['name'] . '</td>
                        <td class="application_list_ceil table_ceil">' . $elem['numberPhone'] . '</td>
                        <td class="application_list_ceil table_ceil">' . $link->query("SELECT `name` FROM `programs` WHERE id =  " . $elem['id_program'])->fetch_assoc()['name'] . '</td>
                        <td class="application_list_ceil table_ceil">
                            <form method="post"><button type="submit" value="' . $elem['id'] . '" name="applicationDelete">Удалить</button></form>
                        </td>
                    </tr>';
                }
                ?>
            </table>
        </section>
        <sectiion class="administrators">

            <div class="form">
                <h2>Добавление администратора</h2>
                <form method="post" class="form__body" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Имя">
                    <input type="text" name="login" placeholder="Логин">
                    <input type="password" name="password" id="" placeholder="Пароль">
                    <input type="password" name="passwordDbl" id="" placeholder="Повторите пароль">
                    <button type="submit" name="addUser">Добавить</button>
                </form>
            </div>
            <h1>Администраторы</h1>
            <table class="administrators_list table">
                <tr class="administrators_list__row table_row">
                    <th class="administrators_list__ceil table_ceil">Имя</th>
                    <th class="administrators_list__ceil table_ceil">Логин</th>
                    <th class="administrators_list__ceil table_ceil">Пароль</th>
                    <th class="administrators_list__ceil table_ceil">Удаление</th>
                </tr>
                <?php
                $result = $link->query("SELECT * FROM users");
                for ($data = []; $row = $result->fetch_assoc(); $data[] = $row);
                foreach ($data as $elem) {
                    echo
                    '<tr class="administrators_list__row table_row">
                        <td class="administrators_list__ceil table_ceil">' . $elem['name'] . '</td>
                        <td class="administrators_list__ceil table_ceil">' . $elem['login'] . '</td>
                        <td class="administrators_list__ceil table_ceil">' . $elem['passwordView'] . '</td>
                        <td class="administrators_list__ceil table_ceil">
                            <form method="post"><button type="submit" name="userDelete" value="' . $elem['id'] . '">Удалить</button></form>
                        </td>
                    </tr>';
                } ?>
            </table>
        </sectiion>
    </main>
    <script src="./editor/editorjs@latest.js"></script>
    <script src="./editor/header@latest.js"></script>
    <script src="./editor/list@latest.js"></script>
    <script>
        const editor = new EditorJS({
            holder: "editor",
            tools: {
                Header,
                list: {
                    class: List,
                    inlineToolbar: true,
                    config: {
                        defaultStyle: 'unordered'
                    }
                },
            },
        })
        app.addEventListener('submit', (event) => {
            event.preventDefault()
            editor.save().then((outputData) => {
                let body = new FormData(event.currentTarget)
                body.append("app", "True");
                body.append("full_description", JSON.stringify(outputData.blocks));
                fetch("./add/", {
                    method: "post",
                    body
                }).then(response => {
                    if (response.status == 200)
                        // location.reload()
                        console.log();
                    else
                        console.log(response.text())
                })
            }).catch((error) => {
                console.log('Saving failed: ', error)
            });
        })
    </script>
</body>

</html>