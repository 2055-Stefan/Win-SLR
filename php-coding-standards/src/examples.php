<?php

declare(strict_types=1);

namespace App;

class ExampleClass
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function greet(): string
    {
        return "Hello, {$this->name}!";
    }
}
