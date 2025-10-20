<?php

use App\ExampleClass;
use PHPUnit\Framework\TestCase;

class ExampleClassTest extends TestCase
{
    public function testGreeting(): void
    {

        $obj = new ExampleClass('World');
        $this->assertEquals('Hello, World!', $obj->greet());
    }
}
