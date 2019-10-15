<?php


namespace app\models;


class Bookmark
{
    public $collection;

    public function parse($str)
    {
        $temp="/\d+/";
        preg_match_all($temp,$str,$matches);
        if (!isset($this->collection)){
            $this->collection=$matches[0];
        }
        return $this->collection;
    }
}