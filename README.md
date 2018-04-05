# Clock

Did you ever wonder how to control your time? This library is created for you! 
It provides a `Clock` interface that allows you to create current datetime in a controlled way!

## Installing

```php
composer require scyzoryck/clock
```

## Clock types
The provided implementations of `Clock` are:
- `RealTimeClock` - always returns the real time.
- `StoppedClock` - it always returns times that you have provided in constructor! Useful for tests. 
- `RunningClock` - as the previous one it use the time from constructor, but this time is running. 
- `TransactionalClock` - wrapper, that allows you to stop the time for some long running operations. 

## Adapters
The method `Clock::now()` returns an instance of `\DateTimeImmutable`. You can use adapters if you need some others DateTime objects.
- `MutableDateTimeClock` - creates an instance of `\DateTime`

# Running Unit Tests
```php
composer install 
php vendor/bin/phpunit
```
