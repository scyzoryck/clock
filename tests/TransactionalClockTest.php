<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use Scyzoryck\Clock\Clock;
use Scyzoryck\Clock\Exception\CannotCloseTransaction;
use Scyzoryck\Clock\TransactionalClock;

class TransactionalClockTest extends AbstractClockTest
{
    const
        NOW = 1508112000,
        ONE_MIN_LATER = 1508112060;

    /**
     * @var Clock|MockObject
     */
    private $clock;

    /**
     * @var TransactionalClock
     */
    private $transactionalClock;

    protected function setUp()
    {
        $this->clock = $this->createMock(Clock::class);
        $this->transactionalClock = new TransactionalClock($this->clock);
        $this->clock->method('now')->willReturn(
            $this->createDate(self::NOW),
            $this->createDate(self::ONE_MIN_LATER)
        );
    }

    /**
     * @test
     */
    public function it_stops_time_when_transaction_is_started()
    {
        $this->transactionalClock->openTransaction();
        $this->assertEquals(
            self::NOW,
            $this->transactionalClock->now()->getTimestamp()
        );
        $this->assertEquals(
            self::NOW,
            $this->transactionalClock->now()->getTimestamp()
        );

        $this->transactionalClock->closeTransaction();
        $this->assertEquals(
            self::ONE_MIN_LATER,
            $this->transactionalClock->now()->getTimestamp()
        );
    }

    /**
     * @test
     */
    public function its_transaction_cannot_be_closed_when_is_not_open()
    {
        $this->expectException(CannotCloseTransaction::class);
        $this->transactionalClock->closeTransaction();
    }

    /**
     * @test
     */
    public function its_transaction_can_be_opened_and_closed_multiple_times()
    {
        $this->transactionalClock->openTransaction();
        $this->transactionalClock->openTransaction();
        $this->transactionalClock->closeTransaction();
        $this->transactionalClock->closeTransaction();
        $this->assertSame(
            self::ONE_MIN_LATER,
            $this->transactionalClock->now()->getTimestamp()
        );
    }

}
