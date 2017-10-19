<?php
declare(strict_types=1);

namespace MeetupOrganizing\Domain\Model\Meetup;

use Assert\Assertion;

final class Address
{
    /**
     * @var string
     */
    private $place;

    public function __construct(string $place)
    {
        Assertion::notEmpty($place);
        $this->place = $place;
    }
}
