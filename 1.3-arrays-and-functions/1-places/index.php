<?php       
    $chairs = 30;
    $map = generate(5, 8, $chairs);
    $requiredRow = 3;
    $requiredPlace = 5;

    function generate($rows, $placesPerRow, $avaliableCount) {
        $arr = [];
        $counter = 0;
        for ($i=1; $i <= $rows; $i++) {
            $arrless = [];
            for($k=1; $k <= $placesPerRow; $k++) {
                if( $counter < $avaliableCount):
                    array_push($arrless, FALSE);
                else:
                    array_push($arrless, TRUE);                    
                endif;
                $counter++;
            }   
            $arr[$i] = $arrless;
        }
        return $arr;
    }
    function reserve(&$map, $row, $requiredSeat) {
        if(!$map[$row][$requiredSeat - 1]):
            $map[$row][$requiredSeat - 1] = TRUE;
            return TRUE;
        else: 
            return FALSE;
        endif;
    }
    function logReserve($row, $place, $result){
        if ($result):
            echo "Ваше место забронировано! Ряд $row, место $place".'<br>';
        else:
            echo "Ваше место занято либю вы выбрали несуществующее место!".'<br>';
        endif;
    }
    $reverve = reserve($map, $requiredRow, $requiredPlace);
    logReserve($requiredRow, $requiredPlace, $reverve);

    $reverve = reserve($map, $requiredRow, $requiredPlace);
    logReserve($requiredRow, $requiredPlace, $reverve);
    
?>