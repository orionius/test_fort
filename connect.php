<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Connect</title>
</head>
<body>
<?php

interface FirstInterface {
    // Подключение к базе
    public function base();
    // вывод всех позиций
    public function all();
    // Фильтр по телефону
    public function find($phone);
    // Добавляем данные в базу
    public function add($name, $phone, $email);
    // Удаляем данные из базы
    public function delete($id);
    // Проверка на ошибку подключения
    public function err();
}


class Con implements FirstInterface
{
    const HOST = "127.0.0.1";
    const USER = "root";
    const PASSWORD = "";
    const DATABASE = "test_fort";
    const PORT = "3306";
    private $db;

    public function base()
    {
        $this->$db = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DATABASE, self::PORT);
        mysqli_set_charset($this->$db, 'utf8');

        return $this->$db;
    }

    public function all()
    {
        $this->base();
        $this->err();
        $query = mysqli_query($this->$db, "SELECT * FROM `user`");
        return $query;
    }

    public function find($phone)
    {
        $this->base();
        $this->err();
        $query = mysqli_query($this->$db, "SELECT * FROM `user` WHERE phone LIKE  '%". $phone ."%'" );

        return $query;
    }

    public function add($name, $phone, $email)
    {
        $this->base();
        $query = mysqli_query($this->$db, "INSERT INTO user(name,phone,email) VALUES ('" . $name . "','" . $phone . "','" . $email . "')");
        return $query;
    }

    public function delete($id)
    {
        $this->base();
        $query = mysqli_query($this->$db, "DELETE FROM user WHERE id = " . $id);
        return $query;
    }

    public function err()
    {
        $this->base();
        if (!($this->$db)) {
            exit(0);
        }
    }
}

?>
</body>