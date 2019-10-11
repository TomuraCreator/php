<?php 
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $middleName = $_POST['middleName'];

    $full = "$firstName $middleName $lastName";
    $reduct_firstName = mb_strtoupper(mb_substr($firstName, 0, 1));
    $reduct_lastName = mb_strtoupper(mb_substr($lastName, 0, 1));
    $reduct_middleName = mb_strtoupper(mb_substr($middleName, 0, 1));

    $fullName = mb_convert_case($full, MB_CASE_TITLE, "UTF-8");
    $fio = $reduct_lastName . $reduct_firstName .$reduct_middleName;
    $surnameAndInitials = mb_convert_case($lastName, MB_CASE_TITLE, "UTF-8") . ' ' . 
    $reduct_firstName . '.' .$reduct_middleName;


    echo "Полное имя: " . $fullName .'<br>';
    echo "Фамилия и инициалы " . $surnameAndInitials .'<br>';
    echo "Аббревиатура: " . $fio;



    // Полное имя: 'Иванов Иван Иванович'
    // Фамилия и инициалы: 'Иванов И.И.'
    // Аббревиатура: 'ИИИ'


?>