<?php 
    $var = '1';
    $type_array = array('bool', 'float', 'int', 'string', 'null', 'other');
    $descriptions = array('Булево значение. Логический тип данных.',
        'Число с плавающей точкой. Используется в точных математических вычислениях.',
        'Целочисленный тип данных. Используется в простых математических операциях',
        'Строковое представление данных. Представление информации в виде текста.',
        'Специальный тип данных. Означает пееременную без значения.');
?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>bPHP - 1.1.1</title>
        </head>
        <body>
            <?php
                for($i = 0; $i < count($type_array) - 1; $i++) {
                    $types = 'is_'.$type_array[$i];
                    if($types($var)) echo "<p>$var is $type_array[$i]</p><hr>$descriptions[$i]"; 
                }
            ?>
        </body>
        </html>
