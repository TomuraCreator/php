<?php
    /**
     * Функция получает текущее количество просмотров на видео
     *
     * @return int
     */
    function getViews()
    {
        $views = include 'views.php';
        return (int) $views;
    }

    /**
     * Функция увеличивает количество просмотров на 1
     *
     * @param int $views
     */
    function incrementViews($views)
    {
        $views++;
        $data = "<?php \r\nreturn {$views};";
        file_put_contents('views.php', $data);
    }

    /**
     * Функция проверяет, нужно ли увеличивать число просмотров
     *
     * @return bool
     */
    function shouldBeIncremented()
    {
        $expire = 300;
        
        $timer = $_COOKIE['timer'];
        if( !isset($timer)) {
            setcookie('timer', time(), time()+$expire);
        }

        if(( time() - $timer ) > 300) {
            setcookie('timer', time(), time()+300);
            incrementViews(getViews());
        } 
        
    }
    
    shouldBeIncremented();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Tube</title>
</head>
<header style="width:100%; border-bottom: 1px solid black">
    <b>YOUR TUBE</b>
</header>
<body>
<div style="width: 69%; border-right: 1px solid black; display: inline-block">
        <iframe height="270px" src="https://www.youtube.com/embed/im-YT43aDwU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="text-align: center; border: 1px solid black; background-color: black; color: white; width: 100%;">
        </iframe>
    <div style="margin-top: 2px; border-top: 1px solid black;">
        <b>Просмотров: <?php echo getViews()?> </b>
    </div>
</div>
<div style="width: 29%; display: inline-block; margin-bottom: 100%">
    <div style="text-align: center; border: 1px solid black; background-color: black; color: white; height: 39.375%; margin:1px">
        <br>
        <br>
        Очень интересное видео
        <br>
        <br>
    </div>
    <div style="text-align: center; border: 1px solid black; background-color: black; color: white; height: 39.375%; margin:1px">
        <br>
        <br>
        Очень интересное видео
        <br>
        <br>
    </div>
    <div style="text-align: center; border: 1px solid black; background-color: black; color: white; height: 39.375%; margin:1px">
        <br>
        <br>
        Очень интересное видео
        <br>
        <br>
    </div>
    <div style="text-align: center; border: 1px solid black; background-color: black; color: white; height: 39.375%; margin:1px">
        <br>
        <br>
        Очень интересное видео
        <br>
        <br>
    </div>

</div>

</body>
</html>
