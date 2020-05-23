<?php


namespace rainwaves\Press;


class MarkDownParser
{
    public static function parse($string)
    {
       return \Parsedown::instance()->text($string);
    }
}