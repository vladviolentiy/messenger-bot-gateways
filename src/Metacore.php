<?php

namespace VladViolentiy\VivaBotGates;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class Metacore
{
    private readonly Client $client;
    protected readonly string $botId;

    public function __construct(string $botId)
    {
        $this->client = new Client();
        $this->botId = $botId;

    }

    /**
     * @param non-empty-string $url
     * @param array<string,string> $params
     * @param array<string,string>|null $header
     * @return string
     * @throws GuzzleException
     */
    protected function postQuery(string $url, array $params,?array $header = null):string{
        $options = [
            "form_params" => $params
        ];
        if($header!==null){
            $options['header'] = $header;
        }
        $response = $this->client->post($url, $options);
        return (string)$response->getBody();
    }
}