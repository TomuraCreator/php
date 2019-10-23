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
            $arr_seat = [];
            if((count($arr[$i]) - ($count + 1)) >= 0):   
                for($k = 0; $k < count($arr[$i]); $k++) {
                    if($arr[$i][$k] === false): 
                       $freeSeatCount++;
                       $arr_seat[] = $k;
                    else:
                       $freeSeatCount = 0;
                       $arr_seat = [];
                    endif;
                    if($freeSeatCount >= $count):
                        return [
                            "row" => $i,
                            "place" => $arr_seat
                        ];
                    elseif($i === count($arr)): 
                        return FALSE;
                    endif;
                }
            endif;
        }
    }
 reserveCompany(4, $map);

    


?>