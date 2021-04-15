<?php

/**
 * Created by Prasetyo Adi Santoso - 2021
 * @param $key for shifting character
 * @return encryptor = $falsify,
 * @return decryptor = $truthy,
 */

namespace App\Repositories;

class Falsifying
{
    protected $item;
    protected $items;

    public static function falsifying($ch, $key)
    {
        if (!ctype_alpha($ch))
            return $ch;

        $offset = ord(ctype_upper($ch) ? 'A' : 'a');
        return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
    }

    public static function truthying($ch, $key)
    {
        if (!ctype_alpha($ch))
            return $ch;

        $offset = ord(ctype_upper($ch) ? 'A' : 'a');
        return chr(fmod(((ord($ch) - $key) - $offset), 26) + $offset);
    }

    public static function falsify($input)
    {
        $key = 5;
        $output = "";
        $inputArr = str_split($input);
        $item = new Falsifying();
        foreach ($inputArr as $ch)
            $output .= $item->falsifying($ch, $key);
        return $output;
    }


    public static function truthy($input)
    {
        $key = 5;
        $output = "";
        $inputArr = str_split($input);
        $item = new Falsifying();
        foreach ($inputArr as $ch)
            $output .= $item->truthying($ch, $key);
        return $output;
    }

}
