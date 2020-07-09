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

    public function base()
    {
        $db = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DATABASE, self::PORT);
         mysqli_set_charset($db,'utf8');
        return $db  ;
    }
}

?>
</body>