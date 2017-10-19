<?php
declare(strict_types=1);

use Common\EventDispatcher\EventCliLogger;
use Common\EventDispatcher\EventDispatcher;
use MeetupOrganizing\Application\WhenMeetupScheduledRsvpYesForOrganizer;
use MeetupOrganizing\Domain\Model\Meetup\Address;
use MeetupOrganizing\Domain\Model\Meetup\Geolocation;
use MeetupOrganizing\Domain\Model\Meetup\Location;
use MeetupOrganizing\Domain\Model\Meetup\Meetup;
use MeetupOrganizing\Domain\Model\Meetup\MeetupId;
use MeetupOrganizing\Domain\Model\Meetup\MeetupScheduled;
use MeetupOrganizing\Domain\Model\Meetup\ScheduledDate;
use MeetupOrganizing\Domain\Model\Meetup\Title;
use MeetupOrganizing\Domain\Model\MeetupGroup\MeetupGroup;
use MeetupOrganizing\Domain\Model\User\User;
use MeetupOrganizing\Infrastructure\Persistence\InMemoryMeetupGroupRepository;
use MeetupOrganizing\Infrastructure\Persistence\InMemoryUserRepository;
use Ramsey\Uuid\Uuid;

require __DIR__ . '/vendor/autoload.php';


putenv("DB_PATH=/home/philippeback/ddddb");

$userRepository = new InMemoryUserRepository();
$meetupGroupRepository = new InMemoryMeetupGroupRepository();

$eventDispatcher = new EventDispatcher();
$eventDispatcher->subscribeToAllEvents(new EventCliLogger());

$storageFacility = new \Common\EventSourcing\EventStore\Storage\DatabaseStorageFacility();
$jsonSerializer = new \NaiveSerializer\JsonSerializer();

$eventStore = new \Common\EventSourcing\EventStore\EventStore(
    $storageFacility,
    $eventDispatcher,
    $jsonSerializer);

$repository = new \Common\EventSourcing\Aggregate\Repository\EventSourcedAggregateRepository($eventStore,Meetup::class);

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

$meetupId = MeetupId::fromString((string)Uuid::uuid4());
$meetup = Meetup::schedule(
    $meetupId,
    $meetupGroup->meetupGroupId(),
    $user->userId(),
    new Title('PHP Europe October meetup'),
    ScheduledDate::fromDateTime(new \DateTimeImmutable('2017-10-19 20:00')),
    Location::fromAddressAndGeolocation(new Address('Atomium, Brussels'), Geolocation::fromCoordinates(
        50.8946883,
        4.3413675
    ))
);
dump($meetup);
dump("Saving into repo");
$repository->save($meetup);

/*
$eventDispatcher->registerSubscriber(MeetupScheduled::class, new WhenMeetupScheduledRsvpYesForOrganizer());


foreach ($meetup->recordedEvents() as $event) {
    $eventDispatcher->dispatch($event);
}
*/
