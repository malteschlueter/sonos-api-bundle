<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto;

final class Group
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
    private $coordinatorId;

    /**
     * @var string
     */
    private $playbackState;

    /**
     * @var string[]
     */
    private $playerIds;

    /**
     * @var string[]
     */
    private $areaIds;

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

    public function getCoordinatorId(): string
    {
        return $this->coordinatorId;
    }

    public function setCoordinatorId(string $coordinatorId): self
    {
        $this->coordinatorId = $coordinatorId;

        return $this;
    }

    public function getPlaybackState(): string
    {
        return $this->playbackState;
    }

    public function setPlaybackState(string $playbackState): self
    {
        $this->playbackState = $playbackState;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getPlayerIds(): array
    {
        return $this->playerIds;
    }

    /**
     * @param string[] $playerIds
     */
    public function setPlayerIds(array $playerIds): self
    {
        $this->playerIds = $playerIds;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAreaIds(): array
    {
        return $this->areaIds;
    }

    /**
     * @param string[] $areaIds
     */
    public function setAreaIds(array $areaIds): self
    {
        $this->areaIds = $areaIds;

        return $this;
    }
}
