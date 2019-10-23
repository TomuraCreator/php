<?php
    $file = 'main.csv';
    $main = fopen($file, 'r+');
    $array_file = getAray($main);
    fclose($main);
     
    function getAray($resource) {
        $array = [];
        while (($buffer = fgetcsv($resource, 4096, ';')) !== false) {
            $array[] = mb_convert_encoding($buffer, "UTF-8");
        }
        return $array;
    }
    
    /**
     * Парсит массив в JSON 
     * @param array $inArr
     * @return string
     */

    function parseToJSON( array $inArr) {
        $toArr = [];
        for($i = 1; $i < count($inArr); $i++) {
            $toArr[] = [
                $inArr[0][0] => $inArr[$i][0],
                $inArr[0][1] => $inArr[$i][1],
                $inArr[0][2] => $inArr[$i][2]
            ];
        };
        return json_encode($toArr, JSON_UNESCAPED_UNICODE);
    }

    file_put_contents('csvtojson.json', parseToJSON($array_file));

?>