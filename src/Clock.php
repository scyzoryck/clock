<?php
declare(strict_types = 1);

namespace Scyzoryck\Clock;


interface Clock
{
    public function now():\DateTimeImmutable;
}
