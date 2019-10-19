<?php 
    $map = generate(5, 8);
    function generate($rows, $placesPerRow) {
        $arr = [];
        $counter = 0;
        for ($i=1; $i <= $rows; $i++) {
            $arrless = [];
            for($k=1; $k <= $placesPerRow; $k++) {
                $randomCount = round(rand(0, 1), 1, PHP_ROUND_HALF_UP);
                array_push($arrless, ($randomCount == 0) ? FALSE : TRUE);                
                $counter++;
            }   
            $arr[$i] = $arrless;
        }
        return $arr;
    } 
    
    function reserveCompany($count, $arr) {
        for($i = 1; $i <= count($arr); $i++) {
            $freeSeatCount = 0;
            if((count($arr[$i]) - ($count + 1)) >= 0):   
                for($k = 0; $k < count($arr[$i]); $k++) {
                    if($arr[$i][$k] === false): 
                       $freeSeatCount++;
                    else:
                       $freeSeatCount = 0;
                    endif;
                    if($freeSeatCount >= $count):
                        echo "Свободные места есть в $i ряду";
                        exit;
                    elseif($i === count($arr)): 
                        echo "Свободных мест нет";
                        exit;
                    endif;
                }
            endif;
        }
    }
    reserveCompany(4, $map);

    


?>