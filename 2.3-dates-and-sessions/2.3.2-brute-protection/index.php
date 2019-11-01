<?php
$users = [
    'admin' => 'admin1234',
    'randomUser' => 'somePassword',
    'janitor' => 'nimbus2000'
];

$login = $_POST['login'];
$password = $_POST['password'];

/**
 * Првоеряет логин и пароль
 * @param string $login логин
 * @param array $arr массив с пользователями
 * @param string $pass пароль
 * @return bool
 */
function checkPass (string $username, array $arr, string $pass) : bool
{
    if (array_key_exists($username, $arr)) {
        if ($arr[$username] == $pass) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }   
}

/**
 * Проверяет попытку входа на brute force
 * @return bool
 */
function checkBruteForce() : bool 
{
    session_start();
    $time = $_SESSION['time'];
    if (!empty($time)) {
        $_SESSION['time'] = time();
    }
    if (time() - $time <= 20) {
        return true;
    } else {
        return false;
    }
}

/**
 * Возвращает дату
 * @param string $date дата 
 * @return void 
 */
function getDates(string $date = 'now') : string
{
    $date = date_create($date);
    if(!!$date) {
        return $date->format('Y-m-d H:i:s');
    }
}

/**
 * Производит запись в сессию
 * @param string $login логин пользователя
 * @return void
 */
function writeAndGetLog(string $login) : void
{
    $_SESSION[$login][] = "$login - " . getDates(); 
}

/**
 * Уничтожает существующую сесиию если она существует
 * @return void
 */
function clearLogSession () : void
{
    if (session_status() != PHP_SESSION_NONE) {
        session_destroy();        
    }
}

if (checkPass($login, $users, $password)) {
    echo "Добро пожаловать $login";
    clearLogSession(true);
} else {
    echo "Pass or login incorrect.";
    if (checkBruteForce()) {
        $log = "$login - " . getDates();
        writeAndGetLog($login);
        if (count($_SESSION[$login]) >= 3 ) {
            echo "Вы вводите данные слишком быстро";
            file_put_contents("$login.txt", $log . PHP_EOL, FILE_APPEND);
        }
    }
}


?>