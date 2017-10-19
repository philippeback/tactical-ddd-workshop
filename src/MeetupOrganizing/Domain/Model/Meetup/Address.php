<?php
declare(strict_types=1);

namespace MeetupOrganizing\Domain\Model\Meetup;

use Assert\Assertion;

final class Address
{

    //use SupportsUndefined;

    /**
     * @var string
     */
    private $place;

    public function __construct(string $place)
    {
        Assertion::notEmpty($place);
        $this->place = $place;
    }

    public static function undefinedAddress(): Address {
        return new self(static::$UNDEFINED);
    }
}
