<?php
declare(strict_types=1);

namespace MeetupOrganizing\Domain\Model\Meetup;

use Assert\Assertion;

final class Coordinates implements CoordinatesInterface
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    private function __construct(float $latitude, float $longitude)
    {
        Assertion::between($latitude,-90.0,90.00);
        Assertion::between($longitude,-90.0,90.00);

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

}
