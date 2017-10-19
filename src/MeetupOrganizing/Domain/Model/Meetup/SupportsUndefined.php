<?php
declare(strict_types = 1);

namespace Common\DomainModel;

use Assert\Assertion;

trait SupportsUndefined
{
    private static $UNDEFINED = '###UNDEFINED###';

    public static function undefinedValue():  {

        $type = __CLASS__;
        return $type::;
    }

}
