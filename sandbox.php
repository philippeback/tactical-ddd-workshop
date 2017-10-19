<?php
declare(strict_types = 1);

use Common\EventDispatcher\EventCliLogger;
use Common\EventDispatcher\EventDispatcher;
use MeetupOrganizing\Domain\Model\Meetup\Meetup;
use MeetupOrganizing\Domain\Model\Meetup\MeetupId;
use MeetupOrganizing\Domain\Model\Meetup\ScheduledDate;
use MeetupOrganizing\Domain\Model\Meetup\Title;
use MeetupOrganizing\Domain\Model\Meetup\Address;
use MeetupOrganizing\Domain\Model\Meetup\Location;
use MeetupOrganizing\Domain\Model\Meetup\Coordinates;
use MeetupOrganizing\Domain\Model\MeetupGroup\MeetupGroup;
use MeetupOrganizing\Domain\Model\User\User;
use MeetupOrganizing\Infrastructure\Persistence\InMemoryMeetupGroupRepository;
use MeetupOrganizing\Infrastructure\Persistence\InMemoryUserRepository;
use Ramsey\Uuid\Uuid;

require __DIR__ . '/vendor/autoload.php';

$userRepository = new InMemoryUserRepository();
$meetupGroupRepository = new InMemoryMeetupGroupRepository();

$eventDispatcher = new EventDispatcher();
$eventDispatcher->subscribeToAllEvents(new EventCliLogger());

$user = new User(
    $userRepository->nextIdentity(),
    'Matthias Noback',
    'matthiasnoback@gmail.com'
);
$userRepository->add($user);

$meetupGroup = new MeetupGroup(
    $meetupGroupRepository->nextIdentity(),
    'Ibuildings Events'
);
$meetupGroupRepository->add($meetupGroup);

// dispatch domain events
//$eventDispatcher->dispatch(new \stdClass());

$location = new Location(new Address('somewhere'), new Coordinates(45.0, 52.0));


$meetup = Meetup::schedule(
    MeetupId::fromString((string)Uuid::uuid4()),
    $meetupGroup->meetupGroupId(),
    $user->userId(),
    new Title('PHP Europe October meetup'),
    ScheduledDate::fromDateTime(new \DateTimeImmutable('2017-10-19 20:00')),
    $location
);
dump($meetup);



