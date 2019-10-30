<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos;

use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Group;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @see https://developer.sonos.com/reference/control-api/playback/pause/
 */
final class PlaybackPause
{
    private const URL = '/control/api/v1/groups/%s/playback/pause';

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function pause(string $accessToken, Group $group): bool
    {
        $response = $this->client->request(
            'POST',
            Sonos::API_HOST . sprintf(self::URL, $group->getId()),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => sprintf('Bearer %s', $accessToken),
                ],
            ]
        );

        return 200 === $response->getStatusCode();
    }
}
