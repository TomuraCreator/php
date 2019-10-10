<?php
    $date = getdate();
    $times = "{$date['hours']}.{$date['minutes']}";
    $wday = $date['wday'] - 1;
    $day_code = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
    $url = NULL;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="greeting">
        <?php if ($times >= 23.00 && $times <= 05.59):?>
            <?php $url = 'https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569_960_720.jpg'?>
            <h1><?php echo "Доброй ночи!"?></h1>
            <p><?php echo "Сегодня $day_code[$wday]"?></p>
        <?php elseif ($times >= 06.00 && $times <= 10.59):?>
            <?php $url = 'https://cdn.pixabay.com/photo/2019/10/01/12/24/path-4518094_960_720.jpg'?>
            <h1><?php echo "Доброе утро!"?></h1>
            <p><?php echo "Сегодня $day_code[$wday]"?></p>
        <?php elseif ($times >= 11.00 && $times <= 17.59):?>
            <?php $url = 'https://cdn.pixabay.com/photo/2018/08/14/14/00/landscape-3605626_960_720.jpg'?>
            <h1><?php echo "Добрый день!"?></h1>
            <p><?php echo "Сегодня $day_code[$wday]"?></p>
        <?php elseif ($times >= 18.00 && $times <= 22.59):?>
            <?php $url = 'https://cdn.pixabay.com/photo/2018/09/19/23/03/sunset-3689760_960_720.jpg'?>
            <h1><?php echo "Добрый вечер!" ?></h1>
            <p><?php echo "Сегодня $day_code[$wday]"?></p>
        <?php endif?>
    </div> 
    <img class="img" <?php echo "src=$url" ?>>
</body>
</html>