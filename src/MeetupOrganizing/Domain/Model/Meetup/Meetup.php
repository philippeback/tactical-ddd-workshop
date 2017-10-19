<?php

namespace MeetupOrganizing\Domain\Model\Meetup;


use Assert\Assert;
use Assert\Assertion;
use MeetupOrganizing\Domain\Model\MeetupGroup\MeetupGroupId;
use MeetupOrganizing\Domain\Model\User\UserId;
use \DateTime;

final class Meetup
{
    /**
     * @var MeetupId
     */
    private $meetupId;
    /**
     * @var UserId
     */
    private $creatorId;
    /**
     * @var MeetupGroupId
     */
    private $meetupGroupId;
    /**
     * @var Title
     */
    private $title;

     /**
     * @var DateTime
     */
    private $occursOn;


    public function __construct(MeetupId $meetupId, UserId $organizerId, MeetupGroupId $meetupGroupId, Title $title, DateTime $occursOn)
    {
        $this->meetupId = $meetupId;
        $this->creatorId = $organizerId;
        $this->meetupGroupId = $meetupGroupId;

        $this->title = $title;
        $this->occursOn = $occursOn;
    }

    /**
     * @return Rsvp
     */
    public function meetupId()
    {
        return $this->meetupId;
    }

    /**
     * @return MeetupGroupId
     */
    public function meetupGroupId()
    {
        return $this->meetupGroupId;
    }

    /**
     * @return UserId
     */
    public function creatorId()
    {
        return $this->creatorId;
    }

    /**
     * @return Title
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function occursOn()
    {
        return $this->occursOn;
    }



}
