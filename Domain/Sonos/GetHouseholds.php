<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos;

use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Response\GetHouseholdsResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @see https://developer.sonos.com/reference/control-api/households/
 */
final class GetHouseholds
{
    private const URL = '/control/api/v1/households';

    private $client;
    private $serializer;

    public function __construct(
        HttpClientInterface $client,
        SerializerInterface $serializer
    ) {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function get(string $accessToken): GetHouseholdsResponse
    {
        $response = $this->client->request('GET', Sonos::API_HOST . self::URL, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => sprintf('Bearer %s', $accessToken),
            ],
        ]);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(
            $response->getContent(),
            GetHouseholdsResponse::class,
            'json'
        );
    }
}
