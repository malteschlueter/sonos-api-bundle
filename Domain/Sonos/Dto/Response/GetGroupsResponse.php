<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Response;

use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Group;
use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Player;

final class GetGroupsResponse
{
    /**
     * @var Group[]
     */
    private $groups;

    /**
     * @var Player[]
     */
    private $players;

    /**
     * @return Group[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @param Group[] $groups
     */
    public function setGroups(array $groups): self
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * @return Player[]
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * @param Player[] $players
     */
    public function setPlayers(array $players): self
    {
        $this->players = $players;

        return $this;
    }
}
