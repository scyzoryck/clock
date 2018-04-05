<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock\Tests;


use PHPUnit\Framework\TestCase;

abstract class AbstractClockTest extends TestCase
{

    protected function createDate(int $timestamp):\DateTimeImmutable
    {
        return (new \DateTimeImmutable())->setTimestamp($timestamp);
    }
}
