<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Services\Symfony\SymfonyApiInterface;

class CalculatorController extends Controller
{
    public function __construct(
        private SymfonyApiInterface $symfonyApi
    ) {}

    public function calculate(CalculateRequest $request)
    {
        $calculate = $this
            ->symfonyApi
            ->calculate(
                $request->getNumber1(),
                $request->getNumber2(),
            );

        return [
            'result' => $calculate,
        ];
    }
}
