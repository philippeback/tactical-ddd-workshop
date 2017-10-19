<?php
declare(strict_types = 1);

namespace MeetupOrganizing\Domain\Model\Meetup;

final class MeetupScheduledHandler
{
    public function __invoke($event)
    {
        dump('Handling Meetup Scheduled');
        dump($event);
    }
}

// MeetupOrganizing\Domain\Model\Meetup\MeetupScheduledHandler