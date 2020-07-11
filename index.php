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
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                    </div>
                    <button name="searching" class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit">Поиск
                    </button>
                </form>
            </div>
            <form id="form" action="add.php" method="post"></form>
            <p>
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
    /* Удаление отмеченных строк */
    if (isset($_POST["delete"]) && $_POST["delete"] == "yes" && isset($_POST["checkbox"])) {
        $buttonDelete = addslashes($_POST["delete"]);
        $checkbox = $_POST["checkbox"];
        //Перебираем массив чекбоксов и удаляем отмеченные
        foreach ($checkbox as $key => $id) {
               $connect->delete($id);
        }
        echo "<script>document.location.href = '';</script>";
    }
    /* Подключение к базе */
    $connect = new Con();
    $db = $connect->base();
    $query = mysqli_query($db, "SELECT * FROM `user`");
    
    /* Вывод таблицы на экран */
    ?>
    <form id="myForm" action="" method="post">
        <h2>Участники забега</h2>
        <table class="bordered">
            <thead>
            <tr>
                <th style="width:50px;">
                </th>
                <th style="width:50px;">
                    <p>№</p>
                </th>
                <th>
                    <p>Имя</p>
                </th>
                <th>
                    <p>Лет</p>
                </th>
            </tr>
            </thead>
            <?
            while ($row = $query->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <p>
                            <input style="transform:scale(1.2);" name="checkbox[]" type="checkbox" id="checkbox1"
                                   value=<? echo $row["id"]; ?>>
                        </p>
                    </td>
                    <td>
                        <p><?php echo $row["id"]; ?></p>
                    </td>
                    <td>
                        <p><?php echo $row["name"]; ?></p>
                    </td>
                    <td>
                        <p><?php echo $row["phone"]; ?></p>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </form>
    </body>
    <footer>
    </footer>

    </html>
</doxygenlayout>







