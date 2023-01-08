<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/8/2022
 */


namespace Xeqtionr\BanglaFaker\Lib;

use Xeqtionr\BanglaFaker\BanglaFaker;

class Company extends BanglaFaker
{
    protected static $formats = [
        '{{companyName}} {{companyType}}',
    ];

    protected static $names = [
        'রহিম', 'করিম', 'বাবলু',
    ];

    protected static $types = [
        'সিমেন্ট', 'সার', 'ঢেউটিন',
    ];

    public static function companyType()
    {
        return static::randomElement(static::$types);
    }

    public static function companyName()
    {
        return static::randomElement(static::$names);
    }
}
