<?php


namespace app\models;


class ReplaceDate
{
    static function par_date($date, $time){

//        $current = strtotime(date("Y-m-d"));
//        $date = strtotime($date);
//
//        $datediff = $date - $current;
//        $difference = floor($datediff/(60*60*24));
//        if($difference==0)
//        {
//            $date = 'Сегодня';
//        }
//        else if($difference > 1)
//        {
//            $date = 'Future Date';
//        }
//        else if($difference > 0)
//        {
//            $date = 'Завтра';
//        }
//
//
//        else if($difference == -1)
//        {
//            $date = 'Вчера';
//        }
//
//


        switch ($date) {


            case $date==date('Y-m-d'):

                $date = 'Сегодня';

                break;

            case $date>date('Y-m-d',strtotime('-1 day')):

                $date = 'вчера';

                break;

            case $date>date('Y-m-d',strtotime('-2 day')):

                $date = 'позавчера';

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