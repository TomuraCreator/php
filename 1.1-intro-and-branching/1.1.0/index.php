<?php 
$text = 'Hello, world!';
$image = 'https://cdn.pixabay.com/photo/2016/02/19/11/19/computer-1209641_960_720.jpg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.0</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="img" style="background-image: url(<?= $image; ?>)">
        <div class="greeting">
            <h1><?= $text; ?></h1>
        </div>
    </div>
</body>
</html>