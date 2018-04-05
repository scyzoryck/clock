<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock\Adapter;


use Scyzoryck\Clock\Clock;

class MutableDateTimeClock
{
    /**
     * @var Clock
     */
    private $clock;

    public function __construct(Clock $clock)
    {
        $this->clock = $clock;
    }

    public function now(): \DateTime
    {
        $now = new \DateTime();
        return $now->setTimestamp($this->clock->now()->getTimestamp());
    }
}
