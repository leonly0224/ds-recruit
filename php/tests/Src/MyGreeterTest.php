<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Src\MyGreeter;
use Carbon\Carbon;

class MyGreeterTest extends TestCase
{
    private MyGreeter $greeter;

    public function setUp(): void
    {
        $this->greeter = new MyGreeter();
    }

    public function test_init()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    #[DataProvider('provideTestGreetings')]
    public function test_greeting(string $currentTime, string $expectedResult)
    {
//        $this->assertTrue(
//            strlen($this->greeter->greeting()) > 0
//        );
        // mock time
        $_mockTime = Carbon::make($currentTime);
        Carbon::setTestNow($_mockTime);
        $this->assertSame(
            $expectedResult,
            $this->greeter->greeting()
        );
    }

    public static function provideTestGreetings()
    {
        return [
            ['2024-01-01 00:00:00', 'Good evening'],
            ['2024-01-01 05:59:59', 'Good evening'],
            ['2024-01-01 06:00:00', 'Good morning'],
            ['2024-01-01 11:59:59', 'Good morning'],
            ['2024-01-01 12:00:00', 'Good afternoon'],
            ['2024-01-01 17:59:59', 'Good afternoon'],
            ['2024-01-01 18:00:00', 'Good evening'],
            ['2024-01-01 23:59:59', 'Good evening'],
        ];
    }

}
