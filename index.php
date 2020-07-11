<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<doxygenlayout version="1.0">
    <head>
        <title>Test</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
              integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
              crossorigin="anonymous">
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous"></script>
        <!-- Наш CSS -->
        <link rel='stylesheet' href='css/style.css' type='text/css'/>
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="#">Тест</a>
                <p><input type="button" class="btn btn-primary" value="Добавить участника" onclick="add_user"></p>
            </div>
        </nav>
    </head>


    <body>
    <?php
    include "connect.php";
    $connect = new Con();
    $db = $connect->base();
    $connect->err();
    $query = mysqli_query($db, "SELECT * FROM `user`");

    if (isset($_POST["delete"]) && $_POST["delete"] == "yes" && isset($_POST["checkbox"])) {
        $buttonDelete = addslashes($_POST["delete"]);
        $checkbox = $_POST["checkbox"];
        //Перебираем массив чекбоксов и удаляем отмеченные
        foreach ($checkbox as $key => $id) {
            echo $id;
            $connect->delete($id);
        }
        echo "<script>document.location.href = '';</script>";
    }
    ?>
    <form action="" method="post">
        <h2>Участники забега</h2>
        <table class="bordered">
            <thead>
            <tr>
                <th>
                    <p>
                        <button name="delete" type="submit" class="btn btn-danger" value="yes">Удалить</button>
                    </p>
                </th>
                <th>
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
                        <p><input style="transform:scale(1.2);" name="checkbox[]" type="checkbox" id="checkbox1"
                                  value=<? echo $row["id"]; ?>  ></p>
                    </td>
                    <td>
                        <p><?php echo $row["id"]; ?></p>
                    </td>
                    <td>
                        <p><?php echo $row["name"]; ?></p>
                    </td>
                    <td>
                        <p><?php echo $row["age"]; ?></p>
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







