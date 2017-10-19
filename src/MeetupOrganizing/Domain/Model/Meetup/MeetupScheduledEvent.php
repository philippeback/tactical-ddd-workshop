<?php
declare(strict_types=1);

namespace MeetupOrganizing\Domain\Model\Meetup;

use MeetupOrganizing\Domain\Model\Meetup\MeetupId;
use MeetupOrganizing\Domain\Model\User\UserId;

final class MeetupScheduledEvent
{
    /**
     * @var MeetupId
     */
    private $meetupId;

    /**
     * @var UserId
     */
    private $organizerId;

    private function __construct(
        MeetupId $meetupId,
        UserId $organizerId
    ) {
        $this->meetupId = $meetupId;
        $this->organizerId = $organizerId;
    }

    public static function organizerAttendsMeetup(
        UserId $organizerId,
        MeetupId $meetupId
    ): MeetupScheduledEvent {

        return new self($meetupId, $organizerId);

    }
}
