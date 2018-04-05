<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock\Tests;

use PHPUnit\Framework\TestCase;
use Scyzoryck\Clock\RealTimeClock;

class RealTimeClockTest extends TestCase
{
    /**
     * @var RealTimeClock
     */
    protected $clock;

    protected function setUp()
    {
        $this->clock = new RealTimeClock();
    }

    /**
     * @test
     */
    public function it_returns_real_time()
    {
        $this->assertSame(time(), $this->clock->now()->getTimestamp());
        sleep(1);
        $this->assertSame(time(), $this->clock->now()->getTimestamp());
    }
}
