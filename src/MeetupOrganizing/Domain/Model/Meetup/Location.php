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

    public function __construct(Address $address, Coordinates $coordinates)
    {
        Assertion::notEmpty($address);

        $this->address = $address;
        $this->coordinates = $coordinates;
    }


}
