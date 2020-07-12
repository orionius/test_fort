<?php
// Функция всплывающего окна
 function alert($text)
{
    ?>
    <script>
    alert(" <? echo  $text; ?> ");
    </script>
    <?php
}
// Функция перенаправления
function gotoUrl($url)
{
     ?> <script>document.location.href = '<? echo "$url"; ?>';</script> <?php
}