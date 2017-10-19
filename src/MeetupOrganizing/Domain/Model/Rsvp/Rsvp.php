<?php

namespace MeetupOrganizing\Domain\Model\Meetup;


use MeetupOrganizing\Domain\Model\Rsvp\RsvpId;
use MeetupOrganizing\Domain\Model\User\UserId;


final class Rsvp {

    private $rsvpId;
    private $meetupId;
    private $participantId;
    private $answer;

    public function __construct(RsvpId $rsvpId, MeetupId $meetupId, UserId $participantId, string $answer) {
        $this->rsvpId = $rsvpId;
        $this->meetupId = $meetupId;
        $this->participantId = $participantId;
        //TODO: assert if yes or no
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function rsvpId()
    {
        return $this->rsvpId;
    }

    /**
     * @return mixed
     */
    public function meetupId()
    {
        return $this->meetupId;
    }

    /**
     * @return mixed
     */
    public function participantId()
    {
        return $this->participantId;
    }

    /**
     * @return mixed
     */
    public function answer()
    {
        return $this->answer;
    }




}
