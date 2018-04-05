<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock\Tests;

use Scyzoryck\Clock\StoppedClock;

class StoppedClockTest extends AbstractClockTest
{
    const NOW = 1508112000;

    /**
     * @test
     */
    public function its_time_is_always_the_same_time()
    {
        $clock = new StoppedClock($this->createDate(self::NOW));
        sleep(1);
        $this->assertSame(self::NOW, $clock->now()->getTimestamp());
    }
}
