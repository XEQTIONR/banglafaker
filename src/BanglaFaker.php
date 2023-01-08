<?php

namespace Xeqtionr\BanglaFaker;



class BanglaFaker extends BaseFaker
{
    public static $childClasses = [
        '\\Xeqtionr\\BanglaFaker\\Lib\\Address', '\\Xeqtionr\\BanglaFaker\\Lib\\Number', "\\Xeqtionr\\BanglaFaker\\Lib\\Phone",
        '\\Xeqtionr\\BanglaFaker\\Lib\\Utils', '\\Xeqtionr\\BanglaFaker\\Lib\\Date', '\\Xeqtionr\\BanglaFaker\\Lib\\Color',
        '\\Xeqtionr\\BanglaFaker\\Lib\\Lorem', '\\Xeqtionr\\BanglaFaker\\Lib\\Person'
    ];


    public static function getChildClasses(): array
    {
        return self::$childClasses;
    }

    public function __call(string $name, array $arguments)
    {
        return self::make($name, $arguments);
    }


    public static function __callStatic(string $name, array $arguments)
    {
        foreach (static::getChildClasses() as $childClass){
            if( method_exists($childClass, $name) ){
                return forward_static_call(array($childClass, $name), $arguments);
            }
        }

        return new \Exception( $name .  ' Method not found');
    }


    public static function parse($string)
    {
        return static::getFormatter($string);
    }

    public static function make($method, $args = [])
    {
        foreach (static::getChildClasses() as $childClass){
            if( method_exists($childClass, $method) ){
                return $childClass::$method(...$args);
                return forward_static_call(array($childClass, $method), $args);
            }
        }

        return new \Exception( $method .  ' Method not found');
    }

    public static function getBanglaNumber($number)
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        return str_replace(range(0, 9), $bn_digits, $number);
    }
}
