<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock;

class StoppedClock implements Clock
{
    /**
     * @var \DateTimeImmutable
     */
    private $now;

    public function __construct(\DateTimeImmutable $now)
    {
        $this->now = $now;
    }

    /**
     * {@inheritdoc}
     */
    public function now(): \DateTimeImmutable
    {
        return clone $this->now;
    }
}
