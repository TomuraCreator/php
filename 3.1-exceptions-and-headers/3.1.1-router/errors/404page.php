<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            display: flex;
            justify-content: center;
            background-image: url("https://fony-kartinki.ru/_ph/120/2/42111211.jpg?1572811462");
            background-repeat: repeat;
        }
        img {
            margin-top: 40px;
            position: absolute;
            animation-name: slide;
            animation-duration: 2s;
            animation-delay: 1.5s;
            animation-fill-mode: forwards;
        }
        a {
            color: black;
            text-decoration: none;
            text-transform: uppercase;
            position: absolute;
            margin-top: 300px;
            font-size: 19pt;
            background: linear-gradient(45deg, #0B2349 33%, #0D61BC 66%, #8AA9D6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        @keyframes slide {
            from {
                margin-left: 0;
            } to {
                margin-left: 350px;
            }
        }
    </style>
    <title>404 page</title>
</head>
<body>
    <h1>Страница не найдена так что...</h1>
    <a href="../site.php" title="тсс, кому говорю!!!">сюда, только тссс!</a>
    <img src="https://s.tcdn.co/811/63a/81163a9c-cb35-4ee5-b172-edd769329040/7.png" alt="уходи">
</body>
</html>