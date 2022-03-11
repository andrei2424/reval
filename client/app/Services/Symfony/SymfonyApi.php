<?php

namespace App\Services\Symfony;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Response;

class SymfonyApi implements SymfonyApiInterface
{
    public const API_URI = 'http://127.0.0.1:8001';

    private ClientInterface $client;

    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?: new Client([
            'base_uri' => self::API_URI,
            'verify' => false,
            'http_errors' => false,
            'timeout' => 5,
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }

    /**
     * @param float $number1
     * @param float $number2
     * @return float
     * @throws SymfonyApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function calculate(float $number1, float $number2): float
    {
        $response = $this->client->post('/api/calculate', [
            'json' => [
                'number1' => $number1,
                'number2' => $number2,
            ],
        ]);

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            throw new SymfonyApiException('Error details.');
        }

        $data = json_decode($response->getBody()->getContents(), true);

        return (float)$data['result'];
    }
}
