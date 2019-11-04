<?php


namespace app\models;


class ReplaceDate
{
    static function par_date($date, $time){




        switch ($date) {


            case $date>date('Y-m-d',strtotime('-1 day')):

                $date = 'Сегодня';

                break;

            case $date>date('Y-m-d',strtotime('-1 day')):

                $date = 'вчера';

                break;

            case $date>date('Y-m-d',strtotime('-2 day')):

                $date = 'Позавчера';

                break;

            case $date>date('Y-m-d',strtotime('-1 week')):

                $date = 'Неделю назад';

                break;

            case $date>date('Y-m-d',strtotime('-1 month')):

                $date = 'Месяц назад';

                break;

            case $date>date('Y-m-d',strtotime('-6 month')):

                $date = 'Пол года назад';

                break;

            case $date>date('Y-m-d',strtotime('-1 year')):

                $date = 'Год назад';

                break;








            default:
                break;
        }






        $res=$date.' в '.$time;
        return $res;



    }
}