<?php


namespace app\models;


class Findincollection
{


    public static function parse($str)
    {
        $temp="/\d+/";
        preg_match_all($temp,$str,$matches);
        return $matches[0];
    }

    public static function pregr($str)
    {
        $temp="/\w+/";
        preg_match_all($temp,$str,$matches);
        return $matches[0];
    }
}