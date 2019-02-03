<?php
$number = $argv[1];

fwrite(STDOUT, PHP_EOL . countBills($number) . PHP_EOL);

function countBills($number){
    $str = '';
    if ($number > 100000) {
        $str = 'You can not get more than 100 000';
    } else {
        $bills = [1,2,5,10,20,50,100,200,500];
        foreach (array_reverse($bills) as $value) {
            if ($number < $value) {
                continue;
            }
            $coups = intdiv($number, $value);
            $number = $number % $value;//получаем остаток
            $str .= $value . ' - ' . $coups . PHP_EOL;
            if ($number === 0) {
                break;
            }
        }
    }
    return $str;
}