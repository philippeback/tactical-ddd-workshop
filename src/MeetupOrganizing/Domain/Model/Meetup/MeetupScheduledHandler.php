<?php
declare(strict_types = 1);

namespace MeetupOrganizing\Domain\Model\Meetup;

use MeetupOrganizing\Domain\Model\Rsvp\Rsvp;
use MeetupOrganizing\Domain\Model\Rsvp\RsvpId;

use Ramsey\Uuid\Uuid;

final class MeetupScheduledHandler
{
    public function __invoke($event)
    {
        dump('Handling Meetup Scheduled');
        dump('Event is:');
        dump($event);

        // This should be done in an application service
        $rsvp = Rsvp::yes(
            RsvpId::fromString((string)Uuid::uuid4()),
            $event->meetupId(),
            $event->organizerId()
        );
        dump('Rsvp produced is:');
        dump($rsvp);
        dump('Handling Meetup Performed');

    }
}

// MeetupOrganizing\Domain\Model\Meetup\MeetupScheduledHandler