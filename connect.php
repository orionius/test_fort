<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Connect</title>
</head>
<body>


<?php

class Con
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

    public function add($name, $phone, $email)
    {
        //  $this->err();
        $this->base();
        $query = mysqli_query($this->$db, "INSERT INTO user(name,phone,email) VALUES ('" . $name . "','" . $phone . "','" . $email . "')");
        return $this;
    }

    public function delete($id)
    {
        $this->err();
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