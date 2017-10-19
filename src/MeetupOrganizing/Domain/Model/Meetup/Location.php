<?php
declare(strict_types=1);

namespace MeetupOrganizing\Domain\Model\Meetup;

use Assert\Assertion;

final class Location
{
    /**
     * @var Address
     */
    private $address;

    /**
     * @var Location
     */
    private $coordinates;

    private function __construct(Address $address, Coordinates $coordinates)
    {
        Assertion::notEmpty($address);

        $this->address = $address;
        $this->coordinates = $coordinates;
    }

    public static function knownLocation(Address $address, Coordinates $coordinates): Location {
        return new self( $address, $coordinates);
    }

    public static function unknownLocation(): Location {
        return new self(Address::undefinedAddress(),Coordinates::undefinedCoordinates());
    }


}
