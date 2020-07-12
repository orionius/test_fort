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

function gotoUrl($url)
{
     ?> <script>document.location.href = '<? echo "$url"; ?>';</script> <?php
}