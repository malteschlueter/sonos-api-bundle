<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos;

use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Player;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @see https://developer.sonos.com/reference/control-api/playerVolume/setVolume/
 */
final class SetPlayerVolume
{
    private const URL = '/control/api/v1/players/%s/playerVolume';

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function set(string $accessToken, Player $player, int $volume): bool
    {
        $request = ['volume' => $volume];

        $response = $this->client->request(
            'POST',
            Sonos::API_HOST . sprintf(self::URL, $player->getId()),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => sprintf('Bearer %s', $accessToken),
                ],
                'json' => $request,
            ]
        );

        return 200 === $response->getStatusCode();
    }
}
