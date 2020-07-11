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