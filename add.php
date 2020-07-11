<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<doxygenlayout version="1.0">
    <?php
    // Шапка сайта
    include("header.php");
    include ("connect.php");
    include ("function.php");
    ?>

    <body>
    <!-- Строка навигации -->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <form id="formAdd" action="index.php" method="post"></form>
            <p>
                <button type="submit" class="btn btn-primary" value="add" form="formAdd">Перейти в список</button>
            </p>
        </div>
    </nav>
<?php
    /* Подключение к базе */
/*
    $connect = new Con();
    $db = $connect->base();
    $query = mysqli_query($db, "SELECT * FROM `user`");
    */
/* Добавляем новые позиции */
if (isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["email"]) ) {
    $name = addslashes($_POST["name"]);
    $phone = addslashes($_POST["phone"]);
    $email = addslashes($_POST["email"]);
    if (!($name)) { alert('Поле Имя не заполнено');}
    if (!($phone)) { alert("Поле телефон не заполнено");}
    if (!($email)) { alert("Поле email не заполнено");}

    $connect = new Con();
    $addErr = $connect->add($name,$phone,$email);

    echo "<script>document.location.href = '';</script>";
}
   ?>
<!-- Форма добавления -->
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4"> </div>
            <div class="col-md-4">
                <h4>Добавьте новые данные </h4>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Ваше имя:</label>
                        <input type="name" name="name" class="form-control" id="name" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <label for="email1">E-mail:</label>
                        <input type="email" name="email" class="form-control" id="email1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Номер телефона:</label>
                        <input type="phone" name="phone" class="form-control" id="phone" placeholder="Телефон">
                    </div>

                    <button type="submit" class="btn btn-info">Отправить </button>
                </form>
            </div>
            <div class="col-md-4"> </div> </div>
    </div>
    </body>


