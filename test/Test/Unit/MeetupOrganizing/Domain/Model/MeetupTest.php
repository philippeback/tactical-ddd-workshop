<?php
declare(strict_types=1);

namespace Test\Unit\MeetupOrganizing\Domain\Model;

use MeetupOrganizing\Domain\Model\MeetupGroup\MeetupGroupId;
use MeetupOrganizing\Domain\Model\User\User;
use MeetupOrganizing\Domain\Model\User\UserId;
use MeetupOrganizing\Domain\Model\Meetup\MeetupId;
use MeetupOrganizing\Domain\Model\Meetup\Meetup;
use MeetupOrganizing\Domain\Model\Meetup\Title;
use MeetupOrganizing\Domain\Model\MeetupGroup\MeetupGroup;
use Ramsey\Uuid\Uuid;


final class MeetupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function make_a_meetup()
    {
        $userId = UserId::fromString((string)Uuid::uuid4());
        $name = 'Matthias Noback';
        $emailAddress = 'matthiasnoback@gmail.com';

        $user = new User($userId, $name, $emailAddress);
        $this->assertEquals($userId, $user->userId());
        $this->assertEquals($name, $user->name());
        $this->assertEquals($emailAddress, $user->emailAddress());

        $meetupGroupId = MeetupGroupId::fromString((string)Uuid::uuid4());
        $name = 'Ibuildings Events';
        $meetupGroup = new MeetupGroup($meetupGroupId, $name);

        $this->assertSame($name, $meetupGroup->name());
        $this->assertEquals($meetupGroupId, $meetupGroup->meetupGroupId());

        $meetupId = MeetupId::fromString((string)Uuid::uuid4());
        $name = new Title('DDD Workshop Day');

        $occursOn = new \DateTime('now');
        $meetup = new Meetup($meetupId, $userId, $meetupGroupId, $name, $occursOn);

        $this->assertEquals($name, $meetup->title());
        $this->assertEquals($meetupId, $meetup->meetupId());
        $this->assertEquals($userId, $meetup->creatorId());
        $this->assertEquals($meetupGroupId, $meetup->meetupGroupId());
        $this->assertEquals($occursOn, $meetup->occursOn());

    }
}
