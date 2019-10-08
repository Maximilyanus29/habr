<?php


namespace app\models;


class ReplaceDate
{
    static function par_date($date){

        switch ($date) {



            case $date<date('Y-m-d H:i:s',strtotime('-1 week')):

                return 'больше недели назад';

                break;

            case $date<date('Y-m-d H:i:s',strtotime('-1 day')):

                return 'вчера';

                break;

            case $date<date('Y-m-d H:i:s',strtotime('-1 hours')):

                return 'час назад';

                break;

            case $date<date('Y-m-d H:i:s',strtotime('-30 minutes')):

                return 'полчаса назад';

                break;



            case $date<date('Y-m-d H:i:s',strtotime('-20 minutes')):

                return '20 минут назад';

                break;


            case $date<date('Y-m-d H:i:s',strtotime('-10 minutes')):

                return '10 минут назад';

                break;


            case $date<date('Y-m-d H:i:s',strtotime('-5 minutes')):

                return '5 минут назад';

                break;



            case $date<date('Y-m-d H:i:s',strtotime('-1 minutes')):

                return '1 минуты назад';

                break;





            case $date<date('Y-m-d H:i:s',strtotime('-5 Second')):

                return '5 секунд назад';

                break;


            case $date<date('Y-m-d H:i:s',strtotime('-1 Second')):

                return 'секунду назад';

                break;
















            default:
                return $date;
                break;
        }
    }
}