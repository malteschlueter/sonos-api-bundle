<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto;

final class Player
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $websocketUrl;

    /**
     * @var string
     */
    private $softwareVersion;

    /**
     * @var string
     */
    private $apiVersion;

    /**
     * @var string
     */
    private $minApiVersion;

    /**
     * @var string[]
     */
    private $capabilities;

    /**
     * @var string[]
     */
    private $deviceIds;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWebsocketUrl(): string
    {
        return $this->websocketUrl;
    }

    public function setWebsocketUrl(string $websocketUrl): self
    {
        $this->websocketUrl = $websocketUrl;

        return $this;
    }

    public function getSoftwareVersion(): string
    {
        return $this->softwareVersion;
    }

    public function setSoftwareVersion(string $softwareVersion): self
    {
        $this->softwareVersion = $softwareVersion;

        return $this;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    public function setApiVersion(string $apiVersion): self
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    public function getMinApiVersion(): string
    {
        return $this->minApiVersion;
    }

    public function setMinApiVersion(string $minApiVersion): self
    {
        $this->minApiVersion = $minApiVersion;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getCapabilities(): array
    {
        return $this->capabilities;
    }

    /**
     * @param string[] $capabilities
     */
    public function setCapabilities(array $capabilities): self
    {
        $this->capabilities = $capabilities;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getDeviceIds(): array
    {
        return $this->deviceIds;
    }

    /**
     * @param string[] $deviceIds
     */
    public function setDeviceIds(array $deviceIds): self
    {
        $this->deviceIds = $deviceIds;

        return $this;
    }
}
