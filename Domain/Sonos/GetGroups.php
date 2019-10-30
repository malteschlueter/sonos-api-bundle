<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos;

use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Household;
use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Response\GetGroupsResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @see https://developer.sonos.com/reference/control-api/groups/getgroups/
 */
final class GetGroups
{
    private const URL = '/control/api/v1/households/%s/groups';

    private $client;
    private $serializer;

    public function __construct(
        HttpClientInterface $client,
        SerializerInterface $serializer
    ) {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function get(string $accessToken, Household $household): GetGroupsResponse
    {
        $response = $this->client->request(
            'GET',
            Sonos::API_HOST . sprintf(self::URL, $household->getId()),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => sprintf('Bearer %s', $accessToken),
                ],
            ]
        );

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(
            $response->getContent(),
            GetGroupsResponse::class,
            'json'
        );
    }
}
