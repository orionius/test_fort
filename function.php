<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Function</title>
</head>
<?php

interface SecondInterface
{
    public function alert($text);//!< Отобразить модульное окно

    public function gotoUrl($url);//!< Переход по ссылке
}

class Func implements SecondInterface
{
// Функция всплывающего окна
    function alert($text)
    {
        ?>
        <script>alert(" <? echo $text; ?> ");</script>
        <?php
    }

// Функция перенаправления
    function gotoUrl($url)
    {
        ?>
        <script>document.location.href = '<? echo "$url"; ?>';</script> <?php
    }

}