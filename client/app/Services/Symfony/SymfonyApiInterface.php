<?php

namespace App\Services\Symfony;

interface SymfonyApiInterface
{
    public function calculate(float $number1, float $number2): float;
}
