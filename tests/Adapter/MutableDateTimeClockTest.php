<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock\Tests\Adapter;

use PHPUnit\Framework\MockObject\MockObject;
use Scyzoryck\Clock\Adapter\MutableDateTimeClock;
use Scyzoryck\Clock\Clock;
use Scyzoryck\Clock\Tests\AbstractClockTest;

class MutableDateTimeClockTest extends AbstractClockTest
{
    const NOW = 1508112000;

    /**
     * @var Clock|MockObject
     */
    private $innerClock;

    /**
     * @var MutableDateTimeClock
     */
    private $adapter;

    protected function setUp()
    {
        $this->innerClock = $this->createMock(Clock::class);
        $this->innerClock->method('now')->willReturn($this->createDate(self::NOW));
        $this->adapter = new MutableDateTimeClock($this->innerClock);
    }

    /**
     * @test
     */
    public function it_return_parent_time()
    {
       $this->assertSame(
           self::NOW,
           $this->adapter->now()->getTimestamp()
       );
    }
}
