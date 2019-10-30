<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos;

use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Response\RefreshAccessTokenResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @see https://developer.sonos.com/reference/authorization-api/refresh-token/
 */
final class RefreshAccessToken
{
    private $client;
    private $serializer;
    private $refreshToken;
    private $clientKey;
    private $clientSecret;

    public function __construct(
        HttpClientInterface $client,
        SerializerInterface $serializer,
        string $refreshToken,
        string $clientKey,
        string $clientSecret
    ) {
        $this->client = $client;
        $this->serializer = $serializer;
        $this->refreshToken = $refreshToken;
        $this->clientKey = $clientKey;
        $this->clientSecret = $clientSecret;
    }

    public function refresh(): RefreshAccessTokenResponse
    {
        $request = [
            'refresh_token' => $this->refreshToken,
            'grant_type' => 'refresh_token',
        ];

        $response = $this->client->request('POST', 'https://api.sonos.com/login/v3/oauth/access', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic ' . base64_encode(sprintf('%s:%s', $this->clientKey, $this->clientSecret)),
            ],
            'body' => $request,
        ]);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(
            $response->getContent(),
            RefreshAccessTokenResponse::class,
            'json'
        );
    }
}
