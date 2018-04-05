<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock;

class RealTimeClock implements Clock
{
    /**
     * {@inheritdoc}
     */
    public function now(): \DateTimeImmutable
    {
        return new \DateTimeImmutable();
    }
}
