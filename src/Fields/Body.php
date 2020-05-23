<?php


namespace rainwaves\Press\Fields;

use rainwaves\Press\MarkDownParser;

class Body extends FieldContract
{
    public static function process($type, $value, $data)
    {
        return [
            $type => MarkDownParser::parse($value)
        ];
    }
}