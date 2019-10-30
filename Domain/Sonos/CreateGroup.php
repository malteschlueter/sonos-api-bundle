<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos;

use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Group;
use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Household;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @see https://developer.sonos.com/reference/control-api/groups/creategroup/
 */
final class CreateGroup
{
    private const URL = '/control/api/v1/households/%s/groups/createGroup';

    private $client;
    private $denormalizer;

    public function __construct(
        HttpClientInterface $client,
        DenormalizerInterface $denormalizer
    ) {
        $this->client = $client;
        $this->denormalizer = $denormalizer;
    }

    public function create(string $accessToken, Household $household, array $playerIds): Group
    {
        $request = ['playerIds' => $playerIds];

        $response = $this->client->request(
            'POST',
            Sonos::API_HOST . sprintf(self::URL, $household->getId()),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => sprintf('Bearer %s', $accessToken),
                ],
                'json' => $request,
            ]
        );

        $responseArray = $response->toArray();

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->denormalizer->denormalize(
            $responseArray['group'],
            Group::class
        );
    }
}
