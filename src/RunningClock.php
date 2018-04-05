<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock;

class RunningClock implements Clock
{
    /**
     * @var \DateInterval
     */
    private $diff;

    public function __construct(\DateTimeImmutable $now)
    {
        $this->diff = $now->diff(new \DateTimeImmutable());
    }

    /**
     * {@inheritdoc}
     */
    public function now(): \DateTimeImmutable
    {
        return (new \DateTimeImmutable())->sub($this->diff);
    }
}
