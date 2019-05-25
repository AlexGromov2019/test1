<?php

namespace App\models;


class DateBuilder{

    public static function convertDate($creation_date){
        $pattern = '/([0-9]{4})-([0-9]{2})-([0-9]{2})/';
        //Только год
        $year = '$1';
        //Только месяц
        $month = '$2';
        //Только день
        $day = '$3';
        //Ищем совпадение $creation_date в $pattern, и выводим только месяц $month
        $pregMonth = preg_replace($pattern, $month, $creation_date);
        //Ищем совпадение $creation_date в $pattern, и выводим только год $year
        $pregYer = preg_replace($pattern, $year, $creation_date);
        //Ищем совпадение $creation_date в $pattern, и выводим только день $day
        $pregDay = preg_replace($pattern, $day, $creation_date);

        //Создаем массив из месяцев, 01 => Январь, 02 => Февраль и т.д.
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];
        //Ищем, есть ли такой ключ в массиве, если есть -> выводим его значение
        if(array_key_exists($pregMonth, $months)){
            $onemonth = $months[$pregMonth];
            return ($onemonth .' '. $pregDay . ', ' . $pregYer);
        }
    }
}