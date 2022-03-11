<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CalculatorController
{

    public function calculate(Request $request): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true);

        $number1 = $parameters['number1'] ?? null;
        $number2 = $parameters['number2'] ?? null;

        if (!$number1 || !$number2) {
            return new JsonResponse([
                'message' => 'Incorrect request',
            ], 400);
        }

        return new JsonResponse([
            'result' => $number1 + $number2,
        ]);
    }
}
