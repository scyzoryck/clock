<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock\Tests;

use Scyzoryck\Clock\RunningClock;

class RunningClockTest extends AbstractClockTest
{
    const
        NOW = 1508112000,
        ONE_SEC_LATER = 1508112001;

    /**
     * @test
     */
    public function its_time_is_running()
    {
        $clock = new RunningClock($this->createDate(self::NOW));
        $this->assertEquals(self::NOW, $clock->now()->getTimestamp());
        sleep(1);
        $this->assertEquals(self::ONE_SEC_LATER, $clock->now()->getTimestamp());
    }
}
