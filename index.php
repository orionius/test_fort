<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<doxygenlayout version="1.0">

    <?php
    // Шапка сайта
    include("header.php");
    ?>
    <body>
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <div class="navbar-brand md-form my-0">
                <form class="form-inline ml-auto" id="formSearch" action="" method="get">
                    <div class="md-form my-0">
                        <input name="searching" class="form-control" type="text" placeholder="Поиск по телефону"
                               aria-label="Search">
                    </div>
                    <button name="buttonSearch" value="yes" class="btn btn-outline-white btn-md my-0 ml-sm-2"
                            type="submit">Поиск
                    </button>
                </form>
            </div>
            <form id="form" action="add.php" method="post"></form>
            <p>
                <button class="btn btn-primary" onclick="document.location.href = 'index.php'">Показать весь список
                </button>
                <button type="submit" class="btn btn-primary" value="add" form="form">Добавить нового</button>
                <button name="delete" type="submit" class="btn btn-danger" value="yes" form="myForm">
                    Удалить отмеченные
                </button>
            </p>
        </div>
    </nav>

    <?php
    include "connect.php";
    include "function.php";
    /* Создаем подключение */
    $connect = new Con();
    $db = $connect->base();

    /* Удаление отмеченных строк */
    if (isset($_POST["delete"]) && $_POST["delete"] == "yes" && isset($_POST["checkbox"])) {
        $checkbox = $_POST["checkbox"];
        //Перебираем массив чекбоксов и удаляем отмеченные
        foreach ($checkbox as $key => $id) {
            $connect->delete($id);
        }
        gotoUrl("");
    }

    /* Если произошло нажатие на кнопку поиск - выбираем позиции  */
    if (isset($_GET["buttonSearch"]) && $_GET["buttonSearch"] == "yes") {
        if (isset($_GET["searching"]) && strlen($_GET["searching"]) > 0) {
            $search = addslashes($_GET["searching"]);
            $query_search = $connect->find($search);
        }
    }
    /* Если есть искомые данные выкладываем их ,если нет то запрашиваем все  */
    if (isset($query_search)) {
        $query = $query_search;
    } else {
        $query = $connect->all();
    }

    /* Вывод таблицы на экран */
    ?>
    <form id="myForm" action="" method="post">
        <h2>Список телефонов</h2>
        <table class="bordered">
            <thead>
            <tr>
                <th style="width:50px;">
                    <p><input id="select_all" type="checkbox" style="transform:scale(1.2);"></p>
                </th>
                <th style="width:300px;">
                    <p>Имя</p>
                </th>
                <th>
                    <p>Телефон</p>
                </th>
                <th>
                    <p>Е-mail</p>
                </th>
            </tr>
            </thead>
            <?
            while ($row = $query->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <p>
                            <input id="chek" style="transform:scale(1.2);" name="checkbox[]" type="checkbox"
                                   id="checkbox1"
                                   value=<? echo $row["id"]; ?>>
                        </p>
                    </td>
                    <td>
                        <p><?php echo $row["name"]; ?></p>
                    </td>
                    <td>
                        <p><?php echo $row["phone"]; ?></p>
                    </td>
                    <td>
                        <p><?php echo $row["email"]; ?></p>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </form>
    </body>
    <footer>
        <script>
            document.getElementById('select_all')
                .addEventListener('click', function (e) {
                    var els = document.querySelectorAll(
                        'input[id="chek"]'
                    );
                    Array.prototype.forEach.call(els, function (cb) {
                        cb.checked = e.target.checked;
                    });
                });
        </script>
    </footer>
    </html>
</doxygenlayout>







