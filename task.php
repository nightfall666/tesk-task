<?php

function isEven($number)
{
    return $number % 2 == 0;
}

function printPromotionDates($year)
{
    $tablePromotions = 0;
    $chairPromotions = 0;

    $months = array(
        1 => 'янв',
        2 => 'фев',
        3 => 'мар',
        4 => 'апр',
        5 => 'мая',
        6 => 'июн',
        7 => 'июл',
        8 => 'авг',
        9 => 'сен',
        10 => 'окт',
        11 => 'ноя',
        12 => 'дек'
    );

    for ($currentYear = 2000; $currentYear <= $year; $currentYear++) {
        for ($month = 1; $month <= 12; $month++) {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $currentYear);

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = date(date("$day-е ") . $months[(date('n'))] . '.' . date(' Y'));

                if (isEven($day)) {

                    $tablePromotions++;
                    echo "$date - Акция на столы\n";
                } else {

                    $chairPromotions++;
                    echo "$date - Акция на стулья\n";
                }
            }
        }
    }

    echo "Всего акций на столы: $tablePromotions\n";
    echo "Всего акций на стулья: $chairPromotions\n";

    if ($tablePromotions > $chairPromotions) {
        echo "В следующем году будут акции на стулья до тех пор, пока счет не сравняется.\n";
    } elseif ($chairPromotions > $tablePromotions) {
        echo "В следующем году будут акции на столы до тех пор, пока счет не сравняется.\n";
    } else {
        echo "Счет акций сравнялся, следующий год будет определен позднее.\n";
    }
}


$year = 2023;
printPromotionDates($year);


