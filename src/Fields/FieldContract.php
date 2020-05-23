<?php


namespace rainwaves\Press\Fields;


class FieldContract
{
    public static function process($fieldType, $fieldValue, $data)
    {
        return [$fieldType => $fieldValue];
    }
}