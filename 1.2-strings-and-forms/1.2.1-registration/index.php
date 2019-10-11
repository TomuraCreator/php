
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <style type="text/css">
    input {
		display: block;
		margin-top: 10px;
	}
	button {
		margin-top: 10px;
	}
    div {
        color: red;
    }
  </style>
</head>
<body>
<?php 
    $code = '1234';
    $post = array_keys($_POST);
    $b = true;
    for($i = 0; $i < count($post); $i++) {
        if($post[$i] == 'login' && preg_match('/[@\/\*\?\,\;\:]/', $_POST['login']) == 1 ): 
            echo "<div>Поле логин не должно содержать символы @/*?,;:</div>"."<br>";
            $b = false;
        elseif($post[$i] == 'password' && preg_match('/.{8}/', $_POST['password']) == 0):
            echo "<div>Длина пароля должна быть минимум 8 символов</div>"."<br>";
            $b = false;
        elseif($post[$i] == 'firstName' && preg_match('/./', $_POST['firstName']) == 0):
            echo "<div>Поле Имя не может быть пустым</div>"."<br>"; 
            $b = false;
        elseif($post[$i] == 'lastName' && preg_match('/./', $_POST['lastName']) == 0):
            echo "<div>Поле Фамилия не может быть пустым</div>"."<br>"; 
            $b = false;
        elseif($post[$i] == 'middleName' && preg_match('/./', $_POST['middleName']) == 0):
            echo "<div>Поле Отчество не может быть пустым</div>"."<br>";
            $b = false;
        elseif($post[$i] == 'email' && preg_match('/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/', $_POST['email']) == 0): 
                echo "<div>Почта должна быть somemail@email.com</div>"."<br>";
            $b = false;
        elseif($post[$i] == 'code' && $_POST['code'] !== $code): 
            echo "<div>Код не совпадает</div>"."<br>";
            $b = false;
        endif;
    }
    if($b): 
        echo "Форма успешно отправлена";
    endif;
?>
</body>
</html>
