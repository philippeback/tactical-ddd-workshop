<?php
/**
 * Created by PhpStorm.
 * User: philippeback
 * Date: 10/19/17
 * Time: 10:53 AM
 */

namespace MeetupOrganizing\Domain\Model\Meetup;

use Assert\Assertion;


class Title
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        Assertion::notEmpty($name);
        Assertion::notBlank($name);

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }



}