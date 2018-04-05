<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock;


use Scyzoryck\Clock\Exception\CannotCloseTransaction;

class TransactionalClock implements Clock
{
    /**
     * @var Clock
     */
    private $clock;

    /**
     * @var null|\DateTime
     */
    private $transaticonTime;

    /**
     * @var int
     */
    private $depth = 0;

    public function __construct(Clock $innerClock)
    {
        $this->clock = $innerClock;
    }

    /**
     * {@inheritdoc}
     */
    public function now(): \DateTimeImmutable
    {
        return $this->transaticonTime ?? $this->clock->now();
    }

    public function openTransaction()
    {
        if (0 === $this->depth++) {
            $this->transaticonTime = $this->clock->now();
        }
    }

    public function closeTransaction()
    {
        if (0 === $this->depth--) {
            throw new CannotCloseTransaction();
        }

        $this->transaticonTime = null;
    }
}
