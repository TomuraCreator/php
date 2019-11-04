<?php
class Person
{
    private $name;
    private $surname;
    private $patronymic;
    private $gender;
    private $genderSurnameEnded = [
        'male' => [
            'й', 'н', 'в'
        ],
        'female' => [
            'а', 'я', 'к'
        ]
    ];
    private const GENDER_MALE = 1;
    private const GENDER_FEMALE = -1;
    private const GENDER_UNDEFINED = 0;

    function __construct (string $name, string $surname, string $patronymic = null)
    {
        $this->name = $name; 
        $this->surname = $surname;

        if ($patronymic != null) {
            $this->patronymic = $patronymic;
        }
        $surnameEnd = mb_substr($surname, -1);
        if (in_array($surnameEnd, $this->genderSurnameEnded['male'])) {
            $this->gender = self::GENDER_MALE;

        } elseif (in_array($surnameEnd, $this->genderSurnameEnded['female'])) {
            $this->gender = self::GENDER_FEMALE; 
        } else {
            $this->gender = self::GENDER_UNDEFINED;
        }
    }
    public function getAbbreviation () : string
    { 
       return $this->surname . ' ' . $this->name . ' ' . $this->patronymic . ' ';
    }
    public function getGender () : string
    {
        if ($this->gender === 1) {
            return 'male';
        } elseif ($this->gender === -1) {
            return 'female';
        } else {
            return 'undefined';
        }
    }
    public function getGenderSymbol () : string
    {
        if ($this->gender === 1) {
            return '♂';
        } elseif ($this->gender === -1) {
            return '♀';
        } else {
            return '😎';
        }
    }
}

?>