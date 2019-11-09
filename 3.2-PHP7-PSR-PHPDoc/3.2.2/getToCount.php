<?php 
/**
 * Считает заказ на основе данных от пользователя
 * @param array $menu 
 * @param array $post
 * @return string 
 */
function getToCount(array $menu, array $post) : string
{
    $random = random_int(1000, 9999);
    $purchase_html = "<div class=\"order322-line order322-title\">
        Счёт №$random</div>";
    $summ_perchase = 0;
    $servise = (int)$post['service'];
    
    foreach ($menu as $prop) {
        var_dump($prop, $post);
        $value = $post[$prop->id];
        if ($value > 0) {
            $quantity = $value * $prop->price;
            $quantity_format = number_format($prop->price * $value, 2);
            $c =  number_format($prop->price, 2);
            $purchase_html .= "<div class=\"order322-line\"><div>$prop->name</div>
                <div>$value * $c ₽ = $quantity_format ₽</div></div>";
            $summ_perchase += $quantity;
        }
    }

    if ($summ_perchase > 0) {
        if($servise === 2) {
            $servise_second = number_format($summ_perchase * 0.10, 2);
            $purchase_html .= "<div class=\"order322-line\">
                <div>Скидка 10% (самовывоз)</div>
                <div>- $servise_second ₽</div></div>";
            $summ_perchase = $summ_perchase - (float)$servise_second;
        } elseif ($servise === 4) {
            $servise_second = number_format($summ_perchase * 0.10, 2);
            $purchase_html .= "<div class=\"order322-line\"><div>Чаевые 10%</div>
                <div>$servise_second ₽</div></div>";
            $summ_perchase = $summ_perchase + (float)$servise_second;
        } elseif ($servise === 1) {
            $servise_second = number_format($summ_perchase * 0.10, 2);
            $purchase_html .= "<div class=\"order322-line\">
                <div>Доставка</div><div>200.00 ₽</div></div>";
            $summ_perchase = $summ_perchase + 200;
        }
    } else { 
        $purchase_html .= "<div class=\"order322-line\">Ничего не заказано</div>";
    }
        $summ_perchase = number_format($summ_perchase, 2); 
        $purchase_html .= "<div class=\"order322-total\">
            <div>Итого: $summ_perchase ₽</div></div>";
        return $purchase_html;
}