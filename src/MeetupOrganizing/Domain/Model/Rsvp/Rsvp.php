<?php
declare(strict_types=1);

namespace MeetupOrganizing\Domain\Model\Meetup;

use MeetupOrganizing\Domain\Model\Rsvp\RsvpId;
use MeetupOrganizing\Domain\Model\User\UserId;
use Assert\Assertion;

final class Rsvp {

    private const YES = 'yes';
    private const NO = 'no';

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

    public function toggleAnswer() {
        if ($this->answer === Rsvp::YES) {
            $this->answer = Rsvp::NO;
        } elseif ($this->answer === Rsvp::NO) {
            $this->answer = Rsvp::YES;
        }
    }

    public static function yes(): string
    {
        return Rsvp::YES;
    }

    public static function no(): string
    {
        return Rsvp::NO;
    }
}
