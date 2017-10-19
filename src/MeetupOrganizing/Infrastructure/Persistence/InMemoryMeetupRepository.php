<?php
declare(strict_types=1);

namespace MeetupOrganizing\Infrastructure\Persistence;

use MeetupOrganizing\Domain\Model\MeetupGroup\Meetup;
use MeetupOrganizing\Domain\Model\MeetupGroup\MeetupId;
use MeetupOrganizing\Domain\Model\MeetupGroup\MeetupRepository;
use Ramsey\Uuid\Uuid;

final class InMemoryMeetupRepository implements MeetupRepository
{
    private $meetups = [];

    public function add(Meetup $meetup)
    {
        $this->meetup[(string)$meetup->meetupId()] = $meetup;
    }

    public function getById(MeetupId $meetupId): Meetup
    {
        if (!isset($this->meetups[(string)$meetupId])) {
            throw new \RuntimeException(sprintf('Meetup "%s" not found', $meetupId));
        }

        return $this->meetups[(string)$meetupId];
    }

    public function nextIdentity(): MeetupId
    {
        return MeetupId::fromString((string)Uuid::uuid4());
    }
}
